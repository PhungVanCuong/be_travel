<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVu;
class ChucVuController extends Controller
{
    public function getData()
    {
        $data = ChucVu::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu chức vụ thành công',
            'data'    => $data,
        ]);
    }
    public function addData(Request $request)
    {
        ChucVu::create([
            'ten_chuc_vu' => $request->ten_chuc_vu,
            'tinh_trang'  => $request->tinh_trang
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm chức vụ thành công'
        ]);
    }
    public function update(Request $request)
    {
        ChucVu::where('id', $request->id)->update([
            'ten_chuc_vu' => $request->ten_chuc_vu,
            'tinh_trang'  => $request->tinh_trang
        ]);
        return response()->json([
            'status'    => true,
             'message'   => 'Cập nhật chức vụ ' . $request->ten_chuc_vu . ' thành công'
        ]);
    }
    public function destroy(Request $request)
    {        ChucVu::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa chức vụ thành công'
        ]);
    }
}
