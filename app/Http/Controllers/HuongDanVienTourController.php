<?php

namespace App\Http\Controllers;

use App\Models\HuongDanVienTour;
use App\Models\HuongDanVien;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HuongDanVienTourController extends Controller
{
    /**
     * ==================================================
     * DÀNH CHO ADMIN - QUẢN LÝ HDV & PHÂN CÔNG
     * ==================================================
     */

    // 1. Lấy danh sách HDV (Đổ vào tab "Danh sách Hướng dẫn viên")
    public function getDanhSachHuongDanVien()
    {
        $data = HuongDanVien::orderBy('id', 'DESC')->get();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy danh sách hướng dẫn viên thành công!',
            'data'    => $data
        ]);
    }

    // 2. Lấy danh sách Phân Công (Đổ vào tab "Phân công Tour") - JOIN 3 BẢNG
    public function getDanhSachPhanCong()
    {
        $data = DB::table('huong_dan_vien_tours')
            ->join('tours', 'huong_dan_vien_tours.id_tour', '=', 'tours.id')
            ->join('huong_dan_viens', 'huong_dan_vien_tours.id_huong_dan_vien', '=', 'huong_dan_viens.id')
            ->select(
                'huong_dan_vien_tours.id as id_phan_cong', // ID của bảng phân công (Dùng để xóa)
                'tours.id as id_tour',
                'tours.ten_tour',
                'tours.ngay_bat_dau',
                'tours.ngay_ket_thuc',
                'huong_dan_viens.id as id_hdv',
                'huong_dan_viens.ho_va_ten as ten_hdv',
                'huong_dan_viens.so_dien_thoai',
                'huong_dan_viens.ngon_ngu',
                'huong_dan_viens.is_block'
            )
            ->orderBy('huong_dan_vien_tours.id', 'DESC')
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy danh sách phân công thành công!',
            'data'    => $data
        ]);
    }

    // 3. Phân công HDV cho Tour mới
    public function taoPhanCong(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tour'           => 'required|exists:tours,id',
            'id_huong_dan_vien' => 'required|exists:huong_dan_viens,id',
        ], [
            'id_tour.required'           => 'Vui lòng chọn Tour.',
            'id_tour.exists'             => 'Tour không tồn tại.',
            'id_huong_dan_vien.required' => 'Vui lòng chọn Hướng dẫn viên.',
            'id_huong_dan_vien.exists'   => 'Hướng dẫn viên không tồn tại.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first()
            ]);
        }

        // Kiểm tra xem HDV đã được phân công vào Tour này chưa để tránh trùng lặp
        $check = HuongDanVienTour::where('id_tour', $request->id_tour)
                                 ->where('id_huong_dan_vien', $request->id_huong_dan_vien)
                                 ->first();

        if ($check) {
            return response()->json([
                'status'  => false,
                'message' => 'Hướng dẫn viên này đã được phân công cho Tour này rồi!'
            ]);
        }

        HuongDanVienTour::create([
            'id_tour'           => $request->id_tour,
            'id_huong_dan_vien' => $request->id_huong_dan_vien
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Phân công Hướng dẫn viên thành công!'
        ]);
    }

    // 4. Hủy phân công
    public function xoaPhanCong(Request $request)
    {
        $phanCong = HuongDanVienTour::find($request->id);

        if ($phanCong) {
            $phanCong->delete();
            return response()->json([
                'status'  => true,
                'message' => 'Đã hủy phân công thành công!'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Không tìm thấy dữ liệu phân công!'
        ]);
    }

    /**
     * ==================================================
     * DÀNH CHO CLIENT - PUBLIC KHÔNG CẦN ĐĂNG NHẬP
     * ==================================================
     */

    // API Lấy toàn bộ danh sách HDV (đang hoạt động và không bị khóa)
    public function getDanhSachHDVClient()
    {
        $data = HuongDanVien::where('is_active', 1)
                            ->where('is_block', 0)
                            ->orderBy('id', 'DESC')
                            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy danh sách hướng dẫn viên thành công!',
            'data'    => $data
        ]);
    }

    // API Lấy chi tiết 1 HDV và Danh sách các Tour (kèm Lịch trình) họ đang dẫn
    public function getChiTietHDVClient($id)
    {
        // 1. Lấy thông tin cá nhân của HDV
        $hdv = HuongDanVien::where('id', $id)
                           ->where('is_active', 1)
                           ->where('is_block', 0)
                           ->first();

        if (!$hdv) {
            return response()->json([
                'status'  => false,
                'message' => 'Hướng dẫn viên không tồn tại hoặc đang tạm khóa.'
            ]);
        }

        // 2. Lấy danh sách các Tour mà HDV này đang được phân công
        $tours = DB::table('huong_dan_vien_tours')
            ->join('tours', 'huong_dan_vien_tours.id_tour', '=', 'tours.id')
            ->where('huong_dan_vien_tours.id_huong_dan_vien', $id)
            ->where('tours.tinh_trang', 1)
            ->select('tours.*')
            ->get();

        // 3. Lấy Lịch trình và Điểm đến lồng vào từng Tour
        foreach ($tours as $tour) {
            $lichTrinh = DB::table('lich_trinhs')
                ->leftJoin('diem_dens', 'lich_trinhs.id_diem_den', '=', 'diem_dens.id')
                ->where('lich_trinhs.id_tour', $tour->id)
                ->select(
                    'lich_trinhs.tieu_de_hoat_dong',
                    'diem_dens.ten_diem_den',
                    'diem_dens.hinh_anh as anh_diem_den'
                )
                ->get();

            $tour->chi_tiet_lich_trinh = $lichTrinh;
        }

        return response()->json([
            'status'  => true,
            'message' => 'Lấy chi tiết Hướng dẫn viên thành công!',
            'data'    => [
                'thong_tin_hdv' => $hdv,
                'danh_sach_tour' => $tours
            ]
        ]);
    }

    // Lấy thông tin HDV của 1 Tour cụ thể (Dùng ở trang đặt tour)
    public function getHDVByTour($id_tour)
    {
        $data = DB::table('huong_dan_vien_tours')
            ->join('huong_dan_viens', 'huong_dan_vien_tours.id_huong_dan_vien', '=', 'huong_dan_viens.id')
            ->where('huong_dan_vien_tours.id_tour', $id_tour)
            ->where('huong_dan_viens.is_active', 1)
            ->where('huong_dan_viens.is_block', 0)
            ->select('huong_dan_viens.id', 'huong_dan_viens.ho_va_ten', 'huong_dan_viens.ngon_ngu', 'huong_dan_viens.so_dien_thoai', 'huong_dan_viens.email')
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy thông tin HDV dẫn tour thành công!',
            'data'    => $data
        ]);
    }

}
