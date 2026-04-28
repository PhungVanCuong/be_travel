<?php

namespace App\Http\Controllers;
use App\Models\BaiViet;
use App\Models\PhanQuyen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 11;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $data = BaiViet::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu bài viết thành công',
            'data'    => $data,
        ]);
    }
    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 11;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        BaiViet::create([
            'tieu_de'       => $request->tieu_de,
            'mo_ta_ngan'    => $request->mo_ta_ngan,
            'noi_dung'      => $request->noi_dung,
            'hinh_anh'      => $request->hinh_anh,
            'tag'           => $request->tag,
            'tinh_trang'    => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm bài viết thành công',
        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 11;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        BaiViet::where('id', $request->id)->update([
            'tieu_de'       => $request->tieu_de,
            'mo_ta_ngan'    => $request->mo_ta_ngan,
            'noi_dung'      => $request->noi_dung,
            'hinh_anh'      => $request->hinh_anh,
            'tag'           => $request->tag,
            'tinh_trang'    => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật bài viết thành công',
        ]);
    }
    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
             11;$id_chuc_nang =
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        BaiViet::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa bài viết thành công',
        ]);
    }

    /**
     * API CLIENT: Lấy chi tiết bài viết và bài viết liên quan
     */
    public function chiTietBaiVietClient(Request $request)
    {
        // 1. Tìm bài viết theo ID
        $baiViet = BaiViet::where('id', $request->id)
                          ->where('tinh_trang', 1) // Chỉ lấy bài đang hiển thị
                          ->first();

        if (!$baiViet) {
            return response()->json([
                'status'  => false,
                'message' => 'Bài viết không tồn tại hoặc đã bị gỡ.'
            ], 404);
        }

        // 2. Lấy 3 bài viết liên quan (Mới nhất và Khác ID bài hiện tại)
        $baiVietLienQuan = BaiViet::where('id', '!=', $request->id)
                                  ->where('tinh_trang', 1)
                                  ->orderBy('created_at', 'desc')
                                  ->limit(3)
                                  ->get();

        return response()->json([
            'status'             => true,
            'message'            => 'Lấy chi tiết bài viết thành công.',
            'data'               => $baiViet,
            'data_bai_viet_khac' => $baiVietLienQuan
        ]);
    }
}
