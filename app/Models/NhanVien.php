<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class NhanVien extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'nhan_viens';
    protected $fillable = [
        'email',
        'ho_va_ten',
        'password',
        'so_dien_thoai',
        'dia_chi',
        'ngay_sinh',
        'tinh_trang',
        'avatar',
        'id_chuc_vu',
        'is_master',
        'hash_reset',
        'hash_active',
    ];
}
