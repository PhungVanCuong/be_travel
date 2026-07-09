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

    if ($data) {
        $diem_tb = DanhGia::where('id_tour', $request->id)
            ->where('tinh_trang', 1)
            ->avg('sao_danh_gia');

        $data->diem_tb = round((float) $diem_tb, 1);

        $tong_danh_gia = DanhGia::where('id_tour', $request->id)
            ->where('tinh_trang', 1)
            ->count();

        $data->tong_danh_gia = $tong_danh_gia;

        $lich_trinh = LichTrinh::leftJoin('phuong_tiens', 'lich_trinhs.id_phuong_tien', '=', 'phuong_tiens.id')
            ->leftJoin('diem_dens', 'lich_trinhs.id_diem_den', '=', 'diem_dens.id')
            ->where('lich_trinhs.id_tour', $request->id)
            ->select(
                'phuong_tiens.loai_phuong_tien',
                'diem_dens.ten_diem_den',
                'diem_dens.thoi_gian',
                'diem_dens.mo_ta',
                'diem_dens.thanh_pho',
                'diem_dens.hinh_anh'
            )
            ->orderBy('lich_trinhs.id', 'asc')
            ->get();

        $data->lich_trinh = $lich_trinh;
    }

    $tourKhac = Tour::where('id', '!=', $request->id)
        ->where('tinh_trang', 1)
        ->select('tours.*')
        ->selectSub(function ($query) {
            $query->from('danh_gias')
                ->selectRaw('COALESCE(ROUND(AVG(sao_danh_gia), 1), 0)')
                ->whereColumn('danh_gias.id_tour', 'tours.id')
                ->where('danh_gias.tinh_trang', 1);
        }, 'avg_sao')
        ->selectSub(function ($query) {
            $query->from('danh_gias')
                ->selectRaw('COUNT(*)')
                ->whereColumn('danh_gias.id_tour', 'tours.id')
                ->where('danh_gias.tinh_trang', 1);
        }, 'so_luot_danh_gia')
        ->get();

    return response()->json([
        'status' => true,
        'message' => 'Lấy dữ liệu chi tiết tour thành công',
        'data' => $data,
        'tour_khac' => $tourKhac
    ]);
}
}
