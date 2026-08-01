<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class PayOSService
{
    public function createPaymentLink(array $payload): array
    {
        $payload['signature'] = $this->createPaymentRequestSignature($payload);

        $response = $this->request()
            ->post($this->apiUrl('/v2/payment-requests'), $payload);

        return $this->successfulData($response);
    }

    public function getPaymentLink(int|string $id): array
    {
        $response = $this->request()
            ->get($this->apiUrl('/v2/payment-requests/' . urlencode((string) $id)));

        return $this->successfulData($response);
    }

    public function cancelPaymentLink(int|string $id, string $reason): array
    {
        $response = $this->request()
            ->post($this->apiUrl('/v2/payment-requests/' . urlencode((string) $id) . '/cancel'), [
                'cancellationReason' => $reason,
            ]);

        return $this->successfulData($response);
    }

    public function verifyWebhook(array $payload): bool
    {
        $data = $payload['data'] ?? null;
        $signature = $payload['signature'] ?? null;

        if (!is_array($data) || !is_string($signature) || $signature === '') {
            return false;
        }

        $expected = hash_hmac(
            'sha256',
            $this->toSignatureString($data),
            $this->checksumKey()
        );

        return hash_equals($expected, $signature);
    }

    private function request()
    {
        $this->ensureConfigured();

        $request = Http::asJson()
            ->acceptJson()
            ->withHeaders([
                'x-client-id' => config('services.payos.client_id'),
                'x-api-key' => config('services.payos.api_key'),
            ])
            ->timeout((int) config('services.payos.timeout', 20));

        $caBundle = config('services.payos.ca_bundle');
        if ($caBundle) {
            if (!is_file($caBundle) || !is_readable($caBundle)) {
                throw new RuntimeException('Không đọc được CA bundle của payOS tại: ' . $caBundle);
            }

            $request = $request->withOptions(['verify' => $caBundle]);
        }

        return $request;
    }

    private function successfulData(Response $response): array
    {
        $body = $response->json();
        $description = is_array($body) ? ($body['desc'] ?? null) : null;

        if (!$response->successful() || !is_array($body) || ($body['code'] ?? null) !== '00') {
            throw new RuntimeException(
                $description ?: 'Không thể kết nối hoặc nhận phản hồi hợp lệ từ payOS.'
            );
        }

        return is_array($body['data'] ?? null) ? $body['data'] : [];
    }

    private function createPaymentRequestSignature(array $payload): string
    {
        $signatureData = [
            'amount' => $payload['amount'],
            'cancelUrl' => $payload['cancelUrl'],
            'description' => $payload['description'],
            'orderCode' => $payload['orderCode'],
            'returnUrl' => $payload['returnUrl'],
        ];

        return hash_hmac('sha256', $this->toSignatureString($signatureData), $this->checksumKey());
    }

    private function toSignatureString(array $data): string
    {
        ksort($data);
        $parts = [];

        foreach ($data as $key => $value) {
            if ($value === null || in_array($value, ['undefined', 'null'], true)) {
                $value = '';
            } elseif (is_array($value)) {
                $value = array_map(function ($item) {
                    if (is_array($item)) {
                        ksort($item);
                    }

                    return $item;
                }, $value);
                $value = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            } elseif (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }

            $parts[] = $key . '=' . $value;
        }

        return implode('&', $parts);
    }

    private function ensureConfigured(): void
    {
        if (
            !config('services.payos.client_id') ||
            !config('services.payos.api_key') ||
            !config('services.payos.checksum_key')
        ) {
            throw new RuntimeException('payOS chưa được cấu hình. Vui lòng thiết lập PAYOS_CLIENT_ID, PAYOS_API_KEY và PAYOS_CHECKSUM_KEY.');
        }
    }

    private function checksumKey(): string
    {
        $this->ensureConfigured();

        return (string) config('services.payos.checksum_key');
    }

    private function apiUrl(string $path): string
    {
        return rtrim((string) config('services.payos.api_url'), '/') . $path;
    }
}
