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
                'chuc_vus.ten_chuc_vu'
            )->get();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu nhân viên thành công',
            'data'    => $data,
        ]);
    }
}
