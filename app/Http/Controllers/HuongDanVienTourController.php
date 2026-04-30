<?php

namespace App\Http\Controllers;

use App\Models\HuongDanVienTour;
use App\Models\HuongDanVien;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HuongDanVienTourController extends Controller
{
    /**
     * ==================================================
     * DÀNH CHO ADMIN - QUẢN LÝ HDV & PHÂN CÔNG
     * ==================================================
     */
    public function getDanhSachHuongDanVien()
    {
        $data = HuongDanVien::orderBy('id', 'DESC')->get();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy danh sách hướng dẫn viên thành công!',
            'data'    => $data
        ]);
    }

    public function getDanhSachPhanCong()
    {
        $data = DB::table('huong_dan_vien_tours')
            ->join('tours', 'huong_dan_vien_tours.id_tour', '=', 'tours.id')
            ->join('huong_dan_viens', 'huong_dan_vien_tours.id_huong_dan_vien', '=', 'huong_dan_viens.id')
            ->select(
                'huong_dan_vien_tours.id as id_phan_cong',
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

    public function taoPhanCong(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tour'           => 'required|exists:tours,id',
            'id_huong_dan_vien' => 'required|exists:huong_dan_viens,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first()
            ]);
        }

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

    public function xoaPhanCong(Request $request)
    {
        $phanCong = HuongDanVienTour::find($request->id);
        if ($phanCong) {
            $phanCong->delete();
            return response()->json(['status' => true, 'message' => 'Đã hủy phân công thành công!']);
        }
        return response()->json(['status' => false, 'message' => 'Không tìm thấy dữ liệu phân công!']);
    }

    /**
     * ==================================================
     * DÀNH CHO CLIENT - PUBLIC KHÔNG CẦN ĐĂNG NHẬP
     * ==================================================
     */
    public function getDanhSachHDVClient()
    {
        $data = HuongDanVien::where('is_active', 1)->where('is_block', 0)->orderBy('id', 'DESC')->get();
        return response()->json(['status' => true, 'message' => 'Thành công!', 'data' => $data]);
    }

    public function getChiTietHDVClient($id)
    {
        $hdv = HuongDanVien::where('id', $id)->where('is_active', 1)->where('is_block', 0)->first();
        if (!$hdv) {
            return response()->json(['status' => false, 'message' => 'Hướng dẫn viên không tồn tại.']);
        }

        $tours = DB::table('huong_dan_vien_tours')
            ->join('tours', 'huong_dan_vien_tours.id_tour', '=', 'tours.id')
            ->where('huong_dan_vien_tours.id_huong_dan_vien', $id)
            ->where('tours.tinh_trang', 1)
            ->select('tours.*')
            ->get();

        foreach ($tours as $tour) {
            $tour->chi_tiet_lich_trinh = DB::table('lich_trinhs')
                ->leftJoin('diem_dens', 'lich_trinhs.id_diem_den', '=', 'diem_dens.id')
                ->where('lich_trinhs.id_tour', $tour->id)
                ->select('lich_trinhs.tieu_de_hoat_dong', 'diem_dens.ten_diem_den', 'diem_dens.hinh_anh as anh_diem_den')
                ->get();
        }

        return response()->json([
            'status' => true,
            'message' => 'Thành công!',
            'data' => ['thong_tin_hdv' => $hdv, 'danh_sach_tour' => $tours]
        ]);
    }

    public function getHDVByTour($id_tour)
    {
        $data = DB::table('huong_dan_vien_tours')
            ->join('huong_dan_viens', 'huong_dan_vien_tours.id_huong_dan_vien', '=', 'huong_dan_viens.id')
            ->where('huong_dan_vien_tours.id_tour', $id_tour)
            ->where('huong_dan_viens.is_active', 1)->where('huong_dan_viens.is_block', 0)
            ->select('huong_dan_viens.id', 'huong_dan_viens.ho_va_ten', 'huong_dan_viens.ngon_ngu', 'huong_dan_viens.so_dien_thoai', 'huong_dan_viens.email', 'huong_dan_viens.avatar')
            ->get();
        return response()->json(['status' => true, 'data' => $data]);
    }

    /**
     * ==================================================
     * DÀNH CHO HƯỚNG DẪN VIÊN - QUẢN LÝ NHẬN TOUR & KHÁCH HÀNG
     * ==================================================
     */
    public function getTourTrong()
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) return response()->json(['status' => false, 'message' => 'Chưa đăng nhập!']);

        $tours = Tour::where('tinh_trang', 1)
            ->whereDate('ngay_bat_dau', '>=', now())
            ->whereNotIn('id', function($query) {
                $query->select('id_tour')->from('huong_dan_vien_tours');
            })
            ->orderBy('ngay_bat_dau', 'asc')->get();

        return response()->json(['status' => true, 'data' => $tours]);
    }

    public function getTourCuaToi()
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) return response()->json(['status' => false, 'message' => 'Chưa đăng nhập!']);

        $tours = DB::table('huong_dan_vien_tours')
            ->join('tours', 'huong_dan_vien_tours.id_tour', '=', 'tours.id')
            ->where('huong_dan_vien_tours.id_huong_dan_vien', $user->id)
            ->select('tours.*', 'huong_dan_vien_tours.created_at as thoi_gian_nhan')
            ->orderBy('tours.ngay_bat_dau', 'asc')->get();

        return response()->json(['status' => true, 'data' => $tours]);
    }

    public function nhanTour(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) return response()->json(['status' => false, 'message' => 'Chưa đăng nhập!']);

        $check = DB::table('huong_dan_vien_tours')->where('id_tour', $request->id_tour)->first();
        if ($check) {
            return response()->json(['status' => false, 'message' => 'Tour này đã có người nhận!']);
        }

        DB::table('huong_dan_vien_tours')->insert([
            'id_tour' => $request->id_tour,
            'id_huong_dan_vien' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['status' => true, 'message' => 'Nhận tour thành công!']);
    }

    public function getKhachHangCuaToi(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof \App\Models\HuongDanVien)) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền truy cập.']);
        }

        $toursDaNhan = DB::table('huong_dan_vien_tours')
            ->join('tours', 'huong_dan_vien_tours.id_tour', '=', 'tours.id')
            ->where('huong_dan_vien_tours.id_huong_dan_vien', $user->id)
            ->select(
                'tours.id',
                'tours.ten_tour',
                'tours.ngay_bat_dau',
                'tours.so_nguoi_toi_da'
            )
            ->orderBy('tours.ngay_bat_dau', 'asc')
            ->get();

        foreach ($toursDaNhan as $tour) {
            $khachHangs = DB::table('hoa_dons')
                ->join('khach_hangs', 'hoa_dons.id_khach_hang', '=', 'khach_hangs.id')
                ->where('hoa_dons.id_tour', $tour->id)
                ->where('hoa_dons.trang_thai', '!=', 0)
                ->select(
                    'khach_hangs.id as id_khach_hang',
                    'khach_hangs.ho_va_ten',
                    'khach_hangs.email',
                    'khach_hangs.so_dien_thoai',
                    'khach_hangs.cccd',
                    'khach_hangs.avatar', // ĐÃ BỔ SUNG AVATAR CỦA KHÁCH
                    'hoa_dons.so_luong_nguoi',
                    'hoa_dons.ma_hoa_don',
                    'hoa_dons.ghi_chu_danh_sach_nguoi_di', // ĐÃ BỔ SUNG GHI CHÚ
                    'hoa_dons.created_at as ngay_dat_ve'
                )
                ->orderBy('hoa_dons.created_at', 'DESC')
                ->get();

            $tongKhachThucTe = 0;
            foreach ($khachHangs as $kh) {
                $tongKhachThucTe += $kh->so_luong_nguoi;
            }

            $tour->tong_khach_da_dat = $tongKhachThucTe;
            $tour->danh_sach_khach_hang = $khachHangs;
        }

        return response()->json([
            'status'  => true,
            'message' => 'Lấy danh sách khách hàng thành công',
            'data'    => $toursDaNhan,
        ]);
    }
}
