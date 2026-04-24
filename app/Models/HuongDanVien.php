<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class HuongDanVien extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'huong_dan_viens';
    protected $fillable = [
        'email',
        'ho_va_ten',
        'password',
        'ngon_ngu',
        'so_dien_thoai',
        'is_active',
        'is_block',
        'hash_reset',
        'hash_active',
    ];
}
