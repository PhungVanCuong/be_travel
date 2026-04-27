<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Slide;
use App\Models\BaiViet;

class TrangChuController extends Controller
{
    public function getData()
    {
        $dataTour = Tour::where('tinh_trang', 1)
            // 1. Tính điểm sao trung bình
            ->withAvg('danhGias as avg_sao', 'sao_danh_gia')
            // 2. Đếm tổng số lượt đánh giá
            ->withCount('danhGias as so_luot_danh_gia')
            // 3. Sắp xếp ưu tiên 1: Theo điểm sao trung bình giảm dần
            ->orderBy('avg_sao', 'desc')
            // 4. Sắp xếp ưu tiên 2: Nếu sao bằng nhau, xếp theo số lượt đánh giá giảm dần
            ->orderBy('so_luot_danh_gia', 'desc')
            ->get();

        $dataSlide = Slide::where('tinh_trang', 1)->get();
        $dataBaiViet = BaiViet::where('tinh_trang', 1)->get();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu trang chủ thành công',
            'data' => [
                'tours' => $dataTour,
                'slides' => $dataSlide,
                'baiViets' => $dataBaiViet
            ]
        ]);
    }
}
