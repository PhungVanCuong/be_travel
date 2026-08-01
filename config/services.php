<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'gemini' => [
        'key' => env('GEMINI_API_KEY'),
        'model' => env('GEMINI_MODEL', 'gemini-3.1-flash-lite'),
        'ca_bundle' => env('GEMINI_CA_BUNDLE', base_path('resources/certs/cacert.pem')),
    ],

<<<<<<< HEAD
=======
    'payos' => [
        'client_id' => env('PAYOS_CLIENT_ID'),
        'api_key' => env('PAYOS_API_KEY'),
        'checksum_key' => env('PAYOS_CHECKSUM_KEY'),
        'api_url' => env('PAYOS_API_URL', 'https://api-merchant.payos.vn'),
        'ca_bundle' => env('PAYOS_CA_BUNDLE', base_path('resources/certs/cacert.pem')),
        'frontend_url' => env('FRONTEND_URL', 'http://localhost:5173'),
        'return_url' => env('PAYOS_RETURN_URL'),
        'cancel_url' => env('PAYOS_CANCEL_URL'),
        'expire_minutes' => env('PAYOS_EXPIRE_MINUTES', 15),
        'timeout' => env('PAYOS_TIMEOUT', 20),
    ],

>>>>>>> 7b7efcd (Thêm các tuyến đường và kiểm thử tích hợp thanh toán PayOS, MoMo và ZaloPay)
];
