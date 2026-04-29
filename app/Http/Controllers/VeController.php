<?php

namespace App\Http\Controllers;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\PhanQuyen;
use App\Models\Tour;
use App\Models\HoaDon;
Use App\Models\KhachHang;

class VeController extends Controller
{
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 8;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $data = Ve::join('hoa_dons', 'ves.id_hoa_don', '=', 'hoa_dons.id')
                ->join('tours', 'hoa_dons.id_tour', '=', 'tours.id')
                ->join('khach_hangs', 'ves.id_khach_hang', '=', 'khach_hangs.id')
                ->select(
                    'ves.*',
                    'hoa_dons.id_tour',
                    'tours.ten_tour',
                    'khach_hangs.ho_va_ten'
                )
                ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu vé thành công',
            'data'    => $data
        ]);
    }
    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 8;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        // Lấy giá vé từ giá tour (tự động)
        $gia_ve = $request->gia_ve;
        if ($request->id_hoa_don) {
            $hoaDon = HoaDon::find($request->id_hoa_don);
            if ($hoaDon) {
                $tour = Tour::find($hoaDon->id_tour);
                if ($tour) {
                    $gia_ve = $tour->gia;
                }
            }
        }

        Ve::create([
            'ma_ve'             => $request->ma_ve,
            'gia_ve'            => $gia_ve,
            'id_khach_hang'     => $request->id_khach_hang,
            'id_hoa_don'        => $request->id_hoa_don,
            'tinh_trang'        => $request->tinh_trang,
            'created_at'       => Carbon::now(),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm vé thành công',
        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 8;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $ve = Ve::find($request->id);
        if (!$ve) {
            return response()->json([
                'status' => false,
                'message' => 'Vé không tồn tại',
            ]);
        }

        // Lấy giá vé từ giá tour (tự động)
        $gia_ve = $request->gia_ve;
        if ($ve->id_hoa_don) {
            $hoaDon = HoaDon::find($ve->id_hoa_don);
            if ($hoaDon) {
                $tour = Tour::find($hoaDon->id_tour);
                if ($tour) {
                    $gia_ve = $tour->gia;
                }
            }
        }

        $ve->update([
            'ma_ve'             => $request->ma_ve,
            'gia_ve'            => $gia_ve,
            'id_khach_hang'     => $request->id_khach_hang,
            'tinh_trang'        => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật vé thành công',
        ]);
    }
    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 8;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        Ve::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa vé thành công',
        ]);
    }
    public function changeStatus(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 8;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        Ve::where('id', $request->id)->update(['tinh_trang' => $request->tinh_trang]);
        return response()->json(['status' => true, 'message' => 'Thay đổi trạng thái vé thành công']);
    }

    /**
     * ADMIN: Cập nhật tất cả giá vé theo giá tour
     */
    public function syncPrices()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 8;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        DB::beginTransaction();
        try {
            // Lấy tất cả vé với thông tin tour
            $ves = Ve::join('hoa_dons', 'ves.id_hoa_don', '=', 'hoa_dons.id')
                    ->join('tours', 'hoa_dons.id_tour', '=', 'tours.id')
                    ->select('ves.id', 'tours.gia')
                    ->get();

            $updated = 0;
            foreach ($ves as $ve) {
                Ve::where('id', $ve->id)->update(['gia_ve' => $ve->gia]);
                $updated++;
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => "Cập nhật giá vé thành công! Đã cập nhật $updated vé.",
                'updated' => $updated
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => false,
                'message' => "Lỗi: " . $e->getMessage()
            ]);
        }
    }

    public function datTour(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof KhachHang)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Bạn chưa đăng nhập'
            ], 401);
        }

        $id_tour = $request->id_tour;
        $so_luong_nguoi = (int)$request->so_luong_nguoi;

        if ($so_luong_nguoi <= 0) {
            return response()->json(['status' => false, 'message' => 'Số lượng người không hợp lệ']);
        }

        $ghi_chu_danh_sach = $request->ghi_chu_danh_sach_nguoi_di ?? '';

        // Mặc định lúc vừa tạo Hóa Đơn (khách chưa sang trang VNPAY)
        $phuong_thuc_thanh_toan = $request->phuong_thuc_thanh_toan ?? 'Chuyển khoản';

        DB::beginTransaction();
        try {
            $tour = Tour::where('id', $id_tour)
                        ->where('tinh_trang', 1)
                        ->lockForUpdate()
                        ->first();

            if (!$tour) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => "Tour không tồn tại hoặc đã đóng!"]);
            }

            if ($so_luong_nguoi > $tour->so_nguoi_toi_da) {
                DB::rollBack();
                return response()->json([
                    'status'  => false,
                    'message' => "Tour chỉ còn trống " . $tour->so_nguoi_toi_da . " chỗ!"
                ]);
            }

            $tong_tien = $tour->gia * $so_luong_nguoi;

            $hoa_don = HoaDon::create([
                'id_khach_hang'              => $user->id,
                'id_tour'                    => $tour->id,
                'ma_hoa_don'                 => 'HD' . strtoupper(Str::random(10)),
                'so_luong_nguoi'             => $so_luong_nguoi,
                'tong_tien'                  => $tong_tien,
                'phuong_thuc_thanh_toan'     => $phuong_thuc_thanh_toan,
                'trang_thai'                 => '1',
                'ghi_chu_danh_sach_nguoi_di' => $ghi_chu_danh_sach,
                'ngay_tao'                   => Carbon::now(),
            ]);

            $ds_ve_tao_moi = [];
            for ($i = 0; $i < $so_luong_nguoi; $i++) {
                $ve = Ve::create([
                    'ma_ve'         => 'VE-' . strtoupper(Str::random(8)),
                    'gia_ve'        => $tour->gia,
                    'id_khach_hang' => $user->id,
                    'id_hoa_don'    => $hoa_don->id,
                    'tinh_trang'    => '1',
                    'is_check_in'   => 0,
                ]);
                $ds_ve_tao_moi[] = $ve;
            }

            $tour->decrement('so_nguoi_toi_da', $so_luong_nguoi);

            DB::commit();

            $ma_giao_dich = 'HDTOUR' . $hoa_don->id;
            $link_qr_code = "https://img.vietqr.io/image/MBBank-1910061030119-compact.png?amount={$tong_tien}&addInfo={$ma_giao_dich}";

            return response()->json([
                'status'  => true,
                'message' => "Đã đặt tour thành công!",
                'data'    => [
                    'hoa_don'      => $hoa_don,
                    'danh_sach_ve' => $ds_ve_tao_moi,
                    'link_qr_code' => $link_qr_code
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => false,
                'message' => "Có lỗi xảy ra: " . $e->getMessage()
            ]);
        }
    }

    public function getAllTours()
    {
        $tours = Tour::where('tinh_trang', 1)->get();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu tour thành công',
            'data'    => $tours
        ]);
    }
}
