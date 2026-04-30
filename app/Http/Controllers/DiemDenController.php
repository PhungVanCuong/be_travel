<?php

namespace App\Http\Controllers;
use App\Models\DiemDen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PhanQuyen;

class DiemDenController extends Controller
{
    public function getData()
    {
        $data = DiemDen::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu điểm đến thành công',
            'data'    => $data,
        ]);
    }
    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 3;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        DiemDen::create([
            'ten_diem_den'         => $request->ten_diem_den,
            'mo_ta'     => $request->mo_ta,
            'thanh_pho'      => $request->thanh_pho,
            'hinh_anh' => $request->hinh_anh,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm điểm đến thành công'
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
        DiemDen::where('id', $request->id)->update([
            'ten_diem_den' => $request->ten_diem_den,
            'mo_ta' => $request->mo_ta,
            'thanh_pho' => $request->thanh_pho,
            'hinh_anh' => $request->hinh_anh,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật điểm đến thành công',
        ]);
    }
    public function destroy(Request $request)
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
        DiemDen::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa điểm đến thành công',
        ]);
    }
    
}
