<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\Ve;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ZaloPayController extends Controller
{
    // Thông tin Sandbox mặc định của ZaloPay (Dùng để test)
    private $app_id = "2553";
    private $key1 = "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL";
    private $key2 = "kLtgPl8YESDxcTjOErSqEEzfdVylRNRt";
    private $endpoint_create = "https://sb-openapi.zalopay.vn/v2/create";

    /**
     * 1. TẠO LINK THANH TOÁN ZALOPAY
     */
    public function createPayment(Request $request)
    {
        $hoaDon = HoaDon::find($request->id_hoa_don);
        if (!$hoaDon) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }

        $hoaDon->phuong_thuc_thanh_toan = 'ZALOPAY';
        $hoaDon->save();

        $frontendUrl = $request->header('Origin') ? $request->header('Origin') : 'http://localhost:5173';
        $returnUrl = rtrim($frontendUrl, '/') . "/Ket-qua-thanh-toan";
        $ipnUrl = url('/api/client/zalopay/ipn');

        $app_trans_id = date("ymd") . "_" . $hoaDon->id . "_" . time(); 
        $app_user = "ixtal_tour_" . $hoaDon->id_khach_hang;
        $app_time = round(microtime(true) * 1000); // milliseconds
        $amount = (int) round($hoaDon->tong_tien);
        $item = json_encode([["itemid" => (string)$hoaDon->id, "itemname" => "Thanh toán hóa đơn #" . $hoaDon->id]]);
        
        // ZaloPay yêu cầu truyền return_url vào trong biến embed_data
        $embeddata = json_encode(['redirecturl' => $returnUrl]);

        // Tạo chuỗi MAC
        $data = $this->app_id . "|" . $app_trans_id . "|" . $app_user . "|" . $amount . "|" . $app_time . "|" . $embeddata . "|" . $item;
        $mac = hash_hmac("sha256", $data, $this->key1);

        $postData = [
            "app_id" => $this->app_id,
            "app_trans_id" => $app_trans_id,
            "app_user" => $app_user,
            "app_time" => $app_time,
            "item" => $item,
            "embed_data" => $embeddata,
            "amount" => $amount,
            "description" => "Ixtal Tour - Thanh toan #" . $hoaDon->id,
            "bank_code" => "", // Để trống để khách tự chọn phương thức thẻ/ví
            "mac" => $mac,
            "callback_url" => $ipnUrl
        ];

        // Gửi request API dạng Form Data (ZaloPay yêu cầu)
        $response = Http::asForm()->post($this->endpoint_create, $postData);
        $result = $response->json();

        if (isset($result['return_code']) && $result['return_code'] == 1) {
            return response()->json([
                'status' => true,
                'message' => 'Tạo link thanh toán thành công',
                'data' => $result['order_url'], // URL để chuyển hướng khách hàng
                'chi_tiet' => $result
            ]);
        }

        Log::error('Lỗi tạo giao dịch ZaloPay: ', $result);
        return response()->json([
            'status' => false,
            'message' => 'Lỗi ZaloPay: ' . ($result['return_message'] ?? 'Lỗi không xác định'),
            'chi_tiet' => $result
        ]);
    }

    /**
     * HÀM GỬI MAIL VÉ ĐIỆN TỬ
     */
    private function guiMailVeDienTu($hoaDon)
    {
        $user = $hoaDon->khachHang;
        $tour = $hoaDon->tour;
        $ds_ve = Ve::where('id_hoa_don', $hoaDon->id)->get();
        $data_mail = ['khach_hang' => $user, 'hoa_don' => $hoaDon, 'tour' => $tour, 'danh_sach_ve' => $ds_ve];

        try {
            Mail::send('mail_InVe', ['data' => $data_mail], function ($message) use ($user) {
                $message->to($user->email)->subject('🎟️ Vé Điện Tử - Xác nhận thanh toán ZaloPay thành công từ Ixtal Tour');
            });
            Log::info('Gửi mail vé điện tử ZaloPay thành công cho HD: ' . $hoaDon->id);
        } catch (\Exception $e) {
            Log::error('Lỗi gửi mail (ZaloPay): ' . $e->getMessage());
        }
    }

    /**
     * 2. KIỂM TRA TRẠNG THÁI (Lúc quay lại Web)
     */
    public function checkThanhToan(Request $request)
    {
        // Khi ZaloPay redirect về, nó sẽ truyền tham số apptransid và status
        $status = $request->status; // 1: Thành công, -49: Hủy giao dịch...
        $apptransid = $request->apptransid;

        if ($status == 1 && $apptransid) {
            $hoaDonId = explode('_', $apptransid)[1];
            $hoa_don = HoaDon::with('ds_ve')->find($hoaDonId);

            if ($hoa_don && $hoa_don->trang_thai == 1) {
                $hoa_don->trang_thai = 2;
                $hoa_don->phuong_thuc_thanh_toan = 'ZALOPAY';
                $hoa_don->save();
                $hoa_don->ds_ve()->update(['tinh_trang' => 2]);

                $this->guiMailVeDienTu($hoa_don);

                return response()->json([
                    'status' => true,
                    'message' => 'Thanh toán ZaloPay thành công',
                    'data' => [
                        'ma_hoa_don' => $hoa_don->ma_hoa_don ?? $hoa_don->id,
                        'tong_tien' => $hoa_don->tong_tien,
                        'ngay_thanh_toan' => date('d/m/Y H:i:s'),
                        'phuong_thuc' => 'ZaloPay'
                    ]
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'message' => 'Giao dịch ZaloPay thất bại hoặc đã bị hủy'
        ]);
    }

    /**
     * 3. WEBHOOK / IPN TỪ ZALOPAY (Chạy ngầm)
     */
    public function zaloPayIpn(Request $request)
    {
        $postdatajson = $request->all();
        $mac = hash_hmac("sha256", $postdatajson["data"], $this->key2);

        // Kiểm tra chữ ký bảo mật ZaloPay
        if ($mac !== $postdatajson["mac"]) {
            return response()->json(['return_code' => -1, 'return_message' => 'MAC không hợp lệ']);
        }

        $requestdata = json_decode($postdatajson["data"], true);
        $apptransid = $requestdata["app_trans_id"];
        $hoaDonId = explode('_', $apptransid)[1];
        
        $hoa_don = HoaDon::find($hoaDonId);

        if ($hoa_don && $hoa_don->trang_thai == 1) {
            DB::beginTransaction();
            try {
                $hoa_don->trang_thai = 2;
                $hoa_don->phuong_thuc_thanh_toan = 'ZALOPAY';
                $hoa_don->save();
                Ve::where('id_hoa_don', $hoa_don->id)->update(['tinh_trang' => 2]);

                $this->guiMailVeDienTu($hoa_don);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Lỗi ZaloPay IPN: ' . $e->getMessage());
            }
        }
        
        // ZaloPay bắt buộc phản hồi JSON chuẩn này để xác nhận đã nhận tín hiệu
        return response()->json(['return_code' => 1, 'return_message' => 'success']);
    }
}