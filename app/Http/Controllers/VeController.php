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
        // Nếu là master admin thì bỏ qua kiểm tra quyền
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

        Ve::create([
            'ma_ve'             => $request->ma_ve,
            'gia_ve'            => $request->gia_ve,
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
    public function update(Request $request, $id)
    {
        $user = Auth::guard('sanctum')->user();
        // Nếu là master admin thì bỏ qua kiểm tra quyền
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

        Ve::where('id', $id)->update([
            'ma_ve'             => $request->ma_ve,
            'gia_ve'            => $request->gia_ve,
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
        // Nếu là master admin thì bỏ qua kiểm tra quyền
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
        // Nếu là master admin thì bỏ qua kiểm tra quyền
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
}
