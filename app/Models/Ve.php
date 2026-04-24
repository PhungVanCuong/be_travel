<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    protected $table = 'ves';
    protected $fillable = [
        'id_khach_hang',
        'id_hoa_don',
        'ma_ve',
        'gia_ve',
        'tinh_trang',
        'is_check_in',
    ];

    const CHUA_THANH_TOAN = 1;
    const DA_THANH_TOAN = 2;
    const DA_HUY = 0;
}
