<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slides';
    protected $fillable = ['thu_tu', 'tieu_de', 'hinh_anh', 'tinh_trang'];
}
