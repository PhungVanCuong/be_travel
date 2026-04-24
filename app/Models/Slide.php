<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slides';
    protected $fillable = ['tieu_de', 'hinh_anh', 'tinh_trang'];
}
