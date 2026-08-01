<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\Ve;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class PayPalController extends Controller
{
    // Thông tin Sandbox mặc định của PayPal (Thay bằng Crendentials của bạn)
    private $client_id = 'ARBJtOAlLzoUY4JZSwN3qZTLT9BYOv9fSkCPlu1Q_JWb5PRebI6UgfHGDK_M1ni_XghGnl8BT5ofvFAJ'; // Dùng Client ID test
    private $secret = 'EIxLgFMwdTleubFhsKfxmW6NzVoA5DSv50CBzmGOuy2mwYW0T5atZqOF735Ipi4LQK8u8w3MYCdHJ1hI'; // Dùng Secret test
    private $base_url = 'https://api-m.sandbox.paypal.com'; // Đổi thành api-m.paypal.com nếu chạy thật

    private function getAccessToken()
    {
        try {
            // Thêm withoutVerifying() để fix lỗi cURL SSL trên XAMPP/Laragon
            $response = Http::withoutVerifying()
                ->withBasicAuth($this->client_id, $this->secret)
                ->asForm()
                ->post($this->base_url . '/v1/oauth2/token', [
                    'grant_type' => 'client_credentials'
                ]);

            if ($response->successful()) {
                return $response->json('access_token');
            }

            Log::error('PayPal Auth Error API: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('PayPal Auth Exception: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * 1. TẠO LINK THANH TOÁN PAYPAL
     */
    public function createPayment(Request $request)
    {
        $hoaDon = HoaDon::find($request->id_hoa_don);
        if (!$hoaDon) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }

        $hoaDon->phuong_thuc_thanh_toan = 'PAYPAL';
        $hoaDon->save();

        $frontendUrl = $request->header('Origin') ? $request->header('Origin') : 'http://localhost:5173';
        $returnUrl = rtrim($frontendUrl, '/') . "/Ket-qua-thanh-toan?gateway=paypal";
        $cancelUrl = rtrim($frontendUrl, '/') . "/Ket-qua-thanh-toan?gateway=paypal&cancel=true";

        $usdAmount = round($hoaDon->tong_tien / 25000, 2);

        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return response()->json(['status' => false, 'message' => 'Lỗi kết nối PayPal Authentication. Hãy kiểm tra file log (storage/logs/laravel.log).']);
        }

        // Thêm withoutVerifying() vào đây luôn
        $response = Http::withoutVerifying()->withToken($accessToken)
            ->post($this->base_url . '/v2/checkout/orders', [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    [
                        'reference_id' => (string) $hoaDon->id,
                        'description' => 'Thanh toan Ixtal Tour hoa don #' . $hoaDon->id,
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => (string) $usdAmount
                        ]
                    ]
                ],
                'application_context' => [
                    'return_url' => $returnUrl,
                    'cancel_url' => $cancelUrl,
                    'user_action' => 'PAY_NOW',
                    'shipping_preference' => 'NO_SHIPPING'
                ]
            ]);

        $result = $response->json();

        if (isset($result['id']) && isset($result['links'])) {
            $approveUrl = null;
            foreach ($result['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    $approveUrl = $link['href'];
                    break;
                }
            }

            if ($approveUrl) {
                return response()->json([
                    'status' => true,
                    'message' => 'Tạo link PayPal thành công',
                    'data' => $approveUrl
                ]);
            }
        }

        Log::error('Lỗi tạo giao dịch PayPal: ', $result);
        return response()->json([
            'status' => false,
            'message' => 'Lỗi tạo giao dịch PayPal',
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
                $message->to($user->email)->subject('🎟️ Vé Điện Tử - Xác nhận thanh toán PayPal thành công');
            });
        } catch (\Exception $e) {
            Log::error('Lỗi gửi mail (PayPal): ' . $e->getMessage());
        }
    }

    /**
     * 2. KIỂM TRA & BẮT TIỀN (CAPTURE) KHI KHÁCH QUAY VỀ TỪ PAYPAL
     */
    public function checkThanhToan(Request $request)
    {
        $token = $request->token; // Order ID của PayPal
        $payerId = $request->PayerID;

        if (!$token || !$payerId) {
            return response()->json(['status' => false, 'message' => 'Thiếu dữ liệu xác thực PayPal']);
        }

        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return response()->json(['status' => false, 'message' => 'Lỗi kết nối PayPal Authentication']);
        }

        // ĐÃ SỬA LỖI Ở ĐÂY: Ép kiểu mảng rỗng thành Object (object)[] để sinh ra '{}' thay vì '[]'
        $response = Http::withoutVerifying()
            ->withToken($accessToken)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post($this->base_url . "/v2/checkout/orders/{$token}/capture", (object)[]);

        $result = $response->json();

        // Kiểm tra xem trạng thái trả về có phải là COMPLETED không
        if (isset($result['status']) && $result['status'] == 'COMPLETED') {

            // Lấy ID hóa đơn truyền trong reference_id
            $hoaDonId = $result['purchase_units'][0]['reference_id'] ?? null;

            if ($hoaDonId) {
                $hoa_don = HoaDon::with('ds_ve')->find($hoaDonId);

                if ($hoa_don && $hoa_don->trang_thai == 1) {
                    DB::beginTransaction();
                    try {
                        $hoa_don->trang_thai = 2; // Cập nhật thành Đã thanh toán
                        $hoa_don->phuong_thuc_thanh_toan = 'PAYPAL';
                        $hoa_don->save();
                        $hoa_don->ds_ve()->update(['tinh_trang' => 2]);

                        $this->guiMailVeDienTu($hoa_don);
                        DB::commit();

                        return response()->json([
                            'status' => true,
                            'message' => 'Thanh toán PayPal thành công',
                            'data' => [
                                'ma_hoa_don' => $hoa_don->ma_hoa_don ?? $hoa_don->id,
                                'tong_tien' => $hoa_don->tong_tien,
                                'ngay_thanh_toan' => date('d/m/Y H:i:s'),
                                'phuong_thuc' => 'PayPal',
                                'transaction_id' => $result['purchase_units'][0]['payments']['captures'][0]['id'] ?? $token
                            ]
                        ]);
                    } catch (\Exception $e) {
                        DB::rollBack();
                        Log::error("PayPal Update DB Error: " . $e->getMessage());
                    }
                } else if ($hoa_don && $hoa_don->trang_thai == 2) {
                     return response()->json([
                        'status' => true,
                        'message' => 'Hóa đơn đã được thanh toán trước đó.'
                     ]);
                }
            }
        }

        return response()->json([
            'status' => false,
            'message' => 'Giao dịch PayPal chưa hoàn tất hoặc bị từ chối',
            'chi_tiet' => $result
        ]);
    }
}
