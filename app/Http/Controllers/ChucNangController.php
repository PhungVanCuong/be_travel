<?php

namespace App\Http\Controllers;
use App\Models\ChucNang;
use App\Models\PhanQuyen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChucNangController extends Controller
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

        $data = ChucNang::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu chức năng thành công',
            'data'    => $data,
        ]);
    }
}
