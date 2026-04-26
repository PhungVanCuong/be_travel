<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\Models\PhanQuyen;
use App\Models\HoaDon;
use App\Models\Ve;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ThongKeController extends Controller
{
    public function thongKeKHMoi(Request $request)
    {
        $id_chuc_nang = 1;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = KhachHang::whereDate(DB::raw('DATE(created_at)'), '>=', $request->begin)
            ->whereDate(DB::raw('DATE(created_at)'), '<=', $request->end)
            ->select(DB::raw('DATE(created_at) as ngay_dang_ky'), DB::raw('COUNT(id) as so_khach_hang_moi'))
            ->groupBy('ngay_dang_ky')
            ->orderBy('ngay_dang_ky')
            ->get();
        $colors = [];
        foreach ($data->pluck('ngay_dang_ky') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
        }
        return response()->json([
            'status' => true,
            'data'   =>  $data,
            'labels' => $data->pluck('ngay_dang_ky'),
            'datasets' => [[
                'label' => 'Biểu đồ Khách Hàng Mới',
                'data' => $data->pluck('so_khach_hang_moi'),
                'backgroundColor' => $colors,
            ]]
        ]);
    }
    Public function thongKeDoanhThu(Request $request)
    {
        $id_chuc_nang = 1;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = HoaDon::whereDate('ngay_tao', '>=', $request->begin)
            ->whereDate('ngay_tao', '<=', $request->end)
            ->select(
                DB::raw('DATE(ngay_tao) as ngay'),
                DB::raw('COUNT(id) as tong_don_hang'),
                DB::raw('SUM(tong_tien) as tong_tien'),
            )
            ->groupBy('ngay')
            ->orderBy('ngay')
            ->get();

        $colors = [];
        foreach ($data->pluck('ngay') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ngay'),
            'datasets' => [
                [
                    'label' => 'Tổng Tiền Thực Nhận',
                    'data' => $data->pluck('tong_tien'),
                    'backgroundColor' => $colors,
                ]
            ]
        ]);
    }
    public function ThongKeVeBanRa(Request $request)
    {
        $id_chuc_nang = 1;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = Ve::join('hoa_dons', 'ves.id_hoa_don', '=', 'hoa_dons.id')
            ->whereDate('hoa_dons.ngay_tao', '>=', $request->begin)
            ->whereDate('hoa_dons.ngay_tao', '<=', $request->end)
            ->select(
                DB::raw('DATE(hoa_dons.ngay_tao) as ngay'),
                DB::raw('COUNT(ves.id) as tong_so_ve'),
                DB::raw('SUM(hoa_dons.trang_thai) as so_ve_da_thanh_toan')
            )
            ->groupBy('ngay')
            ->orderBy('ngay')
            ->get();

        $colors = [];
        foreach ($data->pluck('ngay') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ngay'),
            'datasets' => [
                [
                    'label' => 'Tổng Số Vé Bán Ra',
                    'data' => $data->pluck('tong_so_ve'),
                    'backgroundColor' => $colors,
                ],
                [
                    'label' => 'Số Vé Đã Thanh Toán',
                    'data' => $data->pluck('so_ve_da_thanh_toan'),
                    'backgroundColor' => $colors,
                ]
            ]
        ]);
    }
    public function thongKeChiTieuKhachHang(Request $request)
    {
        $id_chuc_nang = 1;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = HoaDon::join('khach_hangs', 'hoa_dons.id_khach_hang', '=', 'khach_hangs.id')
            ->whereDate('hoa_dons.ngay_tao', '>=', $request->begin)
            ->whereDate('hoa_dons.ngay_tao', '<=', $request->end)
            ->where('hoa_dons.trang_thai', 1)
            ->select(
                'khach_hangs.ho_va_ten',
                DB::raw('COUNT(hoa_dons.id) as so_don_hang'),
                DB::raw('SUM(hoa_dons.tong_tien) as tong_chi_tieu')
            )
            ->groupBy('khach_hangs.ho_va_ten')
            ->orderBy('khach_hangs.ho_va_ten')
            ->get();

        $colors = [];
        foreach ($data->pluck('ho_va_ten') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ho_va_ten'),
            'datasets' => [
                [
                    'label' => 'Tổng Chi Tiêu',
                    'data' => $data->pluck('tong_chi_tieu'),
                    'backgroundColor' => $colors,
                ]
            ]
        ]);
    }
    public function thongKeTour(Request $request)
{
    $id_chuc_nang = 1;
    $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
    $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();

    if (!$check) {
        return response()->json([
            'status'    =>  0,
            'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
        ]);
    }

    // Truy vấn theo cấu trúc: tours <- hoa_dons <- ves
    $data = Tour::join('hoa_dons', 'tours.id', '=', 'hoa_dons.id_tour')
        ->join('ves', 'hoa_dons.id', '=', 'ves.id_hoa_don')
        ->whereDate('hoa_dons.ngay_tao', '>=', $request->begin)
        ->whereDate('hoa_dons.ngay_tao', '<=', $request->end)
        ->where('hoa_dons.trang_thai', 1) // Chỉ tính các hóa đơn hợp lệ
        ->select(
            'tours.ten_tour',
            DB::raw('COUNT(ves.id) as so_luong_ve_ban_ra'), // Đếm số vé của các hóa đơn thuộc tour đó
            DB::raw('SUM(hoa_dons.tong_tien) as doanh_thu_du_kien')
        )
        ->groupBy('tours.ten_tour')
        ->orderBy('so_luong_ve_ban_ra', 'DESC') // Tour nào bán được nhiều vé nhất lên đầu
        ->get();

    $colors = [];
    foreach ($data as $v) {
        $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
    }

    return response()->json([
        'status' => true,
        'data'   => $data,
        'labels' => $data->pluck('ten_tour'),
        'datasets' => [
            [
                'label' => 'Số Lượng Vé Bán Ra',
                'data' => $data->pluck('so_luong_ve_ban_ra'),
                'backgroundColor' => $colors,
            ]
        ]
    ]);
}

}
