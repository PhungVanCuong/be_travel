<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\HoaDon;
use App\Models\HuongDanVien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatBotController extends Controller
{
    /**
     * 1. HÀM XỬ LÝ CHÍNH ĐÓN NHẬN REQUEST
     */
    public function xuLyChat(Request $request)
    {
        $message = trim($request->input('message', ''));
        // Lấy offset để phân trang (Load more 5 tour tiếp theo)
        $offset = (int) $request->input('offset', 0);
        $user = Auth::guard('sanctum')->user();

        // NẾU CÓ CÀI GEMINI API TRONG FILE .ENV, CHÚNG TA SẼ DÙNG AI
        $apiKey = env('GEMINI_API_KEY');
        if (!empty($apiKey) && $offset == 0) {
            return $this->callGeminiAI($message, $user, $apiKey);
        }

        // NẾU KHÔNG CÓ GEMINI (HOẶC ĐANG BẤM LOAD MORE), GỌI LOGIC TỰ BUILD
        return $this->fallbackLogic($message, $user, $offset);
    }

    /**
     * 2. HÀM KẾT NỐI GEMINI AI
     */
    private function callGeminiAI($message, $user, $apiKey)
    {
        $userInfo = $user ? "Tên khách hàng: {$user->ho_va_ten}. Email: {$user->email}." : "Khách hàng chưa đăng nhập.";

        $historyInfo = "Không có.";
        if ($user) {
            $hoadons = HoaDon::where('id_khach_hang', $user->id)->with('ds_ve')->get();
            if ($hoadons->count() > 0) {
                $historyInfo = json_encode($hoadons->map(function($hd) {
                    $trang_thai = $hd->trang_thai == 2 ? 'Đã thanh toán' : ($hd->trang_thai == 1 ? 'Chờ thanh toán' : 'Đã hủy');
                    return [
                        'ma_hoa_don' => $hd->ma_hoa_don,
                        'tong_tien' => number_format($hd->tong_tien) . ' VND',
                        'trang_thai' => $trang_thai,
                        'ngay_dat' => $hd->created_at->format('d/m/Y'),
                    ];
                }));
            }
        }

        $tours = Tour::where('tinh_trang', 1)->select('id', 'ten_tour', 'gia', 'diem_don', 'diem_tra')->get();
        $hdvs = HuongDanVien::where('is_active', 1)->select('ho_va_ten', 'ngon_ngu')->get();

        $systemInstruction = <<<EOT
        Bạn là "Ixtal Assistant", trợ lý AI du lịch thông minh, vui nhộn của công ty Ixtal Tour.
        THÔNG TIN HỆ THỐNG:
        - Tình trạng người dùng: $userInfo
        - Lịch sử đặt vé: $historyInfo
        - Danh sách Tour: $tours
        - Hướng dẫn viên: $hdvs

        QUY TẮC:
        1. Chào tên khách nếu đã đăng nhập.
        2. Nếu khách hỏi lịch sử, hãy đọc lịch sử. Chưa đăng nhập thì kêu đăng nhập.
        3. Tư vấn tour dựa trên danh sách Tour. Tám chuyện linh hoạt.
        4. Trả về JSON cấu trúc:
        {
            "text": "Câu trả lời, dùng HTML <b>, <br> trang trí, kèm emoji.",
            "tour_ids": [id_tour_1, id_tour_2],
            "buttons": [{"text": "Tên Nút", "type": "route", "route": "/url-here"}]
        }
        EOT;

        try {
            $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}", [
                "system_instruction" => ["parts" => [["text" => $systemInstruction]]],
                "contents" => [["role" => "user", "parts" => [["text" => $message]]]],
                "generationConfig" => ["temperature" => 0.7, "response_mime_type" => "application/json"]
            ]);

            if ($response->successful()) {
                $resultJson = $response->json();
                $contentStr = $resultJson['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
                $aiData = json_decode($contentStr, true);

                $responseText = $aiData['text'] ?? "Xin lỗi, mình đang xử lý hơi chậm một chút.";
                $tourIds = $aiData['tour_ids'] ?? [];

                $suggestedTours = [];
                if (!empty($tourIds)) {
                    $suggestedTours = Tour::whereIn('id', $tourIds)->withAvg('danhgias as avg_sao', 'sao_danh_gia')->get();
                }

                return response()->json([
                    'status' => true,
                    'response' => $responseText,
                    'tours' => $suggestedTours,
                    'buttons' => $aiData['buttons'] ?? [],
                    'ai_powered' => true
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Lỗi gọi Gemini: " . $e->getMessage());
        }

        return $this->fallbackLogic($message, $user, 0);
    }

    /**
     * 3. HÀM LOGIC CỨNG DỰ PHÒNG CHÍNH XÁC (Exact Match)
     */
    private function fallbackLogic($message, $user, $offset = 0)
    {
        $msgLower = mb_strtolower(trim($message), 'UTF-8');
        $userName = $user ? $user->ho_va_ten : "bạn";

        $responseText = "";
        $toursQuery = null;
        $buttons = [];
        $hasMore = false;
        $limit = 5;
        $isMatched = false;

        // DỮ LIỆU ĐỊA LÝ VÀ QUỐC GIA CHUẨN XÁC
        $quocGias = [
            'trung quốc' => 2, 'campuchia' => 3, 'thái lan' => 4, 'hàn quốc' => 5,
            'nhật bản' => 6, 'singapore' => 7, 'malaysia' => 8, 'đài loan' => 9, 'indonesia' => 10
        ];

        $mienBac = ['Hà Nội', 'Hà Giang', 'Cao Bằng', 'Bắc Kạn', 'Tuyên Quang', 'Lào Cai', 'Sapa', 'Điện Biên', 'Lai Châu', 'Sơn La', 'Yên Bái', 'Hòa Bình', 'Thái Nguyên', 'Lạng Sơn', 'Quảng Ninh', 'Hạ Long', 'Bắc Giang', 'Phú Thọ', 'Vĩnh Phúc', 'Bắc Ninh', 'Hải Dương', 'Hải Phòng', 'Hưng Yên', 'Thái Bình', 'Hà Nam', 'Nam Định', 'Ninh Bình', 'Tà Xùa'];
        $mienTrung = ['Thanh Hóa', 'Nghệ An', 'Hà Tĩnh', 'Quảng Bình', 'Quảng Trị', 'Thừa Thiên Huế', 'Huế', 'Đà Nẵng', 'Quảng Nam', 'Hội An', 'Quảng Ngãi', 'Bình Định', 'Quy Nhơn', 'Phú Yên', 'Khánh Hòa', 'Nha Trang', 'Ninh Thuận', 'Bình Thuận', 'Kon Tum', 'Gia Lai', 'Đắk Lắk', 'Đắk Nông', 'Lâm Đồng', 'Đà Lạt'];
        $mienNam = ['Bình Phước', 'Tây Ninh', 'Bình Dương', 'Đồng Nai', 'Bà Rịa', 'Vũng Tàu', 'Hồ Chí Minh', 'Sài Gòn', 'Long An', 'Tiền Giang', 'Bến Tre', 'Trà Vinh', 'Vĩnh Long', 'Đồng Tháp', 'An Giang', 'Kiên Giang', 'Phú Quốc', 'Cần Thơ', 'Hậu Giang', 'Sóc Trăng', 'Bạc Liêu', 'Cà Mau'];

        // ====================================================================
        // NHÓM 1: GIAO TIẾP, CSKH, HỖ TRỢ, CHÍNH SÁCH
        // ====================================================================
        if (preg_match('/(chào|hi|hello|ê bot|xin chào|hey)/iu', $msgLower)) {
            $nameStr = $user ? " <b>" . $user->ho_va_ten . "</b>" : "";
            $responseText = "Hehe xin chào{$nameStr}! 👋 Mình là Trợ lý AI siêu cấp của Ixtal Tour. Bạn gõ tên Tour, Vùng miền (Miền Bắc, Trung, Nam) hoặc Quốc gia để mình tìm chính xác cho nhé! 🍯";
            $buttons = [['text' => '🔥 Xem tour hot', 'type' => 'message', 'message' => 'tour bán chạy']];
            $isMatched = true;
        }
        elseif (preg_match('/(liên hệ|tổng đài|hotline|số điện thoại|cskh|nhân viên)/iu', $msgLower)) {
            $responseText = "☎️ <b>Hotline Hỗ Trợ 24/7:</b> 0236 365 0403<br>📧 <b>Email:</b> hotro@ixtaltour.com<br>📍 <b>Địa chỉ:</b> 03 Quang Trung, Hải Châu, Đà Nẵng.<br>Bạn có thể gọi trực tiếp để nhân viên tư vấn chi tiết hơn nhé!";
            $isMatched = true;
        }
        elseif (preg_match('/(hướng dẫn viên|hdv|guide|dẫn đoàn)/iu', $msgLower)) {
            $hdvs = HuongDanVien::where('is_active', 1)->inRandomOrder()->limit(5)->get();
            $responseText = "Đội ngũ HDV của Ixtal Tour cực kỳ chuyên nghiệp và vui tính! 🤩 Tiêu biểu như:<br><br>";
            foreach($hdvs as $hdv) {
                $responseText .= "👨‍🏫 <b>{$hdv->ho_va_ten}</b> - (Ngôn ngữ: {$hdv->ngon_ngu})<br>";
            }
            $buttons = [['text' => '👨‍🏫 Xem Toàn Bộ HDV', 'type' => 'route', 'route' => '/client/huong-dan-vien']];
            $isMatched = true;
        }
        elseif (preg_match('/(thời tiết|mưa|nắng|nhiệt độ|lạnh|nóng)/iu', $msgLower)) {
            $responseText = "🌦️ Về thời tiết, bạn nên kiểm tra kỹ dự báo trước ngày khởi hành khoảng 3-5 ngày để chuẩn bị đồ đạc phù hợp nhé. Nếu đi biển thì nhớ mang kem chống nắng, đi núi thì mang áo ấm nha!";
            $isMatched = true;
        }
        elseif (preg_match('/(chính sách hủy|hủy tour|đổi lịch|hoàn tiền|hủy vé)/iu', $msgLower)) {
            $responseText = "<b>Chính sách hủy & thay đổi tour:</b><br>- Trước 90 ngày: Phí 5.000.000đ/khách.<br>- Từ 45-89 ngày: Phí 15.000.000đ/khách.<br>- Từ 30-44 ngày: Phí 50% tổng giá tour.<br>- Dưới 19 ngày: 100% giá tour.<br><i class='text-danger'>Lưu ý: Lễ Tết không hỗ trợ hoàn hủy.</i>";
            $isMatched = true;
        }
        elseif (preg_match('/(trẻ em|em bé|dưới 2 tuổi|10 tuổi|chính sách trẻ)/iu', $msgLower)) {
            $responseText = "<b>Chính sách trẻ em:</b><br>- <b>Dưới 2 tuổi:</b> Giá ưu đãi, ngủ chung với bố mẹ.<br>- <b>Từ 2 đến dưới 10 tuổi:</b> Có mức giá ưu đãi riêng, hưởng đầy đủ dịch vụ.<br>- <b>Từ 10 tuổi:</b> Tính như giá người lớn nhé bạn! 👨‍👩‍👧‍👦";
            $isMatched = true;
        }
        elseif (preg_match('/(visa|hộ chiếu|xuất cảnh|thủ tục đi)/iu', $msgLower)) {
            $responseText = "<b>Thông tin Visa (Tour Quốc Tế):</b><br>- Hộ chiếu phải còn hạn trên 6 tháng.<br>- Ảnh thẻ 3.5 x 4.5 nền trắng.<br>- Nộp hồ sơ trước ít nhất 15 ngày.<br>👉 Ixtal Tour sẽ lo trọn gói 100% thủ tục cho bạn nhé! 🛂";
            $isMatched = true;
        }
        elseif (preg_match('/(cách thanh toán|phương thức|trả tiền|vnpay|chuyển khoản)/iu', $msgLower)) {
            $responseText = "Ixtal Tour hỗ trợ 3 hình thức:<br>1️⃣ <b>Ví VNPay:</b> Thanh toán tự động, an toàn.<br>2️⃣ <b>Chuyển khoản / Quét mã QR:</b> Nhanh chóng qua app ngân hàng.<br>3️⃣ <b>Tiền mặt:</b> Tại văn phòng 03 Quang Trung, Đà Nẵng. 💳";
            $isMatched = true;
        }
        elseif (preg_match('/(lịch sử|hóa đơn|vé|đơn hàng|đã mua|đã đặt)/iu', $msgLower)) {
            if ($user) {
                $hoadons = HoaDon::where('id_khach_hang', $user->id)->with(['ds_ve', 'tour'])->orderBy('created_at', 'desc')->limit(5)->get();
                if ($hoadons->count() > 0) {
                    $responseText = "Các đơn hàng gần đây của <b>{$userName}</b>: 📦<br><br>";
                    foreach($hoadons as $hd) {
                        $tourName = $hd->tour ? $hd->tour->ten_tour : "Tour đã bị xóa";
                        $status = $hd->trang_thai == 2 ? '<span style="color: #198754;">✅ Đã thanh toán</span>' : ($hd->trang_thai == 1 ? '<span style="color: #ffc107;">⏳ Chờ thanh toán</span>' : '<span style="color: #dc3545;">❌ Đã hủy</span>');
                        $tien = number_format($hd->tong_tien) . ' VNĐ';
                        $responseText .= "🏷️ <b>Mã đơn: #{$hd->ma_hoa_don}</b><br>🌍 Hành trình: <b>$tourName</b><br>💰 Tổng tiền: <b style='color:#dc3545;'>$tien</b><br>📌 Trạng thái: <b>$status</b><br><hr style='border-top: 1px dashed #ccc; margin: 10px 0;'>";
                    }
                    $buttons = [['text' => '📦 Xem Tất Cả', 'type' => 'route', 'route' => '/client/lich-su-dat-tour']];
                } else {
                    $responseText = "Bạn chưa đặt chuyến đi nào cả. Đặt tour ngay thôi! ✈️";
                    $buttons = [['text' => '🔥 Xem tour hot', 'type' => 'message', 'message' => 'tour bán chạy']];
                }
            } else {
                $responseText = "Bạn chưa đăng nhập! 😅 Hãy đăng nhập để kiểm tra lịch sử hóa đơn nhé. 🔐";
                $buttons = [['text' => '🔐 Đăng nhập', 'type' => 'route', 'route' => '/client/dang-nhap']];
            }
            $isMatched = true;
        }

        // ====================================================================
        // NHÓM 2: LỌC QUỐC GIA (Ưu tiên số 1 - Khớp chính xác nhất)
        // ====================================================================
        if (!$isMatched) {
            foreach ($quocGias as $qgName => $qgId) {
                // Kiểm tra nếu người dùng gõ đúng tên quốc gia
                if (mb_strpos($msgLower, $qgName) !== false) {
                    $toursQuery = $this->buildBaseQuery()->where('id_quoc_gia', $qgId);
                    $responseText = "Đây là toàn bộ các tour đi <b>" . ucwords($qgName) . "</b> mà bạn đang tìm kiếm đây! ✈️";
                    $isMatched = true;
                    break;
                }
            }
        }

        // ====================================================================
        // NHÓM 3: LỌC VÙNG MIỀN (Chỉ hiện tour trong nước)
        // ====================================================================
        if (!$isMatched) {
            // Đảm bảo chỉ tìm trong id_quoc_gia = 1 (Việt Nam)
            if (mb_strpos($msgLower, 'miền bắc') !== false) {
                $toursQuery = $this->buildBaseQuery()->where('id_quoc_gia', 1)->where(function($q) use ($mienBac) {
                    $this->applyLocationFilter($q, $mienBac);
                });
                $responseText = "Du lịch <b>Miền Bắc</b> khám phá sương mù và núi non hùng vĩ nha! 📸 Đây là các tour Miền Bắc:";
                $isMatched = true;
            }
            elseif (mb_strpos($msgLower, 'miền trung') !== false) {
                $toursQuery = $this->buildBaseQuery()->where('id_quoc_gia', 1)->where(function($q) use ($mienTrung) {
                    $this->applyLocationFilter($q, $mienTrung);
                });
                $responseText = "Nắng gió <b>Miền Trung</b> và biển xanh đang vẫy gọi! 🌊 Trọn bộ tour Miền Trung đây ạ:";
                $isMatched = true;
            }
            elseif (mb_strpos($msgLower, 'miền nam') !== false || mb_strpos($msgLower, 'miền tây') !== false) {
                $toursQuery = $this->buildBaseQuery()->where('id_quoc_gia', 1)->where(function($q) use ($mienNam) {
                    $this->applyLocationFilter($q, $mienNam);
                });
                $responseText = "Khám phá sông nước miệt vườn <b>Miền Nam</b> thôi! 🛶 Danh sách chính xác cho bạn:";
                $isMatched = true;
            }
            // Thêm logic riêng cho Tour nước ngoài để không bị dính tour trong nước
            elseif (preg_match('/(nước ngoài|quốc tế|ngoài nước)/iu', $msgLower)) {
                $responseText = "Xách ba lô lên và bay ra thế giới thôi {$userName} ơi! ✈️ Đây là các tour Quốc tế cực phẩm:";
                $toursQuery = $this->buildBaseQuery()->where('id_quoc_gia', '!=', 1);
                $isMatched = true;
            }
        }

        // ====================================================================
        // NHÓM 4: LỌC TÍNH TỪ VÀ NHU CẦU CỤ THỂ
        // ====================================================================
        if (!$isMatched) {
            if (preg_match('/(bán chạy|hot|phổ biến|nhiều người đi)/iu', $msgLower)) {
                $responseText = "Các tour siêu HOT, liên tục cháy vé tháng này của Ixtal Tour đây ạ! 🔥";
                $toursQuery = $this->buildBaseQuery()->orderByDesc('avg_sao')->orderByDesc('gia');
                $isMatched = true;
            }
            elseif (preg_match('/(rẻ|tiết kiệm|khuyến mãi|bình dân|giá rẻ)/iu', $msgLower)) {
                $responseText = "Đi chơi thả ga mà không lo xẹp ví! 💸 Dưới đây là các chuyến đi siêu tiết kiệm:";
                $toursQuery = $this->buildBaseQuery()->where('gia', '<=', 3000000)->orderBy('gia', 'asc');
                $isMatched = true;
            }
            elseif (preg_match('/(cao cấp|vip|sang trọng|5 sao|nghỉ dưỡng)/iu', $msgLower)) {
                $responseText = "Trải nghiệm kỳ nghỉ dưỡng đẳng cấp VIP dành riêng cho {$userName}! ✨";
                $toursQuery = $this->buildBaseQuery()->where('gia', '>=', 10000000)->orderBy('gia', 'desc');
                $isMatched = true;
            }
            elseif (preg_match('/(dưới|trên|khoảng)\s*([0-9]+)\s*(triệu|tr|củ)?/iu', $msgLower, $matches)) {
                $dieuKien = mb_strtolower($matches[1], 'UTF-8');
                $soTien = (int)$matches[2] * 1000000;
                if ($dieuKien == 'dưới') {
                    $responseText = "Đã lọc ra các tour có giá <b>dưới " . $matches[2] . " triệu</b> cho bạn! 💸";
                    $toursQuery = $this->buildBaseQuery()->where('gia', '<=', $soTien)->orderBy('gia', 'desc');
                } else {
                    $responseText = "Đây là các tour cao cấp có giá <b>trên " . $matches[2] . " triệu</b>! 😎";
                    $toursQuery = $this->buildBaseQuery()->where('gia', '>=', $soTien)->orderBy('gia', 'asc');
                }
                $isMatched = true;
            }
        }

        // ====================================================================
        // NHÓM 5: TÌM KIẾM THEO TÊN EXACT MATCH (Tuyệt đối chính xác)
        // ====================================================================
        if (!$isMatched) {
            // Bước 1: Ưu tiên tìm xem có Tour nào chứa TRỌN VẸN nguyên câu người dùng gõ không
            $exactQuery = $this->buildBaseQuery()->where('ten_tour', 'like', '%' . $message . '%');

            if ($exactQuery->count() > 0) {
                // Nếu có, chỉ trả về đúng tour đó
                $toursQuery = $exactQuery;
                $responseText = "Bingo! 🎯 Mình tìm thấy chính xác Tour mang tên <b>\"{$message}\"</b> mà bạn yêu cầu:";
            } else {
                // Bước 2: Tách từ khóa (chỉ lọc từ > 2 ký tự) để tìm ở Tên Tour hoặc Điểm Đến
                $keywords = array_filter(explode(' ', $msgLower), function($k) { return mb_strlen($k, 'UTF-8') > 2; });

                if(count($keywords) == 0) {
                    $responseText = "Xin lỗi, mình chưa hiểu ý bạn lắm 😅. Hãy thử gõ chính xác: <b>Đà Lạt, Thái Lan, Miền Bắc, Tour dưới 5 triệu...</b> để mình hỗ trợ nhé! 🧭";
                } else {
                    $toursQuery = $this->buildStrictSearchQuery($keywords);
                    $responseText = "Mình đã rà soát hệ thống và tìm được các tour có liên quan đến <b>\"{$message}\"</b> nè! 👇";
                }
            }
        }

        // ====================================================================
        // THỰC THI TRUY VẤN VÀ PHÂN TRANG
        // ====================================================================
        if ($toursQuery !== null) {
            $total = $toursQuery->count();
            $tours = $toursQuery->offset($offset)->limit($limit)->get();
            $hasMore = $total > ($offset + $limit);

            if (count($tours) > 0) {
                if ($offset > 0) {
                    $responseText = "Đây là các tour tiếp theo dành cho bạn 👇";
                }
            } else {
                $responseText = "Uisss 😅, tìm mỏi mắt mà hệ thống hiện không có chuyến đi nào khớp chính xác với <b>\"{$message}\"</b> cả. Bạn tham khảo các Tour đang HOT nhất hiện nay nhé! 🔥";
                $tours = $this->buildBaseQuery()->orderByDesc('avg_sao')->limit(5)->get();
                $hasMore = false;
                $buttons = [
                    ['text' => '🧭 Xem Tour Trong Nước', 'type' => 'route', 'route' => '/client/tour/tour-trong-nuoc'],
                    ['text' => '✈️ Xem Tour Quốc Tế', 'type' => 'route', 'route' => '/client/tour/tour-ngoai-nuoc'],
                ];
            }
        }

        return response()->json([
            'status' => true,
            'response' => $responseText,
            'tours' => $tours ?? [],
            'buttons' => $buttons,
            'hasMore' => $hasMore,
            'ai_powered' => false,
            'keyword_used' => $message
        ]);
    }

    private function applyLocationFilter($query, $locationArray)
    {
        foreach ($locationArray as $kw) {
            $query->orWhere('ten_tour', 'like', '%' . $kw . '%')
                  ->orWhere('diem_don', 'like', '%' . $kw . '%')
                  ->orWhere('diem_tra', 'like', '%' . $kw . '%');
        }
    }

    /**
     * 4. HÀM KHỞI TẠO QUERY GỐC LUÔN TỰ ĐỘNG TÍNH SAO TRUNG BÌNH
     */
    private function buildBaseQuery()
    {
        return Tour::where('tinh_trang', 1)
                   ->withAvg('danhgias as avg_sao', 'sao_danh_gia');
    }

    /**
     * 5. HÀM TÌM KIẾM NGHIÊM NGẶT (Chỉ tìm trong Tên Tour, Điểm Đón, Điểm Trả - Bỏ qua Mô Tả)
     * Việc bỏ qua cột "mo_ta" giúp kết quả chính xác 100%, không bị dính các tour rác.
     */
    private function buildStrictSearchQuery($keywordArray)
    {
        $query = $this->buildBaseQuery();

        $query->where(function($q) use ($keywordArray) {
            foreach ($keywordArray as $kw) {
                $q->orWhere('ten_tour', 'like', '%' . $kw . '%')
                  ->orWhere('diem_don', 'like', '%' . $kw . '%')
                  ->orWhere('diem_tra', 'like', '%' . $kw . '%');
            }
        });

        return $query;
    }
}
