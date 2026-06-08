<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    private function checkPermission($id_chuc_nang)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $check = PhanQuyen::where('id_chuc_vu', $user->id_chuc_vu)
                              ->where('id_chuc_nang', $id_chuc_nang)
                              ->first();
            if (!$check) {
                return false;
            }
        }
        return true;
    }

    public function getData()
    {
        if (!$this->checkPermission(15)) {
            return response()->json(['status' => 0, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        // Đổi từ sắp xếp created_at sang thu_tu theo thứ tự tăng dần (asc)
        $data = Slide::orderBy('thu_tu', 'asc')->get();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu slide thành công',
            'data'    => $data,
        ]);
    }

    public function addData(Request $request)
    {
        if (!$this->checkPermission(15)) {
            return response()->json(['status' => 0, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        $hinh_anh = $request->hinh_anh_url;

        if ($request->hasFile('hinh_anh_file')) {
            $file = $request->file('hinh_anh_file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slides'), $fileName);
            $hinh_anh = '/uploads/slides/' . $fileName;
        }

        Slide::create([
            'tieu_de'    => $request->tieu_de,
            'hinh_anh'   => $hinh_anh,
            'tinh_trang' => $request->tinh_trang ?? 1,
            'thu_tu'     => $request->thu_tu ?? 0
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm slide thành công'
        ]);
    }

    public function update(Request $request)
    {
        if (!$this->checkPermission(15)) {
            return response()->json(['status' => 0, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        $slide = Slide::find($request->id);
        if (!$slide) {
            return response()->json(['status' => false, 'message' => 'Slide không tồn tại']);
        }

        $hinh_anh = $request->hinh_anh_url ?? $slide->hinh_anh;

        if ($request->hasFile('hinh_anh_file')) {
            if (File::exists(public_path($slide->hinh_anh))) {
                File::delete(public_path($slide->hinh_anh));
            }

            $file = $request->file('hinh_anh_file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slides'), $fileName);
            $hinh_anh = '/uploads/slides/' . $fileName;
        }

        $slide->update([
            'tieu_de'    => $request->tieu_de,
            'hinh_anh'   => $hinh_anh,
            'tinh_trang' => $request->tinh_trang,
            'thu_tu'     => $request->thu_tu ?? 0
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật slide thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        if (!$this->checkPermission(15)) {
            return response()->json(['status' => 0, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        $slide = Slide::find($request->id);
        if ($slide) {
            $slide->tinh_trang = $slide->tinh_trang == 1 ? 0 : 1;
            $slide->save();
            return response()->json([
                'status' => true,
                'message' => 'Đổi trạng thái hiển thị thành công'
            ]);
        }
        return response()->json(['status' => false, 'message' => 'Không tìm thấy slide']);
    }

    public function destroy(Request $request)
    {
        if (!$this->checkPermission(15)) {
            return response()->json(['status' => 0, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        $slide = Slide::find($request->id);
        if ($slide) {
            if (File::exists(public_path($slide->hinh_anh))) {
                File::delete(public_path($slide->hinh_anh));
            }
            $slide->delete();
            return response()->json([
                'status' => true,
                'message' => 'Xóa slide thành công'
            ]);
        }

        return response()->json(['status' => false, 'message' => 'Không tìm thấy slide']);
    }
}
