<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HuongDanVienTour extends Model
{
    protected $table = 'huong_dan_vien_tours';
    protected $fillable = [
        'id_tour',
        'id_huong_dan_vien',
    ];
}
