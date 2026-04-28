<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\Tour;
use App\Models\Ve;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HoaDonController extends Controller
{
    /**
     * ADMIN: Lấy danh sách hóa đơn
     */
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 7;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $data = HoaDon::join('khach_hangs', 'hoa_dons.id_khach_hang', 'khach_hangs.id')
            ->join('tours', 'hoa_dons.id_tour', 'tours.id')
            ->select(
                'hoa_dons.*',
                'khach_hangs.ho_va_ten as ten_khach_hang',
                'khach_hangs.so_dien_thoai',
                'tours.ten_tour'
            )
            ->orderBy('hoa_dons.created_at', 'desc')
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu đơn hàng thành công',
            'data'    => $data,
        ]);
    }

    /**
     * ADMIN: Cập nhật trạng thái hóa đơn
     */
    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 7;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $hoaDon = HoaDon::find($request->id);
        if ($hoaDon) {
            $statusHoaDon = $request->trang_thai;

            DB::beginTransaction();
            try {
                $hoaDon->update([
                    'trang_thai' => $statusHoaDon
                ]);

                $statusVe = 1; // 1: Chưa TT
                if ($statusHoaDon == 2) {
                    $statusVe = 2; // 2: Đã TT
                } else if ($statusHoaDon == 0) {
                    $statusVe = 0; // 0: Đã hủy (Lưu ý: Bạn cần check lại hằng số trong Model Ve)
                }

                // Cập nhật tất cả vé thuộc hóa đơn này
                Ve::where('id_hoa_don', $hoaDon->id)->update([
                    'tinh_trang' => $statusVe
                ]);

                // NẾU HỦY HÓA ĐƠN -> Hoàn lại số chỗ trống cho Tour
                if ($statusHoaDon == 0) {
                    $tour = Tour::find($hoaDon->id_tour);
                    if ($tour) {
                        $tour->increment('so_nguoi_toi_da', $hoaDon->so_luong_nguoi);
                    }
                }

                DB::commit();
                return response()->json([
                    'status'  => true,
                    'message' => 'Cập nhật thành công! Trạng thái Vé đã khớp với Hóa đơn.'
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => 'Lỗi cập nhật: ' . $e->getMessage()]);
            }
        }
        return response()->json(['status' => false, 'message' => 'Không tìm thấy hóa đơn']);
    }

    /**
     * ADMIN: Xóa hóa đơn
     */
    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 7;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $hoaDon = HoaDon::find($request->id);
        if ($hoaDon) {
            DB::beginTransaction();
            try {
                // Xóa các vé thuộc hóa đơn này
                Ve::where('id_hoa_don', $hoaDon->id)->delete();

                // Hoàn lại chỗ trống cho Tour nếu hóa đơn này chưa bị hủy trước đó
                if ($hoaDon->trang_thai != 0) {
                    $tour = Tour::find($hoaDon->id_tour);
                    if ($tour) {
                        $tour->increment('so_nguoi_toi_da', $hoaDon->so_luong_nguoi);
                    }
                }

                // Xóa hóa đơn
                $hoaDon->delete();

                DB::commit();
                return response()->json([
                    'status'  => true,
                    'message' => 'Đã xóa hóa đơn và hoàn lại số chỗ thành công!'
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => 'Lỗi xóa hóa đơn: ' . $e->getMessage()]);
            }
        }

        return response()->json([
            'status'  => false,
            'message' => 'Hóa đơn không tồn tại hoặc đã bị xóa trước đó.'
        ]);
    }

    /**
     * ADMIN: In vé / In hóa đơn chi tiết
     */
    public function inVeHoaDon(Request $request)
    {
        $maHoaDon = null;
        if ($request->has('ma_hoa_don')) {
            $maHoaDon = $request->ma_hoa_don;
        } else {
            $allInput = $request->all();
            if (!empty($allInput)) {
                $firstKey = array_key_first($allInput);
                if (strpos($firstKey, 'HD') === 0) {
                    $maHoaDon = $firstKey;
                }
            }
        }

        $hoaDon = HoaDon::where('ma_hoa_don', $maHoaDon)->first();
        if (!$hoaDon) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }

        $tour = Tour::find($hoaDon->id_tour);
        $khachHang = KhachHang::find($hoaDon->id_khach_hang);
        $ds_ve = Ve::where('id_hoa_don', $hoaDon->id)->get();

        return response()->json([
            'status' => true,
            'data' => [
                'thong_tin_hoa_don' => $hoaDon,
                'thong_tin_khach_hang' => $khachHang,
                'thong_tin_tour' => $tour,
                'danh_sach_ve' => $ds_ve
            ]
        ]);
    }

    /**
     * CLIENT: Lấy danh sách hóa đơn của Khách Hàng hiện tại
     */
    public function getHoaDonCuaKhachHang(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof KhachHang)) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để xem đơn hàng'
            ], 401);
        }

        $hoaDons = HoaDon::where('id_khach_hang', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $result = $hoaDons->map(function ($hoaDon) {
            $tour = Tour::find($hoaDon->id_tour);
            $veDaDat = Ve::where('id_hoa_don', $hoaDon->id)->get();

            return [
                'id' => $hoaDon->id,
                'ma_hoa_don' => $hoaDon->ma_hoa_don,
                'ngay_dat' => $hoaDon->ngay_tao,
                'tong_tien' => $hoaDon->tong_tien,
                'so_luong_nguoi' => $hoaDon->so_luong_nguoi,
                'trang_thai' => $hoaDon->trang_thai,
                'phuong_thuc_thanh_toan' => $hoaDon->phuong_thuc_thanh_toan,
                'tour' => $tour ? [
                    'ten_tour' => $tour->ten_tour,
                    'hinh_anh' => $tour->hinh_anh,
                    'diem_don' => $tour->diem_don,
                    'diem_tra' => $tour->diem_tra,
                    'ngay_bat_dau' => $tour->ngay_bat_dau,
                    'ngay_ket_thuc' => $tour->ngay_ket_thuc,
                ] : null,
                've' => $veDaDat,
                'created_at' => $hoaDon->created_at,
            ];
        });

        return response()->json([
            'status' => true,
            'message' => 'Lấy danh sách hóa đơn thành công',
            'data' => $result
        ]);
    }

    /**
     * CLIENT: Lấy chi tiết 1 hóa đơn để thanh toán
     */
    public function getChiTietThanhToanHoaDon(Request $request, $ma_hoa_don)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof KhachHang)) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để xem đơn hàng'
            ], 401);
        }

        $hoaDon = HoaDon::where('ma_hoa_don', $ma_hoa_don)->first();
        if (!$hoaDon) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy hóa đơn với mã: ' . $ma_hoa_don
            ], 404);
        }

        if ((int)$hoaDon->id_khach_hang !== (int)$user->id) {
            return response()->json([
                'status'  => false,
                'message' => 'Hóa đơn không thuộc về tài khoản hiện tại'
            ], 403);
        }

        $tour = Tour::find($hoaDon->id_tour);
        $veDaDat = Ve::where('id_hoa_don', $hoaDon->id)->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy chi tiết hóa đơn thành công',
            'data'    => [
                'hoa_don' => [
                    'ma_hoa_don' => $hoaDon->ma_hoa_don,
                    'ngay_dat'   => $hoaDon->ngay_tao,
                    'tong_tien'  => $hoaDon->tong_tien,
                    'so_luong_nguoi' => $hoaDon->so_luong_nguoi,
                    'trang_thai' => $hoaDon->trang_thai,
                    'ghi_chu'    => $hoaDon->ghi_chu_danh_sach_nguoi_di
                ],
                'khach_hang' => [
                    'ho_va_ten'   => $user->ho_va_ten,
                    'email'       => $user->email,
                    'so_dien_thoai' => $user->so_dien_thoai,
                ],
                'tour' => $tour ? [
                    'ten_tour' => $tour->ten_tour,
                    'hinh_anh' => $tour->hinh_anh,
                    'diem_don' => $tour->diem_don,
                    'diem_tra' => $tour->diem_tra,
                    'ngay_bat_dau' => $tour->ngay_bat_dau,
                    'ngay_ket_thuc' => $tour->ngay_ket_thuc,
                ] : null,
                've' => $veDaDat->map(function ($ve) {
                    return [
                        'ma_ve'   => $ve->ma_ve,
                        'gia_ve'  => $ve->gia_ve,
                        'tinh_trang' => $ve->tinh_trang
                    ];
                }),
                'thanh_toan' => [
                    // Tạo mã QR ngân hàng (Sử dụng VietQR làm ví dụ)
                    'link_qr_code' => 'https://img.vietqr.io/image/MBBank-1910061030119-compact.png?amount=' . $hoaDon->tong_tien . '&addInfo=' . $hoaDon->ma_hoa_don,
                    'ngan_hang'    => 'MB Bank',
                    'so_tai_khoan' => '1910061030119',
                    'chu_tai_khoan'=> 'IXTAL TOUR',
                    'noi_dung'     => $hoaDon->ma_hoa_don,
                ]
            ]
        ]);
    }

    /**
     * CLIENT: Khách hàng yêu cầu hủy hóa đơn
     */
    public function HuyHoaDon(Request $request)
    {
        try {
            $user = Auth::guard('sanctum')->user();
            $ma_hoa_don = $request->ma_hoa_don;

            $hoaDon = HoaDon::where('ma_hoa_don', $ma_hoa_don)
                            ->where('id_khach_hang', $user->id)
                            ->first();

            if (!$hoaDon) {
                return response()->json([
                    'status' => false,
                    'message' => 'Hóa đơn không tồn tại hoặc bạn không có quyền truy cập.'
                ]);
            }

            // Chỉ cho phép khách hàng hủy khi Hóa đơn chưa thanh toán
            if ($hoaDon->trang_thai == HoaDon::DA_THANH_TOAN) {
                return response()->json([
                    'status' => false,
                    'message' => 'Hóa đơn đã thanh toán, không thể hủy! Vui lòng liên hệ CSKH.'
                ]);
            }

            DB::beginTransaction();

            // 1. Cập nhật trạng thái Vé thành Đã Hủy
            Ve::where('id_hoa_don', $hoaDon->id)->update([
                'tinh_trang' => 0 // Đã hủy
            ]);

            // 2. Hoàn lại số người (số ghế) cho Tour
            $tour = Tour::find($hoaDon->id_tour);
            if ($tour) {
                $tour->increment('so_nguoi_toi_da', $hoaDon->so_luong_nguoi);
            }

            // 3. Xóa hoặc Cập nhật hóa đơn thành Đã Hủy (Nên update thay vì xóa cứng để lưu lịch sử)
            $hoaDon->update([
                'trang_thai' => HoaDon::DA_HUY
            ]);

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Đã hủy hóa đơn và hoàn lại số chỗ thành công.'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Lỗi hủy hóa đơn: " . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra, vui lòng thử lại.'
            ]);
        }
    }
}
