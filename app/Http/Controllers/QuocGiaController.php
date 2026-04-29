<?php

namespace App\Http\Controllers;
use App\Models\PhanQuyen;
use Illuminate\Support\Facades\Auth;
use App\Models\QuocGia;
use Illuminate\Http\Request;

class QuocGiaController extends Controller
{
    public function getData()
    {
        $data = QuocGia::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu quốc gia thành công',
            'data' => $data
        ]);
    }
    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 1;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }
        QuocGia::create([
            'ten_quoc_gia' => $request->ten_quoc_gia,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm quốc gia thành công',
        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 1;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }
        QuocGia::where('id', $request->id)->update([
            'ten_quoc_gia' => $request->ten_quoc_gia,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật quốc gia thành công',
        ]);
    }
    public function destroy(Request $request){
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 1;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }
        QuocGia::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa quốc gia thành công',
        ]);
    }
}
