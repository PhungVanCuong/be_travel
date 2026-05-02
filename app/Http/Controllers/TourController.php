<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\PhanQuyen;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function getData()
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

        $data = Tour::with('quoc_gia')->get();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu tour thành công',
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

        Tour::create([
            'ten_tour' => $request->ten_tour,
            'mo_ta' => $request->mo_ta,
            'gia' => $request->gia,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'so_nguoi_toi_da' => $request->so_nguoi_toi_da,
            'diem_don' => $request->diem_don,
            'diem_tra' => $request->diem_tra,
            'tinh_trang' => $request->tinh_trang,
            'hinh_anh' => $request->hinh_anh,
            'id_quoc_gia' => $request->id_quoc_gia
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm tour thành công'
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

        Tour::where('id', $request->id)->update([
            'ten_tour' => $request->ten_tour,
            'mo_ta' => $request->mo_ta,
            'gia' => $request->gia,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'so_nguoi_toi_da' => $request->so_nguoi_toi_da,
            'diem_don' => $request->diem_don,
            'diem_tra' => $request->diem_tra,
            'tinh_trang' => $request->tinh_trang,
            'hinh_anh' => $request->hinh_anh,
            'id_quoc_gia' => $request->id_quoc_gia
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật tour thành công'
        ]);
    }

    public function changeStatus(Request $request)
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

        Tour::where('id', $request->id)->update(['tinh_trang' => $request->tinh_trang]);
        return response()->json(['status' => true, 'message' => 'Thay đổi trạng thái tour thành công']);
    }

    public function getDataClient()
    {
        // Kéo thêm data của lịch trình và điểm đến để VueJS check Thành phố
        $data = Tour::where('tinh_trang', 1)
            ->with(['quoc_gia', 'lichTrinhs.diemDen'])
            ->withAvg('danhgias as avg_sao', 'sao_danh_gia')
            ->withCount('danhgias as so_luot_danh_gia')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu tour cho khách hàng thành công',
            'data' => $data
        ]);
    }

    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        // Check quyền
        if ($user->is_master != 1) {
            $id_chuc_nang = 1;
            $id_chuc_vu   = $user->id_chuc_vu;

            $check = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)
                ->where('id_chuc_nang', $id_chuc_nang)
                ->first();

            if (!$check) {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $tour = Tour::find($request->id);

        if (!$tour) {
            return response()->json([
                'status' => false,
                'message' => 'Tour không tồn tại'
            ]);
        }

        $tour->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa tour thành công'
        ]);
    }
    /**
     * CLIENT: Tìm kiếm Tour ĐA CHIỀU (Tên Tour, Quốc Gia, Điểm Đến, Thành Phố)
     */
    public function searchTourClient(Request $request)
    {
        $tu_khoa = trim($request->tu_khoa);

        // Khởi tạo Query mặc định lấy các tour đang hoạt động (tinh_trang = 1)
        $query = Tour::where('tinh_trang', 1)
                     ->with(['quoc_gia', 'lichTrinhs.diemDen'])
                     ->withAvg('danhgias as avg_sao', 'sao_danh_gia')
                     ->withCount('danhgias as so_luot_danh_gia');

        if (!empty($tu_khoa)) {
            $tu_khoa_lower = mb_strtolower($tu_khoa, 'UTF-8');

            $query->where(function($q) use ($tu_khoa_lower) {
                // 1. Tìm kiếm trong bảng TOURS (Tên tour, Điểm đón, Điểm trả)
                $q->where('ten_tour', 'like', '%' . $tu_khoa_lower . '%')
                  ->orWhere('diem_tra', 'like', '%' . $tu_khoa_lower . '%')
                  ->orWhere('diem_don', 'like', '%' . $tu_khoa_lower . '%')

                // 2. Tìm kiếm trong bảng QUỐC GIA (Xuyên qua relationship 'quoc_gia')
                  ->orWhereHas('quoc_gia', function ($qQG) use ($tu_khoa_lower) {
                      $qQG->where('ten_quoc_gia', 'like', '%' . $tu_khoa_lower . '%');
                  })

                // 3. Tìm kiếm trong bảng ĐIỂM ĐẾN (Xuyên qua relationship 'lichTrinhs' rồi tới 'diemDen')
                  ->orWhereHas('lichTrinhs.diemDen', function ($qDD) use ($tu_khoa_lower) {
                      // Tìm theo cả Tên điểm đến VÀ Thành phố
                      $qDD->where('ten_diem_den', 'like', '%' . $tu_khoa_lower . '%')
                          ->orWhere('thanh_pho', 'like', '%' . $tu_khoa_lower . '%');
                  });
            });

            // LOGIC SẮP XẾP ƯU TIÊN:
            // Nếu từ khóa xuất hiện ngay trong 'ten_tour' thì ưu tiên đẩy lên đầu danh sách!
            // Các tour khớp điểm đến hoặc quốc gia sẽ nằm ở phía dưới.
            $query->orderByRaw("CASE WHEN ten_tour LIKE ? THEN 1 ELSE 2 END", ['%' . $tu_khoa_lower . '%']);
        }

        // Sắp xếp thêm theo thời gian tạo mới nhất
        $data = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu tìm kiếm thành công',
            'data'    => $data
        ]);
    }
}
