<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichTrinh extends Model
{
    protected $table = 'lich_trinhs';
    protected $fillable = [
        'id_tour',
        'id_diem_den',
        'id_phuong_tien',
        'tieu_de_hoat_dong',
    ];
}
