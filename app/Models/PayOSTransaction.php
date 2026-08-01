<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayOSTransaction extends Model
{
    protected $table = 'payos_transactions';

    protected $fillable = [
        'id_hoa_don',
        'order_code',
        'payment_link_id',
        'amount',
        'status',
        'checkout_url',
        'qr_code',
        'reference',
        'error_message',
        'response_payload',
        'webhook_payload',
        'expires_at',
        'paid_at',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'integer',
            'response_payload' => 'array',
            'webhook_payload' => 'array',
            'expires_at' => 'datetime',
            'paid_at' => 'datetime',
        ];
    }

    public function hoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'id_hoa_don');
    }
}
