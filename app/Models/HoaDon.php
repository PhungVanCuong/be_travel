<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_dons';
    protected $fillable = [
        'id_khach_hang',
        'id_tour',
        'ma_hoa_don',
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

    public function ds_ve()
    {
        return $this->hasMany(Ve::class, 'id_hoa_don', 'id');
    }

    // THÊM ĐOẠN NÀY ĐỂ ĐỊNH NGHĨA RELATIONSHIP TOUR
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'id_tour', 'id');
    }

    public function khachHang() {
    return $this->belongsTo(KhachHang::class, 'id_khach_hang');
    }
}
