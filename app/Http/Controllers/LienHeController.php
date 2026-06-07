<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LienHeController extends Controller
{
    // API CHO ADMIN: Lấy danh sách liên hệ
    public function getData()
    {
        $danhSachLienHe = LienHe::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'data' => $danhSachLienHe
        ], 200);
    }

    // API CHO ADMIN: Cập nhật trạng thái
    public function changeStatus(Request $request)
    {
        $lienHe = LienHe::find($request->id);
        if($lienHe) {
            $lienHe->trang_thai = $lienHe->trang_thai == 0 ? 1 : 0;
            $lienHe->save();

            return response()->json([
                'status' => true,
                'message' => 'Đã cập nhật trạng thái xử lý!'
            ]);
        }
        return response()->json(['status' => false, 'message' => 'Không tìm thấy liên hệ!']);
    }

    // API CHO ADMIN: Xóa liên hệ
    public function destroy(Request $request)
    {
        $lienHe = LienHe::find($request->id);
        if($lienHe) {
            $lienHe->delete();
            return response()->json([
                'status' => true,
                'message' => 'Đã xóa liên hệ thành công!'
            ]);
        }
        return response()->json(['status' => false, 'message' => 'Không tìm thấy liên hệ!']);
    }

    // API CHO CLIENT: Khách hàng gửi liên hệ
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ho_ten' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'noi_dung' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Vui lòng kiểm tra lại thông tin nhập vào!',
            ]);
        }

        try {
            LienHe::create([
                'id_khach_hang' => $request->id_khach_hang ?? null, // Nếu có truyền từ FE lên
                'ho_ten' => $request->ho_ten,
                'email' => $request->email,
                'so_dien_thoai' => $request->so_dien_thoai ?? '',
                'noi_dung' => $request->noi_dung,
                'trang_thai' => 0
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Gửi thông tin liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra, vui lòng thử lại sau!',
            ]);
        }
    }
}
