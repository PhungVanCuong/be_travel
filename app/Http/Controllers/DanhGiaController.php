<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DanhGia;
use App\Models\PhanQuyen;
use Illuminate\Support\Facades\DB;
class DanhGiaController extends Controller
{
    /**
     * Xử lý gửi đánh giá tour từ khách hàng
     */
    public function guiDanhGia(Request $request)
    {
        // Lấy thông tin khách hàng từ token Sanctum
        $user = Auth::guard('sanctum')->user();

        // 1. Kiểm tra dữ liệu đầu vào
        if (!$request->id_tour || !$request->sao_danh_gia) {
            return response()->json([
                'status'  => false,
                'message' => 'Dữ liệu đánh giá không hợp lệ!'
            ]);
        }
        DanhGia::updateOrCreate(
            [
                'id_khach_hang' => $user->id,
                'id_tour'       => $request->id_tour,
            ],
            [
                'sao_danh_gia'        => $request->sao_danh_gia,
                'noi_dung'      => $request->noi_dung,
                'tinh_trang'    => 1,
            ]
        );

        return response()->json([
            'status'  => true,
            'message' => 'Cảm ơn bạn đã đánh giá bộ tour này!'
        ]);
    }

    /**
     * Lấy danh sách đánh giá của một bộ tour
     */
    public function getDanhGia($id_tour)
    {
        $data = DanhGia::join('khach_hangs', 'danh_gias.id_khach_hang', 'khach_hangs.id')
            ->where('danh_gias.id_tour', $id_tour)
            ->where('danh_gias.tinh_trang', 1) // CHỈ LẤY ĐÁNH GIÁ ĐANG HIỆN
            ->select('danh_gias.*', 'khach_hangs.ho_va_ten', 'khach_hangs.avatar')
            ->orderByDesc('danh_gias.id')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data,
        ]);
    }
    /**
     * Lấy toàn bộ danh sách đánh giá cho Admin quản lý
     */
    public function getDataAdmin()
    {

        $user = Auth::guard('sanctum')->user();


        // Nếu không phải Master Admin (is_master != 1) thì mới check quyền chi tiết
        if ($user->is_master != 1) {
            $id_chuc_nang = 2;
            $id_chuc_vu   = $user->id_chuc_vu;


            $check = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)
                ->where('id_chuc_nang', $id_chuc_nang)
                ->first();


            if (!$check) {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        // 3. Nếu có quyền (hoặc là Master), thực hiện lấy dữ liệu
        $data = DanhGia::join('tours', 'danh_gias.id_tour', 'tours.id')
            ->join('khach_hangs', 'danh_gias.id_khach_hang', 'khach_hangs.id')
            ->select('danh_gias.*', 'tours.ten_tour', 'khach_hangs.ho_va_ten')
            ->orderByDesc('danh_gias.id')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data,
        ]);
    }

    /**
     * Thay đổi trạng thái ẩn/hiện của đánh giá
     */
    public function doiTrangThai(Request $request)
    {
        // Tìm đánh giá dựa trên ID gửi từ Admin
        $danhGia = DanhGia::find($request->id);

        if ($danhGia) {
            // Đảo ngược trạng thái: nếu đang 1 (hiện) thì thành 0 (ẩn) và ngược lại
            $danhGia->tinh_trang = $danhGia->tinh_trang == 1 ? 0 : 1;
            $danhGia->save();

            return response()->json([
                'status'  => true,
                'message' => 'Cập nhật trạng thái đánh giá thành công!'
            ]);
        }

        return response()->json(['status' => false, 'message' => 'Đánh giá không tồn tại!']);
    }

    /**
     * Admin thực hiện xóa đánh giá vĩnh viễn
     */
    public function xoaDanhGia(Request $request)
    {
        // Thực hiện xóa cứng dữ liệu khỏi database
        DanhGia::where('id', $request->id)->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Đã xóa đánh giá vĩnh viễn thành công!'
        ]);
    }
    public function getDataClientBinhLuan($tour_id = null)
    {
        $tour_id = request()->route('tour_id') ?? $tour_id;
        $id = (int)$tour_id;
        $data = DB::table('danh_gias')
            ->where('danh_gias.id_tour', $id)
            ->where('danh_gias.tinh_trang', 1)
            ->join('khach_hangs', 'khach_hangs.id', '=', 'danh_gias.id_khach_hang')
            ->select('danh_gias.*', 'khach_hangs.ho_va_ten', 'khach_hangs.avatar')
            ->orderBy('danh_gias.created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
