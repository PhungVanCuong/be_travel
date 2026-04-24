<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
class KhachHangController extends Controller
{
    public function getData()
    {
        $data = KhachHang::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu khách hàng thành công',
            'data'    => $data,
        ]);
    }
    public function addData(Request $request)
    {
        KhachHang::create([
            'ho_va_ten'    => $request->ho_va_ten,
            'email'        => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'     => $request->password,
            'cccd'         => $request->cccd,
            'ngay_sinh'    => $request->ngay_sinh,
            'avatar'       => $request->avatar,
            'is_active'    => 0,
            'is_block'     => 0
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm khách hàng thành công'
        ]);
    }
}
