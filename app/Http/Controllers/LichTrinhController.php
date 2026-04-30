<?php

namespace App\Http\Controllers;

use App\Models\LichTrinh;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LichTrinhController extends Controller
{
    /**
     * LẤY DANH SÁCH LỊCH TRÌNH (Admin) - Nối 4 bảng
     */
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        // Kiểm tra phân quyền (Master admin thì bỏ qua)
        if ($user->is_master != 1) {
            $id_chuc_nang = 12; // ID chức năng Quản lý lịch trình tour
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        // Nối bảng Lịch trình với Tour, Điểm Đến và Phương Tiện
        $data = LichTrinh::leftJoin('tours', 'lich_trinhs.id_tour', '=', 'tours.id')
            ->leftJoin('diem_dens', 'lich_trinhs.id_diem_den', '=', 'diem_dens.id')
            ->leftJoin('phuong_tiens', 'lich_trinhs.id_phuong_tien', '=', 'phuong_tiens.id')
            ->select(
                'lich_trinhs.*',
                'tours.ten_tour',
                'diem_dens.ten_diem_den',
                'diem_dens.hinh_anh as anh_diem_den',
                'phuong_tiens.loai_phuong_tien',
                'phuong_tiens.so_hieu'
            )
            ->orderBy('lich_trinhs.id_tour', 'DESC')
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu lịch trình thành công',
            'data'    => $data,
        ]);
    }

    /**
     * THÊM MỚI LỊCH TRÌNH
     */
    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 12;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $validator = Validator::make($request->all(), [
            'id_tour'           => 'required|exists:tours,id',
            'tieu_de_hoat_dong' => 'required|string|max:500',
        ], [
            'id_tour.required'           => 'Vui lòng chọn Tour.',
            'id_tour.exists'             => 'Tour đã chọn không tồn tại.',
            'tieu_de_hoat_dong.required' => 'Vui lòng nhập nội dung hoạt động.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first()
            ]);
        }

        LichTrinh::create([
            'id_tour'           => $request->id_tour,
            'id_diem_den'       => $request->id_diem_den,
            'id_phuong_tien'    => $request->id_phuong_tien,
            'tieu_de_hoat_dong' => $request->tieu_de_hoat_dong,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Thêm mới lịch trình thành công!'
        ]);
    }

    /**
     * CẬP NHẬT LỊCH TRÌNH
     */
    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 12;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $lichTrinh = LichTrinh::find($request->id);

        if (!$lichTrinh) {
            return response()->json([
                'status'  => false,
                'message' => 'Lịch trình không tồn tại!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'id_tour'           => 'required|exists:tours,id',
            'tieu_de_hoat_dong' => 'required|string|max:500',
        ], [
            'id_tour.required'           => 'Vui lòng chọn Tour.',
            'id_tour.exists'             => 'Tour đã chọn không tồn tại.',
            'tieu_de_hoat_dong.required' => 'Vui lòng nhập nội dung hoạt động.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $lichTrinh->update([
            'id_tour'           => $request->id_tour,
            'id_diem_den'       => $request->id_diem_den,
            'id_phuong_tien'    => $request->id_phuong_tien,
            'tieu_de_hoat_dong' => $request->tieu_de_hoat_dong,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Cập nhật lịch trình thành công!'
        ]);
    }

    /**
     * XÓA LỊCH TRÌNH
     */
    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 12;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $lichTrinh = LichTrinh::find($request->id);

        if ($lichTrinh) {
            $lichTrinh->delete();
            return response()->json([
                'status'  => true,
                'message' => 'Xóa lịch trình thành công!'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Lịch trình không tồn tại hoặc đã bị xóa!'
        ]);
    }

    /**
     * DÀNH CHO HƯỚNG DẪN VIÊN: Lấy Lịch trình của TẤT CẢ CÁC TOUR MÀ HDV NÀY ĐÃ NHẬN
     * Dữ liệu được nhóm theo Tour
     */
    public function getLichTrinhHDV(Request $request)
    {
        // 1. Kiểm tra đăng nhập
        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof \App\Models\HuongDanVien)) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn không có quyền truy cập.'
            ]);
        }

        // 2. Lấy danh sách các Tour mà HDV này ĐÃ NHẬN (từ bảng huong_dan_vien_tours)
        $toursDaNhan = DB::table('huong_dan_vien_tours')
            ->join('tours', 'huong_dan_vien_tours.id_tour', '=', 'tours.id')
            ->where('huong_dan_vien_tours.id_huong_dan_vien', $user->id)
            ->select(
                'tours.id as id_tour',
                'tours.ten_tour',
                'tours.ngay_bat_dau',
                'tours.ngay_ket_thuc'
            )
            ->orderBy('tours.ngay_bat_dau', 'asc')
            ->get();

        // 3. Lặp qua từng Tour để lấy chi tiết Lịch trình (Điểm đến, Phương tiện) nhét vào trong
        foreach ($toursDaNhan as $tour) {
            $lichTrinhChiTiet = \App\Models\LichTrinh::leftJoin('diem_dens', 'lich_trinhs.id_diem_den', '=', 'diem_dens.id')
                ->leftJoin('phuong_tiens', 'lich_trinhs.id_phuong_tien', '=', 'phuong_tiens.id')
                ->where('lich_trinhs.id_tour', $tour->id_tour)
                ->select(
                    'lich_trinhs.id as id_lich_trinh',
                    'lich_trinhs.tieu_de_hoat_dong',
                    'diem_dens.id as id_diem_den',
                    'diem_dens.ten_diem_den',
                    'diem_dens.hinh_anh as anh_diem_den',
                    'phuong_tiens.id as id_phuong_tien',
                    'phuong_tiens.loai_phuong_tien',
                    'phuong_tiens.so_hieu'
                )
                ->orderBy('lich_trinhs.id', 'ASC')
                ->get();

            // Gắn mảng lịch trình chi tiết vào object tour
            $tour->danh_sach_lich_trinh = $lichTrinhChiTiet;
        }

        return response()->json([
            'status'  => true,
            'message' => 'Lấy lịch trình công việc thành công',
            'data'    => $toursDaNhan, // Trả về mảng Tour, trong Tour có Lịch trình
        ]);
    }
}
