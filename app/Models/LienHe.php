<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    protected $table = 'lien_he';

    protected $fillable = [
        'id_khach_hang',
        'ho_ten',
        'email',
        'so_dien_thoai',
        'noi_dung',
        'trang_thai'
    ];
}
