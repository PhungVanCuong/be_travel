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
        $user = Auth::guard('sanctum')->user();

        // NẾU CÓ CÀI GEMINI API TRONG FILE .ENV, CHÚNG TA SẼ DÙNG AI
        $apiKey = env('GEMINI_API_KEY');
        if (!empty($apiKey)) {
            return $this->callGeminiAI($message, $user, $apiKey);
        }

        // NẾU KHÔNG CÓ GEMINI (HOẶC API BỊ LỖI), GỌI LOGIC TỰ BUILD
        return $this->fallbackLogic($message, $user);
    }

    /**
     * 2. HÀM KẾT NỐI GEMINI AI
     */
    private function callGeminiAI($message, $user, $apiKey)
    {
        // Chuẩn bị dữ liệu mớm cho AI
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

        // Nếu Gemini lỗi, tự rớt xuống Fallback
        return $this->fallbackLogic($message, $user);
    }

    /**
     * 3. HÀM LOGIC CỨNG DỰ PHÒNG (Không cần AI vẫn chạy siêu tốt)
     */
    private function fallbackLogic($message, $user)
    {
        $msgLower = mb_strtolower($message, 'UTF-8');
        $userName = $user ? $user->ho_va_ten : "bạn";

        $responseText = "";
        $tours = [];
        $buttons = [];

        // Kịch bản Chào hỏi
        if (preg_match('/(chào|hi|hello|ê bot|xin chào|hey)/iu', $msgLower)) {
            $nameStr = $user ? " <b>" . $user->ho_va_ten . "</b>" : "";
            $responseText = "Hehe xin chào{$nameStr}! 👋 Mình là Trợ lý siêu cấp đáng yêu của Ixtal Tour đây. Bạn đang muốn tìm một chuyến đi xả stress hay cần mình kiểm tra đơn hàng nè? 🍯";
            $buttons = [
                ['text' => '🔥 Xem tour hot', 'type' => 'message', 'message' => 'tour bán chạy'],
                ['text' => '🌊 Đi Biển', 'type' => 'message', 'message' => 'tour biển'],
            ];
        }
        // Kịch bản Hướng dẫn viên
        elseif (preg_match('/(hướng dẫn viên|hdv|guide|dẫn đoàn)/iu', $msgLower)) {
            $hdvs = HuongDanVien::where('is_active', 1)->inRandomOrder()->limit(10)->get();
            $responseText = "Trời ơi, nhắc đến Hướng dẫn viên của Ixtal Tour thì chỉ có chữ ĐỈNH! 🤩 Các anh chị ấy cực kỳ rành đường và siêu nhiệt tình nha. Tiêu biểu như:<br><br>";
            foreach($hdvs as $hdv) {
                $responseText .= "👨‍🏫 <b>{$hdv->ho_va_ten}</b> - Ngoại ngữ: {$hdv->ngon_ngu}<br>";
            }
            $responseText .= "<br>Bạn bấm vào đây để xem profile chi tiết nhé! 👇";
            $buttons = [['text' => '👨‍🏫 Xem Danh Sách HDV', 'type' => 'route', 'route' => '/client/huong-dan-vien']];
        }
        // ====================================================================
        // Kịch bản: KIỂM TRA LỊCH SỬ / HÓA ĐƠN ĐẶT TOUR
        // ====================================================================
        elseif (preg_match('/(lịch sử|hóa đơn|vé|đơn hàng|thanh toán|đã mua|đã đặt)/iu', $msgLower)) {
            if ($user) {
                // Lấy 5 hóa đơn gần nhất cùng với thông tin vé và tour
                $hoadons = HoaDon::where('id_khach_hang', $user->id)
                                 ->with(['ds_ve', 'tour'])
                                 ->orderBy('created_at', 'desc')
                                 ->limit(5)
                                 ->get();

                if ($hoadons->count() > 0) {
                    $responseText = "Mình tìm thấy các đơn hàng gần đây của <b>{$userName}</b> nè! 📦<br><br>";

                    foreach($hoadons as $hd) {
                        $tourName = $hd->tour ? $hd->tour->ten_tour : "Tour đã bị xóa";
                        $status = $hd->trang_thai == 2 ? '<span style="color: #198754;">✅ Đã thanh toán</span>' : ($hd->trang_thai == 1 ? '<span style="color: #ffc107;">⏳ Chờ thanh toán</span>' : '<span style="color: #dc3545;">❌ Đã hủy</span>');
                        $tien = number_format($hd->tong_tien) . ' VNĐ';

                        // Lấy thời gian đặt (sử dụng Carbon để format)
                        $ngay = \Carbon\Carbon::parse($hd->ngay_tao ?? $hd->created_at)->format('d/m/Y H:i');
                        $soLuong = $hd->so_luong_nguoi;
                        $phuongThuc = $hd->phuong_thuc_thanh_toan ?? 'Chưa xác định';
                        $ghiChu = !empty($hd->ghi_chu_danh_sach_nguoi_di) ? "<i>Ghi chú: {$hd->ghi_chu_danh_sach_nguoi_di}</i>" : "<i style='color: #888;'>Không có ghi chú</i>";

                        // Trang trí layout hiển thị cho từng hóa đơn
                        $responseText .= "🏷️ <b>Mã đơn: #{$hd->ma_hoa_don}</b><br>";
                        $responseText .= "🌍 Hành trình: <b>$tourName</b><br>";
                        $responseText .= "🗓️ Ngày đặt: $ngay<br>";
                        $responseText .= "👥 Số lượng: $soLuong người<br>";
                        $responseText .= "💳 Thanh toán: $phuongThuc<br>";
                        $responseText .= "💰 Tổng tiền: <b style='color:#dc3545; font-size: 15px;'>$tien</b><br>";
                        $responseText .= "📌 Trạng thái: <b>$status</b><br>";
                        $responseText .= "📝 $ghiChu<br>";
                        $responseText .= "<hr style='margin:12px 0; border-top: 1px dashed #ccc;'>";
                    }

                    $responseText .= "Bạn có thể vào trang quản lý bên dưới để xem chi tiết hơn hoặc tiến hành thanh toán nhé! 👇";
                    $buttons = [['text' => '📦 Xem Tất Cả Lịch Sử', 'type' => 'route', 'route' => '/client/lich-su-dat-tour']];
                } else {
                    $responseText = "Hệ thống ghi nhận <b>{$userName}</b> chưa đặt chuyến đi nào cả. Nhanh tay chốt một tour để vi vu cùng Ixtal Tour ngay thôi! ✈️";
                    $buttons = [['text' => '🔥 Xem tour hot', 'type' => 'message', 'message' => 'tour bán chạy']];
                }
            } else {
                $responseText = "Ui cha, <b>{$userName}</b> chưa đăng nhập mất rồi! 😅 Mình không biết bạn là ai để tra cứu lịch sử. Bạn bấm nút Đăng nhập bên dưới giúp mình nha! 🔐";
                $buttons = [['text' => '🔐 Đăng nhập ngay', 'type' => 'route', 'route' => '/client/dang-nhap']];
            }
        }
        // Kịch bản Tour Hot / Rẻ
        elseif (preg_match('/(bán chạy|hot|phổ biến)/iu', $msgLower)) {
            $responseText = "Các tour siêu HOT, liên tục cháy vé tháng này của Ixtal Tour đây ạ! 🔥 Đặt lẹ kẻo hết nha:";
            $tours = Tour::where('tinh_trang', 1)->withAvg('danhgias as avg_sao', 'sao_danh_gia')
                ->orderBy('avg_sao', 'desc')->orderBy('gia', 'desc')->limit(5)->get();
        }
        elseif (preg_match('/(rẻ|tiết kiệm|khuyến mãi|dưới 2 triệu|ngon|bình dân)/iu', $msgLower)) {
            $responseText = "Đi chơi thả ga mà không lo xẹp ví! 💸 Dưới đây là các chuyến đi dưới 2 triệu dành cho bạn:";
            $tours = Tour::where('tinh_trang', 1)->where('gia', '<=', 2000000)->orderBy('gia', 'asc')->limit(5)->get();
        }
        elseif (preg_match('/(dưới|trên|khoảng)\s*([0-9]+)\s*(triệu|tr|củ)?/iu', $msgLower, $matches)) {
            $dieuKien = mb_strtolower($matches[1], 'UTF-8'); // Bắt chữ "dưới" hoặc "trên"
            $soTien = (int)$matches[2] * 1000000; // Bắt con số và nhân với 1 triệu

            if ($dieuKien == 'dưới') {
                $responseText = "Mình đã lọc ra các tour có giá <b>dưới " . $matches[2] . " triệu</b> cho {$userName} rồi đây! 💸 Rất tiết kiệm luôn nha:";
                $tours = Tour::where('tinh_trang', 1)
                    ->where('gia', '<=', $soTien)
                    ->orderBy('gia', 'desc')
                    ->limit(5)->get();
            } else {
                $responseText = "Chơi lớn luôn! 😎 Đây là các tour cao cấp có giá <b>trên " . $matches[2] . " triệu</b>, đảm bảo mang lại trải nghiệm dịch vụ 5 sao xuất sắc cho {$userName}:";
                $tours = Tour::where('tinh_trang', 1)
                    ->where('gia', '>=', $soTien)
                    ->orderBy('gia', 'asc')
                    ->limit(5)->get();
            }

            // Xử lý nếu không tìm thấy tour nào trong tầm giá đó
            if ($tours->count() == 0) {
                $responseText = "Tiếc quá 😅, hiện tại mình không có tour nào khớp với mức giá <b>$dieuKien {$matches[2]} triệu</b>. {$userName} thử xem các tour đang HOT nhất của bên mình nhé 👇";
                $tours = Tour::where('tinh_trang', 1)->withAvg('danhgias as avg_sao', 'sao_danh_gia')->orderBy('avg_sao', 'desc')->limit(5)->get();
            }
        }

        // Kịch bản từ khóa chung chung: Rẻ, tiết kiệm
        elseif (preg_match('/(rẻ|tiết kiệm|khuyến mãi|giá tốt)/iu', $msgLower)) {
            $responseText = "Đi chơi thả ga mà không lo xẹp ví! 💸 Dưới đây là các chuyến đi siêu tiết kiệm (dưới 3 triệu) dành cho bạn:";
            $tours = Tour::where('tinh_trang', 1)->where('gia', '<=', 3000000)->orderBy('gia', 'asc')->limit(5)->get();
        }

        // Kịch bản từ khóa: Sang trọng, VIP, cao cấp
        elseif (preg_match('/(cao cấp|vip|sang trọng|5 sao)/iu', $msgLower)) {
            $responseText = "Trải nghiệm kỳ nghỉ dưỡng đẳng cấp 5 sao dành riêng cho {$userName}! ✨ Dưới đây là những tour VIP nghỉ dưỡng cực kỳ sang trọng:";
            $tours = Tour::where('tinh_trang', 1)->where('gia', '>=', 10000000)->orderBy('gia', 'desc')->limit(5)->get();
        }
        // Kịch bản Vùng miền / Nước ngoài
        elseif (preg_match('/(nước ngoài|quốc tế|ngoài nước|thái lan|trung quốc|đài loan|bali|dubai|singapore|nhật|hàn|malaysia)/iu', $msgLower)) {
            $responseText = "Xách ba lô lên và bay ra thế giới thôi {$userName} ơi! ✈️ Ixtal Tour lo hết, bạn xem qua nhé! 🌍";
            $tours = Tour::where('tinh_trang', 1)->where('id_quoc_gia', '!=', 1)->limit(5)->get();
            $buttons = [['text' => '✈️ Xem tất cả Tour Quốc Tế', 'type' => 'route', 'route' => '/client/tour/tour-ngoai-nuoc']];
        }
        elseif (preg_match('/(đà lạt|lâm đồng)/iu', $msgLower)) {
            $responseText = "Đà Lạt chưa bao giờ làm ta thất vọng! 🌲 Bỏ túi ngay mấy tour đi săn mây cực chill nè. 🌸";
            $tours = $this->searchTours(['đà lạt', 'lâm đồng']);
        }
        elseif (preg_match('/(miền bắc|sapa|hà nội|ninh bình|hạ long|tà xùa)/iu', $msgLower)) {
            $responseText = "Mê mẩn với sương mù và núi non hùng vĩ Miền Bắc đúng không? 😍 Ixtal Tour có mấy chuyến cực phẩm nè! 📸";
            $tours = $this->searchTours(['miền bắc', 'sapa', 'hà nội', 'hạ long', 'ninh bình', 'tà xùa']);
        }
        elseif (preg_match('/(miền trung|đà nẵng|huế|hội an|quảng bình|nha trang|phú yên)/iu', $msgLower)) {
            $responseText = "Nắng gió Miền Trung đang vẫy gọi! 🌊 Mình chọn sẵn cho {$userName} mấy tour siêu xịn rồi đây! 🏮";
            $tours = $this->searchTours(['miền trung', 'đà nẵng', 'huế', 'hội an', 'nha trang', 'quy nhơn', 'phú yên', 'quảng bình']);
        }
        elseif (preg_match('/(miền nam|miền tây|cần thơ|chợ nổi|sài gòn|phú quốc|hồ chí minh)/iu', $msgLower)) {
            $responseText = "Về miền sông nước lênh đênh chợ nổi và thưởng thức trái cây miệt vườn thôi {$userName} ơi! 🛶";
            $tours = $this->searchTours(['miền nam', 'miền tây', 'phú quốc', 'cần thơ', 'hồ chí minh', 'sài gòn']);
        }
        elseif (preg_match('/(biển|đảo|vịnh)/iu', $msgLower)) {
            $responseText = "Thèm Vitamin Sea rồi đúng không? 🏖️ Cùng lặn ngắm san hô với mấy tour này nha: 🦐🦀";
            $tours = $this->searchTours(['biển', 'đảo', 'vịnh', 'nha trang', 'phú quốc', 'hạ long']);
        }
        // Tìm kiếm tự do theo cụm
        else {
            $keywords = array_filter(explode(' ', $msgLower), function($k) { return mb_strlen($k, 'UTF-8') > 2; });

            $toursQuery = Tour::where('tinh_trang', 1);
            $toursQuery->where(function($q) use ($keywords, $msgLower) {
                $q->where('ten_tour', 'like', '%' . $msgLower . '%')
                  ->orWhere('diem_tra', 'like', '%' . $msgLower . '%')
                  ->orWhere('mo_ta', 'like', '%' . $msgLower . '%');

                foreach ($keywords as $kw) {
                    $q->orWhere('ten_tour', 'like', '%' . $kw . '%')
                      ->orWhere('diem_tra', 'like', '%' . $kw . '%')
                      ->orWhere('mo_ta', 'like', '%' . $kw . '%');
                }
            });

            $tours = $toursQuery->limit(5)->get();

            if (count($tours) > 0) {
                $responseText = "Tada! 🪄 Mình tìm được " . count($tours) . " tour cực kỳ chuẩn gu của {$userName} nè. Xem nha! 👇";
            } else {
                $responseText = "Uisss 😅, tìm mỏi mắt nhưng chưa thấy tour nào khớp với yêu cầu của {$userName}. Bạn thử tìm với từ khóa (Sapa, Đà Nẵng, Nước ngoài) xem nhé! 🧭";
                $buttons = [
                    ['text' => '🧭 Xem Tour Trong Nước', 'type' => 'route', 'route' => '/client/tour/tour-trong-nuoc'],
                    ['text' => '✈️ Xem Tour Quốc Tế', 'type' => 'route', 'route' => '/client/tour/tour-ngoai-nuoc'],
                ];
            }
        }

        return response()->json([
            'status' => true,
            'response' => $responseText,
            'tours' => $tours,
            'buttons' => $buttons,
            'ai_powered' => false
        ]);
    }

    /**
     * 4. HÀM HỖ TRỢ QUERY NHIỀU TỪ KHÓA MỘT LÚC
     */
    private function searchTours($keywordArray)
    {
        return Tour::where('tinh_trang', 1)
            ->where(function($q) use ($keywordArray) {
                foreach ($keywordArray as $kw) {
                    $q->orWhere('ten_tour', 'like', '%' . $kw . '%')
                      ->orWhere('diem_tra', 'like', '%' . $kw . '%')
                      ->orWhere('mo_ta', 'like', '%' . $kw . '%');
                }
            })->limit(5)->get();
    }
}
