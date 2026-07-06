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
            $data->diem_tb = round((float)$diem_tb, 1);
            $tong_danh_gia = DanhGia::where('id_tour', $request->id)->where('tinh_trang', 1)->count();
            $data->tong_danh_gia = $tong_danh_gia;

            // QUAN TRỌNG: Phải dùng leftJoin thay vì join để không bị mất các điểm đến tự túc (không có phương tiện)
            $lich_trinh = LichTrinh::leftJoin('phuong_tiens', 'lich_trinhs.id_phuong_tien', '=', 'phuong_tiens.id')
            ->leftJoin('diem_dens', 'lich_trinhs.id_diem_den', '=', 'diem_dens.id')
            ->where('lich_trinhs.id_tour', $request->id)
            ->select( 'phuong_tiens.loai_phuong_tien', 'diem_dens.ten_diem_den', 'diem_dens.thoi_gian', 'diem_dens.mo_ta','diem_dens.thanh_pho', 'diem_dens.hinh_anh')
            ->orderBy('lich_trinhs.id', 'asc') // Cần xếp theo ID để hiển thị đúng thứ tự Ngày 1, Ngày 2...
            ->get();

            $data->lich_trinh = $lich_trinh;

        }
        $tourKhac= Tour::where('id', '!=', $request->id)->where('tinh_trang', 1)->get();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu chi tiết tour thành công',
            'data' => $data,
            'tour_khac' => $tourKhac
        ]);
    }
}
