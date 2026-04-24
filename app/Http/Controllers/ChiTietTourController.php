<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Models\DanhGia;
use App\Models\LichTrinh;

class ChiTietTourController extends Controller
{
    public function getData(Request $request)
    {
        $data = Tour::where('id', $request->id)->first();
        if($data){
            $diem_tb = DanhGia::where('id_tour', $request->id)->where('tinh_trang', 1)->avg('sao_danh_gia');
            $data->diem_tb = round($diem_tb, 1);
            $tong_danh_gia = DanhGia::where('id_tour', $request->id)->where('tinh_trang', 1)->count();
            $data->tong_danh_gia = $tong_danh_gia;
            $lich_trinh = LichTrinh::join('phuong_tiens', 'lich_trinhs.id_phuong_tien', '=', 'phuong_tiens.id')
            ->where('lich_trinhs.id_tour', $request->id)
            ->select('lich_trinhs.tieu_de_hoat_dong', 'phuong_tiens.loai_phuong_tien')
            ->get();
            $data->lich_trinh = $lich_trinh;

        }
        $tourKhac= Tour::where('id', '!=', $request->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu chi tiết tour thành công',
            'data' => $data,
            'tour_khac' => $tourKhac
        ]);
    }
}
