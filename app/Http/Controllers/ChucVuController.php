<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChucVuController extends Controller
{
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 16;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $data = ChucVu::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu chức vụ thành công',
            'data'    => $data,
        ]);
    }

    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 16;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        ChucVu::create([
            'ten_chuc_vu' => $request->ten_chuc_vu,
            'tinh_trang'  => $request->tinh_trang
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm chức vụ thành công'
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 16;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        ChucVu::where('id', $request->id)->update([
            'ten_chuc_vu' => $request->ten_chuc_vu,
            'tinh_trang'  => $request->tinh_trang
        ]);
        return response()->json([
            'status'    => true,
             'message'   => 'Cập nhật chức vụ ' . $request->ten_chuc_vu . ' thành công'
        ]);
    }

    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1 && $user->id_chuc_vu != 1) {
            $id_chuc_nang = 16;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        ChucVu::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa chức vụ thành công'
        ]);
    }


    public function changeStatus(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 16;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $chucVu = ChucVu::where('id', $request->id)->first();

        $chucVu->tinh_trang = !$chucVu->tinh_trang;
        $chucVu->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái chức vụ thành công',
        ]);
    }

    public function search(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 16;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $noi_dung = '%' . $request->noi_dung . '%';

        $data = ChucVu::where('ten_chuc_vu', 'like', $noi_dung)->get();

        return response()->json([
            'data' => $data,
            'message' => 'Tìm kiếm chức vụ thành công',
        ]);
    }
}
