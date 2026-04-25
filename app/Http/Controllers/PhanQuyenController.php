<?php

namespace App\Http\Controllers;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    public function addData(Request $request)
    {
        try {
            $phanQuyen = PhanQuyen::firstOrCreate([
                'id_chuc_vu'   => $request->id_chuc_vu,
                'id_chuc_nang' => $request->id_chuc_nang
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Đã cấp quyền thành công!',
                'data'    => $phanQuyen
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    public function destroy(Request $request)
    {
        try {
            $deleted = PhanQuyen::where('id_chuc_vu', $request->id_chuc_vu)
                ->where('id_chuc_nang', $request->id_chuc_nang)
                ->delete();

            if ($deleted) {
                return response()->json([
                    'status'  => true,
                    'message' => 'Đã xóa quyền thành công!'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Không tìm thấy phân quyền để xóa!'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    public function getChiTietPhanQuyen(Request $request)
    {
        try {
            $data = PhanQuyen::where('phan_quyens.id_chuc_vu', $request->id)
                ->join('chuc_vus', 'chuc_vus.id', 'phan_quyens.id_chuc_vu')
                ->join('chuc_nangs', 'chuc_nangs.id', 'phan_quyens.id_chuc_nang')
                ->select(
                    'phan_quyens.*',
                    'chuc_nangs.ten_chuc_nang',
                    'chuc_vus.ten_chuc_vu',
                )
                ->get();

            return response()->json([
                'status' => true,
                'data'   => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'data'    => []
            ], 500);
        }
    }
}
