<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';
    protected $fillable = [
        'ten_tour',
        'mo_ta',
        'gia',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'so_nguoi_toi_da',
        'diem_don',
        'diem_tra',
        'tinh_trang',
        'hinh_anh',
        'id_quoc_gia',
    ];
    protected $casts = [
        'hinh_anh' => 'array',
    ];
    public function danhgias()
    {
        return $this->hasMany(DanhGia::class, 'id_tour', 'id')->where('tinh_trang', 1);
    }
    public function quoc_gia() // Bạn có thể đặt tên là quoc_gia
    {
        // Giả sử bảng tours có cột id_quoc_gia nối với id của bảng QuocGia
        return $this->belongsTo(QuocGia::class, 'id_quoc_gia', 'id');
    }
    // THÊM MỚI: Liên kết lấy Lịch Trình của Tour
    public function lichTrinhs()
    {
        return $this->hasMany(LichTrinh::class, 'id_tour', 'id');
    }
}
