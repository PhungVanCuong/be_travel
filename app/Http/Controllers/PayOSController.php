<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\PayOSTransaction;
use App\Models\Ve;
use App\Services\PayOSService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class PayOSController extends Controller
{
    private PayOSService $payOS;

    public function __construct(PayOSService $payOS)
    {
        $this->payOS = $payOS;
    }

    public function createPayment(Request $request)
    {
        $validated = $request->validate([
            'id_hoa_don' => ['required', 'integer'],
        ]);

        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof KhachHang)) {
            return response()->json(['status' => false, 'message' => 'Bạn cần đăng nhập để thanh toán.'], 401);
        }

        $hoaDon = HoaDon::with('tour')
            ->whereKey($validated['id_hoa_don'])
            ->where('id_khach_hang', $user->id)
            ->first();

        if (!$hoaDon) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy hóa đơn của bạn.'], 404);
        }

        if ((int) $hoaDon->trang_thai === HoaDon::DA_THANH_TOAN) {
            return response()->json(['status' => false, 'message' => 'Hóa đơn đã được thanh toán.'], 422);
        }

        if ((int) $hoaDon->trang_thai === HoaDon::DA_HUY) {
            return response()->json(['status' => false, 'message' => 'Hóa đơn đã bị hủy.'], 422);
        }

        $existing = PayOSTransaction::where('id_hoa_don', $hoaDon->id)
            ->whereIn('status', ['CREATING', 'PENDING', 'PROCESSING'])
            ->where('expires_at', '>', now())
            ->latest('id')
            ->first();

        if ($existing && $existing->checkout_url) {
            return response()->json([
                'status' => true,
                'message' => 'Sử dụng lại liên kết thanh toán payOS đang còn hiệu lực.',
                'data' => $this->transactionData($existing),
            ]);
        }

        if ($existing && $existing->status === 'CREATING') {
            return response()->json([
                'status' => false,
                'message' => 'Hệ thống đang tạo liên kết payOS cho hóa đơn này. Vui lòng thử lại sau vài giây.',
            ], 409);
        }

        $orderCode = $this->generateOrderCode();
        $amount = (int) $hoaDon->tong_tien;
        $description = substr('HD' . $hoaDon->id, 0, 9);
        $expiresAt = now()->addMinutes((int) config('services.payos.expire_minutes', 15));
        $frontendUrl = rtrim((string) config('services.payos.frontend_url'), '/');
        $returnUrl = config('services.payos.return_url')
            ?: $frontendUrl . '/Ket-qua-thanh-toan';
        $cancelUrl = config('services.payos.cancel_url')
            ?: $frontendUrl . '/Ket-qua-thanh-toan';

        $transaction = PayOSTransaction::create([
            'id_hoa_don' => $hoaDon->id,
            'order_code' => $orderCode,
            'amount' => $amount,
            'status' => 'CREATING',
            'expires_at' => $expiresAt,
        ]);

        try {
            $payOSData = $this->payOS->createPaymentLink([
                'orderCode' => $orderCode,
                'amount' => $amount,
                'description' => $description,
                'buyerName' => $user->ho_va_ten,
                'buyerEmail' => $user->email,
                'buyerPhone' => $user->so_dien_thoai,
                'items' => [[
                    'name' => $hoaDon->tour?->ten_tour ?: 'Tour IxtalTravel',
                    'quantity' => (int) $hoaDon->so_luong_nguoi,
                    'price' => (int) floor($amount / max(1, (int) $hoaDon->so_luong_nguoi)),
                ]],
                'cancelUrl' => $cancelUrl,
                'returnUrl' => $returnUrl,
                'expiredAt' => $expiresAt->timestamp,
            ]);

            if (empty($payOSData['paymentLinkId']) || empty($payOSData['checkoutUrl'])) {
                throw new RuntimeException('payOS không trả về liên kết thanh toán hợp lệ.');
            }

            $transaction->update([
                'payment_link_id' => $payOSData['paymentLinkId'] ?? null,
                'status' => $payOSData['status'] ?? 'PENDING',
                'checkout_url' => $payOSData['checkoutUrl'] ?? null,
                'qr_code' => $payOSData['qrCode'] ?? null,
                'response_payload' => $payOSData,
            ]);

            $hoaDon->update(['phuong_thuc_thanh_toan' => 'PAYOS']);
            $transaction->refresh();

            return response()->json([
                'status' => true,
                'message' => 'Tạo liên kết thanh toán payOS thành công.',
                'data' => $this->transactionData($transaction),
            ]);
        } catch (Throwable $exception) {
            $transaction->update([
                'status' => 'ERROR',
                'error_message' => $exception->getMessage(),
            ]);

            Log::error('Không thể tạo thanh toán payOS.', [
                'hoa_don_id' => $hoaDon->id,
                'order_code' => $orderCode,
                'error' => $exception->getMessage(),
            ]);

            return response()->json([
                'status' => false,
                'message' => $exception->getMessage(),
            ], 502);
        }
    }

    public function checkPayment(Request $request)
    {
        $validated = $request->validate([
            'order_code' => ['required', 'integer'],
        ]);

        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof KhachHang)) {
            return response()->json(['status' => false, 'message' => 'Bạn cần đăng nhập để kiểm tra thanh toán.'], 401);
        }

        $transaction = PayOSTransaction::with('hoaDon')
            ->where('order_code', $validated['order_code'])
            ->first();

        if (!$transaction || !$transaction->hoaDon || (int) $transaction->hoaDon->id_khach_hang !== (int) $user->id) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy giao dịch payOS.'], 404);
        }

        try {
            if (!in_array($transaction->status, ['PAID', 'CANCELLED'], true)) {
                $payOSData = $this->payOS->getPaymentLink($transaction->order_code);
                $transaction->update([
                    'status' => $payOSData['status'] ?? $transaction->status,
                    'payment_link_id' => $payOSData['id'] ?? $transaction->payment_link_id,
                    'response_payload' => $payOSData,
                ]);

                if (($payOSData['status'] ?? null) === 'PAID') {
                    $transaction = $this->completePayment($transaction, $payOSData);
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Lấy trạng thái thanh toán payOS thành công.',
                'data' => $this->transactionData($transaction->fresh()),
            ]);
        } catch (Throwable $exception) {
            Log::warning('Không thể đồng bộ trạng thái payOS.', [
                'order_code' => $transaction->order_code,
                'error' => $exception->getMessage(),
            ]);

            return response()->json([
                'status' => false,
                'message' => $exception->getMessage(),
            ], 502);
        }
    }

    public function webhook(Request $request)
    {
        $payload = $request->all();

        try {
            if (!$this->payOS->verifyWebhook($payload)) {
                return response()->json(['success' => false, 'message' => 'Chữ ký webhook không hợp lệ.'], 400);
            }

            $data = $payload['data'];
            $orderCode = $data['orderCode'] ?? null;
            $transaction = $orderCode
                ? PayOSTransaction::where('order_code', $orderCode)->first()
                : null;

            // payOS gửi một webhook mẫu khi xác nhận URL. Phản hồi 2xx để quá trình cấu hình hoàn tất.
            if (!$transaction) {
                Log::info('Đã nhận webhook kiểm tra hoặc giao dịch payOS chưa được ghi nhận.', [
                    'order_code' => $orderCode,
                ]);

                return response()->json(['success' => true]);
            }

            if (($data['code'] ?? null) !== '00') {
                $transaction->update([
                    'status' => 'FAILED',
                    'webhook_payload' => $payload,
                    'error_message' => $data['desc'] ?? 'Giao dịch payOS thất bại.',
                ]);

                return response()->json(['success' => true]);
            }

            $this->completePayment($transaction, $data, $payload);

            return response()->json(['success' => true]);
        } catch (Throwable $exception) {
            Log::error('Xử lý webhook payOS thất bại.', [
                'error' => $exception->getMessage(),
                'order_code' => data_get($payload, 'data.orderCode'),
            ]);

            return response()->json(['success' => false, 'message' => $exception->getMessage()], 500);
        }
    }

    private function completePayment(PayOSTransaction $transaction, array $payOSData, ?array $webhookPayload = null): PayOSTransaction
    {
        return DB::transaction(function () use ($transaction, $payOSData, $webhookPayload) {
            $lockedTransaction = PayOSTransaction::whereKey($transaction->id)->lockForUpdate()->firstOrFail();
            $hoaDon = HoaDon::whereKey($lockedTransaction->id_hoa_don)->lockForUpdate()->firstOrFail();
            $paidAmount = (int) ($payOSData['amount'] ?? $payOSData['amountPaid'] ?? 0);

            if ($paidAmount !== (int) $lockedTransaction->amount) {
                throw new RuntimeException('Số tiền payOS không khớp với hóa đơn.');
            }

            $lockedTransaction->update([
                'status' => 'PAID',
                'payment_link_id' => $payOSData['paymentLinkId'] ?? $payOSData['id'] ?? $lockedTransaction->payment_link_id,
                'reference' => $payOSData['reference'] ?? $lockedTransaction->reference,
                'webhook_payload' => $webhookPayload ?? $lockedTransaction->webhook_payload,
                'paid_at' => $lockedTransaction->paid_at ?: now(),
                'error_message' => null,
            ]);

            if ((int) $hoaDon->trang_thai !== HoaDon::DA_THANH_TOAN) {
                $hoaDon->update([
                    'trang_thai' => HoaDon::DA_THANH_TOAN,
                    'phuong_thuc_thanh_toan' => 'PAYOS',
                ]);

                Ve::where('id_hoa_don', $hoaDon->id)->update([
                    'tinh_trang' => Ve::DA_THANH_TOAN,
                ]);
            }

            return $lockedTransaction->fresh();
        });
    }

    private function transactionData(PayOSTransaction $transaction): array
    {
        return [
            'order_code' => $transaction->order_code,
            'payment_link_id' => $transaction->payment_link_id,
            'hoa_don_id' => $transaction->id_hoa_don,
            'amount' => $transaction->amount,
            'status' => $transaction->status,
            'checkout_url' => $transaction->checkout_url,
            'qr_code' => $transaction->qr_code,
            'description' => substr('HD' . $transaction->id_hoa_don, 0, 9),
            'account_number' => data_get($transaction->response_payload, 'accountNumber'),
            'account_name' => data_get($transaction->response_payload, 'accountName'),
            'reference' => $transaction->reference,
            'expires_at' => optional($transaction->expires_at)->toIso8601String(),
            'paid_at' => optional($transaction->paid_at)->toIso8601String(),
        ];
    }

    private function generateOrderCode(): int
    {
        do {
            $orderCode = (int) floor(microtime(true) * 1000);
            if (PayOSTransaction::where('order_code', $orderCode)->exists()) {
                usleep(1000);
            }
        } while (PayOSTransaction::where('order_code', $orderCode)->exists());

        return $orderCode;
    }
}
