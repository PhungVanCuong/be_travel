<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhuongTien extends Model
{
    protected $table = 'phuong_tiens';
    protected $fillable = [
        'loai_phuong_tien',
        'so_hieu',
        'mo_ta',
        'tinh_trang',
    ];
}
