<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;
use App\Models\PhanQuyen;
use App\Models\HoaDon;
use App\Models\Ve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
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
            ->select('hoa_dons.*', 'khach_hangs.ho_va_ten as ten_khach_hang')
            ->get();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu đơn hàng thành công',
            'data'    => $data,
        ]);
    }
    public function update(Request $request)
    {
        $hoaDon = HoaDon::find($request->id);
        if ($hoaDon) {
            $statusHoaDon = $request->trang_thai;
            $hoaDon->update([
                'trang_thai' => $statusHoaDon
            ]);
            $statusVe = 1; // Mặc định là Chưa thanh toán (Vé = 1)

            if ($statusHoaDon == 2) {
                // Nếu Hóa đơn là Đã thanh toán (2) -> Vé phải là Đã thanh toán (2)
                $statusVe = 2;
            } else if ($statusHoaDon == 0) {
                // Nếu Hóa đơn là Chờ thanh toán (0) -> Vé là Chưa thanh toán (1)
                $statusVe = 1;
            }

            // Cập nhật tất cả vé thuộc hóa đơn này
            \App\Models\Ve::where('id_hoa_don', $hoaDon->id)->update([
                'tinh_trang' => $statusVe
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Cập nhật thành công! Trạng thái Vé đã khớp với Hóa đơn.'
            ]);
        }
    }
    public function destroy(Request $request)
    {
        // Tìm hóa đơn dựa trên id được gửi lên từ biến don_huy của Vue
        $hoaDon = HoaDon::find($request->id);

        if ($hoaDon) {

            \App\Models\Ve::where('id_hoa_don', $hoaDon->id)->delete([
            ]);

            // 2. Thực hiện xóa hóa đơn khỏi database
            $hoaDon->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Đã hủy hóa đơn!'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Hóa đơn không tồn tại hoặc đã bị xóa trước đó.'
        ]);
    }
}
