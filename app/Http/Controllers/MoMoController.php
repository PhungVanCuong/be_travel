<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\Ve;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class MomoController extends Controller
{
    // Sử dụng bộ Key Test được cung cấp
    private $partnerCode = 'MOMOBKUN20180529';
    private $accessKey = 'klm05TvNBzhg7h7j';
    private $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    private $endpoint = 'https://test-payment.momo.vn/v2/gateway/api/create';

    // Sử dụng bộ Key Live thật sự khi triển khai
    // // Thay đổi bằng thông tin thật lấy từ MoMo Business
    // private $partnerCode = 'MÃ_PARTNER_THẬT';
    // private $accessKey = 'ACCESS_KEY_THẬT';
    // private $secretKey = 'SECRET_KEY_THẬT';
    // // Đổi đường dẫn API từ Test sang Live
    // private $endpoint = 'https://payment.momo.vn/v2/gateway/api/create';

    /**
     * 1. TẠO LINK THANH TOÁN MOMO
     */
    public function createPayment(Request $request)
    {
        $hoaDon = HoaDon::find($request->id_hoa_don);
        if (!$hoaDon) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }

        $hoaDon->phuong_thuc_thanh_toan = 'MOMO';
        $hoaDon->save();

        // Tự động nhận diện Domain của Frontend
        $frontendUrl = $request->header('Origin') ? $request->header('Origin') : 'http://localhost:5173';

        $returnUrl = rtrim($frontendUrl, '/') . "/Ket-qua-thanh-toan";
        $ipnUrl = url('/api/client/momo/ipn');

        $orderId = $hoaDon->id . '_' . time();
        $requestId = time() . "";

        // Ép kiểu amount về chuỗi (string) để khớp 100% khi tạo chữ ký
        $amount = (string) round($hoaDon->tong_tien);

        $orderInfo = "Thanh toan hoa don Ixtal Tour ma " . $hoaDon->id;
        $extraData = "";
        $requestType = "captureWallet";

        // Tạo chuỗi chữ ký (Raw Hash) theo đúng thứ tự Alphabet
        $rawHash = "accessKey=" . $this->accessKey .
                   "&amount=" . $amount .
                   "&extraData=" . $extraData .
                   "&ipnUrl=" . $ipnUrl .
                   "&orderId=" . $orderId .
                   "&orderInfo=" . $orderInfo .
                   "&partnerCode=" . $this->partnerCode .
                   "&redirectUrl=" . $returnUrl .
                   "&requestId=" . $requestId .
                   "&requestType=" . $requestType;

        $signature = hash_hmac("sha256", $rawHash, $this->secretKey);

        $data = [
            'partnerCode' => $this->partnerCode,
            'partnerName' => "Ixtal Tour",
            'storeId' => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => (int) $amount, // Khi gửi JSON phải là số nguyên
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $returnUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        ];

        // Gửi request lên hệ thống MoMo
        $response = Http::post($this->endpoint, $data);
        $result = $response->json();

        // Kiểm tra nếu tạo thành công (resultCode == 0 và có payUrl)
        if (isset($result['payUrl']) && isset($result['resultCode']) && $result['resultCode'] == 0) {
            return response()->json([
                'status' => true,
                'message' => $result['message'] ?? 'Tạo link thanh toán thành công',
                'data' => $result['payUrl'], // Giữ nguyên để Vue.js tự động chuyển trang không bị lỗi
                'chi_tiet' => $result // Trả về toàn bộ cục dữ liệu gốc của MoMo (orderId, amount, shortLink...)
            ]);
        }

        // Trường hợp bị lỗi (Sai chữ ký, sai số tiền, cấu hình lỗi...)
        Log::error('Lỗi tạo giao dịch MoMo: ', $result);

        // Ưu tiên lấy localMessage (Tiếng Việt) nếu có, không thì lấy message tiếng Anh
        $errorMessage = $result['localMessage'] ?? $result['message'] ?? 'Lỗi không xác định';

        return response()->json([
            'status' => false,
            'message' => 'Lỗi MoMo: ' . $errorMessage,
            'resultCode' => $result['resultCode'] ?? null,
            'chi_tiet' => $result // Trả toàn bộ cục báo lỗi về frontend để dễ dàng debug trên Console (F12)
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
                $message->to($user->email)->subject('🎟️ Vé Điện Tử - Xác nhận thanh toán MoMo thành công từ Ixtal Tour');
            });
            Log::info('Gửi mail vé điện tử MoMo thành công cho hóa đơn: ' . $hoaDon->id);
        } catch (\Exception $e) {
            Log::error('Lỗi gửi mail (MoMo): ' . $e->getMessage());
        }
    }

    /**
     * 2. KIỂM TRA TRẠNG THÁI THANH TOÁN (Lúc khách hàng bị chuyển hướng về web)
     */
    public function checkThanhToan(Request $request)
    {
        $partnerCode = $request->partnerCode;
        $orderId = $request->orderId;
        $requestId = $request->requestId;
        $amount = (string) $request->amount;
        $orderInfo = $request->orderInfo;
        $orderType = $request->orderType;
        $transId = $request->transId;
        $resultCode = $request->resultCode;
        $message = $request->message;
        $payType = $request->payType;
        $responseTime = $request->responseTime;
        $extraData = $request->extraData;
        $momoSignature = $request->signature;

        $rawHash = "accessKey=" . $this->accessKey .
            "&amount=" . $amount .
            "&extraData=" . $extraData .
            "&message=" . $message .
            "&orderId=" . $orderId .
            "&orderInfo=" . $orderInfo .
            "&orderType=" . $orderType .
            "&partnerCode=" . $partnerCode .
            "&payType=" . $payType .
            "&requestId=" . $requestId .
            "&responseTime=" . $responseTime .
            "&resultCode=" . $resultCode .
            "&transId=" . $transId;

        $partnerSignature = hash_hmac("sha256", $rawHash, $this->secretKey);

        if ($momoSignature === $partnerSignature) {
            if ($resultCode == '0') {
                $hoaDonId = explode('_', $orderId)[0];
                $hoa_don = HoaDon::with('ds_ve')->find($hoaDonId);

                // Cập nhật trạng thái nếu hóa đơn đang chờ thanh toán
                if ($hoa_don && $hoa_don->trang_thai == 1) {
                    $hoa_don->trang_thai = 2; // Đã thanh toán
                    $hoa_don->phuong_thuc_thanh_toan = 'MOMO';
                    $hoa_don->save();
                    $hoa_don->ds_ve()->update(['tinh_trang' => 2]);

                    $this->guiMailVeDienTu($hoa_don);

                    // SỬA TẠI ĐÂY: Bổ sung thêm mảng 'data' để truyền thông tin về cho Frontend
                    return response()->json([
                        'status' => true,
                        'message' => 'Thanh toán thành công và vé đã được kích hoạt',
                        'data' => [
                            'ma_hoa_don' => $hoa_don->ma_hoa_don ?? $hoa_don->id,
                            'tong_tien' => $hoa_don->tong_tien,
                            'ngay_thanh_toan' => date('d/m/Y H:i:s'),
                            'phuong_thuc' => 'MoMo'
                        ]
                    ]);
                }
            }
        }

        return response()->json([
            'status' => false,
            'message' => 'Thanh toán thất bại hoặc sai chữ ký'
        ]);
    }

    /**
     * 3. IPN (Webhook MoMo gọi ngầm để cập nhật trạng thái chắc chắn 100%)
     */
    public function momoIpn(Request $request)
    {
        $partnerCode = $request->partnerCode;
        $orderId = $request->orderId;
        $requestId = $request->requestId;
        $amount = (string) $request->amount;
        $orderInfo = $request->orderInfo;
        $orderType = $request->orderType;
        $transId = $request->transId;
        $resultCode = $request->resultCode;
        $message = $request->message;
        $payType = $request->payType;
        $responseTime = $request->responseTime;
        $extraData = $request->extraData;
        $momoSignature = $request->signature;

        $rawHash = "accessKey=" . $this->accessKey .
            "&amount=" . $amount .
            "&extraData=" . $extraData .
            "&message=" . $message .
            "&orderId=" . $orderId .
            "&orderInfo=" . $orderInfo .
            "&orderType=" . $orderType .
            "&partnerCode=" . $partnerCode .
            "&payType=" . $payType .
            "&requestId=" . $requestId .
            "&responseTime=" . $responseTime .
            "&resultCode=" . $resultCode .
            "&transId=" . $transId;

        $partnerSignature = hash_hmac("sha256", $rawHash, $this->secretKey);

        if ($momoSignature === $partnerSignature) {
            if ($resultCode == '0') {
                $hoaDonId = explode('_', $orderId)[0];
                $hoa_don = HoaDon::find($hoaDonId);

                if ($hoa_don && $hoa_don->trang_thai == 1) {
                    DB::beginTransaction();
                    try {
                        $hoa_don->trang_thai = 2;
                        $hoa_don->phuong_thuc_thanh_toan = 'MOMO';
                        $hoa_don->save();
                        Ve::where('id_hoa_don', $hoa_don->id)->update(['tinh_trang' => 2]);

                        $this->guiMailVeDienTu($hoa_don);
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        Log::error('Lỗi cập nhật CSDL tại MoMo IPN: ' . $e->getMessage());
                    }
                }
            }
            // Bắt buộc trả về HTTP 204 cho MoMo IPN để xác nhận đã nhận tín hiệu
            return response()->json('', 204);
        }

        return response()->json(['message' => 'Invalid signature'], 400);
    }
}
