<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Tour extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
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
    ];
}
