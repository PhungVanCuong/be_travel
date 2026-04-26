<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_dons';
    protected $fillable = [
        'id_khach_hang',
        'id_tour',
        'so_luong_nguoi',
        'tong_tien',
        'phuong_thuc_thanh_toan',
        'trang_thai',
        'ghi_chu_danh_sach_nguoi_di',
        'ngay_tao',
    ];

    const CHUA_THANH_TOAN = 1;
    const DA_THANH_TOAN = 2;
    const DA_HUY = 0;
}
