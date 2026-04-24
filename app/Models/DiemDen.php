<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiemDen extends Model
{
    protected $table = 'diem_dens';
    protected $fillable = [
        'ten_diem_den',
        'mo_ta',
        'thanh_pho',
        'tinh_trang',
        'hinh_anh',
    ];
}
