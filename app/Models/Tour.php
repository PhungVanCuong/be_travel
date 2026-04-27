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
    public function danhgias()
    {
        return $this->hasMany(DanhGia::class, 'id_tour', 'id')->where('tinh_trang', 1);
    }
}
