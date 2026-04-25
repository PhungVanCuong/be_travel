<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table = 'bai_viets';
    protected $fillable = [
        'tieu_de',
        'mo_ta_ngan',
        'noi_dung',
        'hinh_anh',
        'tag',
        'tinh_trang',
    ];
}
