<?php

namespace App\Http\Controllers;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function getData()
    {
        $data = NhanVien::join('chuc_vus', 'nhan_viens.id_chuc_vu', '=', 'chuc_vus.id')
            ->select(
                'nhan_viens.id',
                'nhan_viens.email',
                'nhan_viens.ho_va_ten',
                'nhan_viens.so_dien_thoai',
                'nhan_viens.dia_chi',
                'nhan_viens.ngay_sinh',
                'nhan_viens.tinh_trang',
                'nhan_viens.id_chuc_vu',
                'chuc_vus.ten_chuc_vu',
                'nhan_viens.password'
            )->get();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu nhân viên thành công',
            'data'    => $data,
        ]);
    }
    public function addData(Request $request)
    {
        NhanVien::create([
            'email'         => $request->email,
            'ho_va_ten'     => $request->ho_va_ten,
            'password'      => bcrypt($request->password),
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi'       => $request->dia_chi,
            'ngay_sinh'     => $request->ngay_sinh,
            'tinh_trang'    => $request->tinh_trang,
            'id_chuc_vu'    => $request->id_chuc_vu
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm nhân viên thành công'
        ]);
    }
     public function update(Request $request)
    {

        NhanVien::where('id', $request->id)->update([
            'email'         => $request->email,
            'ho_va_ten'     => $request->ho_va_ten,
            'password'      => bcrypt($request->password),
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi'       => $request->dia_chi,
            'ngay_sinh'     => $request->ngay_sinh,
            'tinh_trang'    => $request->tinh_trang,
            'id_chuc_vu'    => $request->id_chuc_vu
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật nhân viên ' . $request->ho_va_ten . ' thành công',
        ]);
    }
    public function destroy(Request $request)
    {
        NhanVien::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa nhân viên thành công'
        ]);
    }
    
}
