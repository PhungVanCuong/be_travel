<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VNPay extends Model
{
    protected $table = 'v_n_pays';
    protected $fillable = [
        'id_khach_hang',
        'id_hoa_don',
        'link_data',
        'tinh_trang',
    ];
}
