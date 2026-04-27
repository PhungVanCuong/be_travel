<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuocGia extends Model
{
    use HasFactory;

    protected $table = 'quoc_gias';

    protected $fillable = [
        'ten_quoc_gia',
        'tinh_trang', // 1: hoạt động, 0: khóa
    ];
}
