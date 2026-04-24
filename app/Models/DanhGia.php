<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danh_gias';
    protected $fillable = [
        'id_tour',
        'id_khach_hang',
        'sao_danh_gia',
        'noi_dung',
        'tinh_trang',
    ];
}
