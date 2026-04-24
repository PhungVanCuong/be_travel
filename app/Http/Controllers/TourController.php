<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
class TourController extends Controller
{
    public function getData()
    {
        $data = Tour::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu tour thành công',
            'data' => $data
        ]);
    }
    public function addData(Request $request)
    {
        Tour::create([
            'ten_tour' => $request->ten_tour,
            'mo_ta' => $request->mo_ta,
            'gia' => $request->gia,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'so_nguoi_toi_da' => $request->so_nguoi_toi_da,
            'diem_don' => $request->diem_don,
            'diem_tra' => $request->diem_tra,
            'tinh_trang' => $request->tinh_trang
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm tour thành công'
        ]);
    }
    public function update(Request $request)
    {
        Tour::where('id', $request->id)->update([
            'ten_tour' => $request->ten_tour,
            'mo_ta' => $request->mo_ta,
            'gia' => $request->gia,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'so_nguoi_toi_da' => $request->so_nguoi_toi_da,
            'diem_don' => $request->diem_don,
            'diem_tra' => $request->diem_tra,
            'tinh_trang' => $request->tinh_trang
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật tour thành công'
        ]);
    }
}
