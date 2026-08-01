<?php

namespace Tests\Unit;

use App\Services\PayOSService;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PayOSServiceTest extends TestCase
{
    private const CHECKSUM_KEY = '1a54716c8f0efb2744fb28b6e38b25da7f67a925d98bc1c18bd8faaecadd7675';

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.payos.client_id' => 'test-client-id',
            'services.payos.api_key' => 'test-api-key',
            'services.payos.checksum_key' => self::CHECKSUM_KEY,
            'services.payos.api_url' => 'https://api-merchant.payos.vn',
            'services.payos.timeout' => 20,
        ]);
    }

    public function test_it_verifies_the_official_payos_webhook_signature_vector(): void
    {
        $payload = [
            'data' => [
                'orderCode' => 123,
                'amount' => 3000,
                'description' => 'VQRIO123',
                'accountNumber' => '12345678',
                'reference' => 'TF230204212323',
                'transactionDateTime' => '2023-02-04 18:25:00',
                'currency' => 'VND',
                'paymentLinkId' => '124c33293c43417ab7879e14c8d9eb18',
                'code' => '00',
                'desc' => 'Thành công',
                'counterAccountBankId' => '',
                'counterAccountBankName' => '',
                'counterAccountName' => '',
                'counterAccountNumber' => '',
                'virtualAccountName' => '',
                'virtualAccountNumber' => '',
            ],
            'signature' => '412e915d2871504ed31be63c8f62a149a4410d34c4c42affc9006ef9917eaa03',
        ];

        $service = app(PayOSService::class);

        $this->assertTrue($service->verifyWebhook($payload));

        $payload['data']['amount'] = 3001;
        $this->assertFalse($service->verifyWebhook($payload));
    }

    public function test_it_signs_create_payment_requests_with_the_required_five_fields(): void
    {
        Http::fake([
            'api-merchant.payos.vn/*' => Http::response([
                'code' => '00',
                'desc' => 'success',
                'data' => [
                    'paymentLinkId' => 'link-id',
                    'checkoutUrl' => 'https://pay.payos.vn/web/link-id',
                    'status' => 'PENDING',
                ],
            ]),
        ]);

        $payload = [
            'orderCode' => 123,
            'amount' => 3000,
            'description' => 'VQRIO123',
            'cancelUrl' => 'https://example.com/cancel',
            'returnUrl' => 'https://example.com/success',
        ];

        app(PayOSService::class)->createPaymentLink($payload);

        $signatureData = 'amount=3000&cancelUrl=https://example.com/cancel&description=VQRIO123&orderCode=123&returnUrl=https://example.com/success';
        $expectedSignature = hash_hmac('sha256', $signatureData, self::CHECKSUM_KEY);

        Http::assertSent(function (Request $request) use ($expectedSignature) {
            return $request->url() === 'https://api-merchant.payos.vn/v2/payment-requests'
                && $request->hasHeader('x-client-id', 'test-client-id')
                && $request->hasHeader('x-api-key', 'test-api-key')
                && $request['signature'] === $expectedSignature;
        });
    }
}
