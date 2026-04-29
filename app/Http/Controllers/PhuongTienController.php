<?php

namespace App\Http\Controllers;

use App\Models\PhuongTien;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PhuongTienController extends Controller
{
    /**
     * ==================================================
     * DÀNH CHO ADMIN
     * ==================================================
     */

    // Lấy danh sách phương tiện (Admin)
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        // Kiểm tra phân quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 13; // ĐỔI LẠI ID CHỨC NĂNG QUẢN LÝ PHƯƠNG TIỆN CỦA BẠN NẾU CẦN
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $data = PhuongTien::orderBy('id', 'DESC')->get();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu phương tiện thành công',
            'data'    => $data,
        ]);
    }

    // Thêm mới phương tiện
    public function addData(Request $request)
    {
        // ... (Kiểm tra quyền giống getData nếu bạn muốn bảo mật cao hơn ở mọi hàm) ...

        $validator = Validator::make($request->all(), [
            'loai_phuong_tien' => 'required|string|max:255',
            'so_hieu'          => 'required|string|max:255|unique:phuong_tiens,so_hieu',
        ], [
            'loai_phuong_tien.required' => 'Vui lòng nhập loại phương tiện.',
            'so_hieu.required'          => 'Vui lòng nhập số hiệu (Biển số / Mã chuyến bay).',
            'so_hieu.unique'            => 'Số hiệu này đã tồn tại trong hệ thống.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first()
            ]);
        }

        PhuongTien::create([
            'loai_phuong_tien' => $request->loai_phuong_tien,
            'so_hieu'          => $request->so_hieu,
            'mo_ta'            => $request->mo_ta,
            'tinh_trang'       => $request->tinh_trang ?? 'available', // Mặc định là available
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Thêm mới phương tiện thành công!'
        ]);
    }

    // Cập nhật phương tiện
    public function update(Request $request)
    {
        $phuongTien = PhuongTien::find($request->id);

        if ($phuongTien) {
            $validator = Validator::make($request->all(), [
                'loai_phuong_tien' => 'required|string|max:255',
                'so_hieu'          => 'required|string|max:255|unique:phuong_tiens,so_hieu,' . $request->id,
            ], [
                'loai_phuong_tien.required' => 'Vui lòng nhập loại phương tiện.',
                'so_hieu.required'          => 'Vui lòng nhập số hiệu.',
                'so_hieu.unique'            => 'Số hiệu này đã tồn tại trong hệ thống.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()->first()
                ]);
            }

            $phuongTien->update([
                'loai_phuong_tien' => $request->loai_phuong_tien,
                'so_hieu'          => $request->so_hieu,
                'mo_ta'            => $request->mo_ta,
                'tinh_trang'       => $request->tinh_trang,
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Cập nhật phương tiện thành công!'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Phương tiện không tồn tại!'
        ]);
    }

    // Xóa phương tiện
    public function destroy(Request $request)
    {
        $phuongTien = PhuongTien::find($request->id);

        if ($phuongTien) {
            $phuongTien->delete();
            return response()->json([
                'status'  => true,
                'message' => 'Xóa phương tiện thành công!'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Phương tiện không tồn tại hoặc đã bị xóa!'
        ]);
    }

    // Thay đổi trạng thái (Tùy chọn: Từ available sang maintenance và ngược lại)
    public function changeStatus(Request $request)
    {
        $phuongTien = PhuongTien::find($request->id);

        if ($phuongTien) {
            // Nếu frontend gửi thẳng tinh_trang lên
            if($request->has('tinh_trang')) {
                $phuongTien->tinh_trang = $request->tinh_trang;
            } else {
                // Đổi qua đổi lại nhanh giữa 'available' và 'maintenance'
                $phuongTien->tinh_trang = ($phuongTien->tinh_trang == 'available') ? 'maintenance' : 'available';
            }

            $phuongTien->save();

            return response()->json([
                'status'  => true,
                'message' => 'Cập nhật trạng thái thành công!'
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Phương tiện không tồn tại!'
        ]);
    }

    /**
     * ==================================================
     * DÀNH CHO CLIENT / GIAO DIỆN CHUNG
     * ==================================================
     */

    // Lấy danh sách phương tiện đang rảnh (Dùng để đổ dữ liệu vào Select Box lúc tạo Tour / Lịch trình)
    public function getDataClient()
    {
        // Chỉ lấy những phương tiện đang sẵn sàng (available)
        $data = PhuongTien::where('tinh_trang', 'available')->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu phương tiện thành công',
            'data'    => $data,
        ]);
    }
}
