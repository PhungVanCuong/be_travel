<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Slide;
class TrangChuController extends Controller
{
    public function getData()
    {
        $dataTour = Tour::where('tinh_trang', 1)->get();
        $dataSlide = Slide::where('tinh_trang', 1)->get();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu trang chủ thành công',
            'data' => [
                'tours' => $dataTour,
                'slides' => $dataSlide
            ]
        ]);
    }
}
