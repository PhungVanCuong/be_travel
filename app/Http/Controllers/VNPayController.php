<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\Ve;
use App\Models\VNPay;
use Illuminate\Support\Facades\DB;
use App\Models\PhanQuyen;
use Illuminate\Support\Facades\Auth;

class VNPayController extends Controller
{
    /**
     * 1. TẠO LINK THANH TOÁN
     */
    public function createPayment(Request $request)
    {
        $hoaDon = HoaDon::find($request->id_hoa_don);
        if (!$hoaDon) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }

        $vnp_TmnCode = 'ORAWIP6X'; // Thay đổi mã website của bạn tại đây
        $vnp_HashSecret = 'KCPUCG0YL3BRPCFNH9QSDFKS06ET99H8'; // Thay đổi secret key của bạn tại đây
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // URL thanh toán của VNPay
        $vnp_Returnurl = "http://localhost:5173/Ket-qua-thanh-toan"; // Thay đổi URL trả về sau khi thanh toán thành công

        $vnp_TxnRef = $hoaDon->id . '_' . time();
        $vnp_OrderInfo = 'Thanh_toan_tour_ID_' . $hoaDon->id;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = round($hoaDon->tong_tien * 100);
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);

        $query = "";
        $hashdata = "";

        foreach ($inputData as $key => $value) {
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
            $hashdata .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        // ✅ FIX QUAN TRỌNG
        $query = rtrim($query, '&');
        $hashdata = rtrim($hashdata, '&');

        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

        $vnp_Url .= "?" . $query . '&vnp_SecureHash=' . $vnpSecureHash;

        return response()->json([
            'status' => true,
            'message' => 'Tạo link thanh toán thành công',
            'data' => $vnp_Url
        ]);
    }

    /**
     * 2. RETURN (Frontend check)
     */
    public function vnpayReturn(Request $request)
    {
        $vnp_SecureHash = $request->vnp_SecureHash;
        $inputData = [];

        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);

        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');

        $vnp_HashSecret = 'KCPUCG0YL3BRPCFNH9QSDFKS06ET99H8';
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // Chuẩn bị link full để lưu vào Database
        $fullUrl = $request->fullUrl();

        // Tách lấy ID Hóa Đơn từ vnp_TxnRef (VD: 1_1777299139 -> Lấy số 1)
        $hoaDonId = isset($request->vnp_TxnRef) ? explode('_', $request->vnp_TxnRef)[0] : null;
        $idKhachHang = 0; // Mặc định nếu không tìm thấy
        $hoaDonData = null; // Biến lưu toàn bộ thông tin hóa đơn để trả về Frontend

        if ($hoaDonId) {
            $hoaDon = HoaDon::find($hoaDonId);
            if ($hoaDon) {
                $idKhachHang = $hoaDon->id_khach_hang;
                $hoaDonData = $hoaDon;
            }
        }

        if ($secureHash === $vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {
                // LƯU LOG: Thành công (tinh_trang = 2 theo DB mới của bạn)
                VNPay::create([
                    'id_khach_hang' => $idKhachHang,
                    'id_hoa_don'    => $hoaDonId, // Thêm id_hoa_don
                    'link_data'     => $fullUrl,
                    'tinh_trang'    => 2
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Giao dịch thành công',
                    'data' => $hoaDonData // Trả data hóa đơn về cho Frontend
                ]);
            } else {
                // LƯU LOG: Thất bại (tinh_trang = 1 theo DB mới của bạn)
                VNPay::create([
                    'id_khach_hang' => $idKhachHang,
                    'id_hoa_don'    => $hoaDonId, // Thêm id_hoa_don
                    'link_data'     => $fullUrl,
                    'tinh_trang'    => 1
                ]);

                return response()->json(['status' => false, 'message' => 'Giao dịch thất bại']);
            }
        }

        // LƯU LOG: Sai chữ ký
        VNPay::create([
            'id_khach_hang' => $idKhachHang,
            'id_hoa_don'    => $hoaDonId, // Thêm id_hoa_don
            'link_data'     => $fullUrl,
            'tinh_trang'    => 0
        ]);

        return response()->json(['status' => false, 'message' => 'Sai chữ ký']);
    }

    /**
     * 3. IPN (Cập nhật ngầm và Lưu Log)
     */
    public function vnpayIpn(Request $request)
    {
        $inputData = [];

        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);

        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');

        $vnp_HashSecret = 'KCPUCG0YL3BRPCFNH9QSDFKS06ET99H8';
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash !== $vnp_SecureHash) {
            return response()->json(['RspCode' => '97', 'Message' => 'Invalid signature']);
        }

        $hoaDonId = explode('_', $inputData['vnp_TxnRef'])[0];
        $hoaDon = HoaDon::find($hoaDonId);

        if (!$hoaDon) {
            return response()->json(['RspCode' => '01', 'Message' => 'Order not found']);
        }

        if (round($hoaDon->tong_tien * 100) != $inputData['vnp_Amount']) {
            return response()->json(['RspCode' => '04', 'Message' => 'Invalid amount']);
        }

        if ($hoaDon->trang_thai != HoaDon::CHUA_THANH_TOAN) {
            return response()->json(['RspCode' => '02', 'Message' => 'Already confirmed']);
        }

        // --- BẮT ĐẦU LƯU LOG IPN VÀO BẢNG v_n_pays ---
        $fullIpnUrl = $request->fullUrl();

        DB::beginTransaction();
        try {
            if ($inputData['vnp_ResponseCode'] == '00') {
                $hoaDon->trang_thai = HoaDon::DA_THANH_TOAN;
                Ve::where('id_hoa_don', $hoaDon->id)->update(['tinh_trang' => Ve::DA_THANH_TOAN]);

                // Ghi log thành công (2: Thành công)
                VNPay::create([
                    'id_khach_hang' => $hoaDon->id_khach_hang,
                    'id_hoa_don'    => $hoaDon->id, // Thêm id_hoa_don
                    'link_data'     => "IPN_CALL: " . $fullIpnUrl,
                    'tinh_trang'    => 2
                ]);
            } else {
                $hoaDon->trang_thai = HoaDon::DA_HUY;
                Ve::where('id_hoa_don', $hoaDon->id)->update(['tinh_trang' => Ve::DA_HUY]);

                // Ghi log thất bại (1: Thất bại)
                VNPay::create([
                    'id_khach_hang' => $hoaDon->id_khach_hang,
                    'id_hoa_don'    => $hoaDon->id, // Thêm id_hoa_don
                    'link_data'     => "IPN_CALL: " . $fullIpnUrl,
                    'tinh_trang'    => 1
                ]);
            }

            $hoaDon->save();
            DB::commit();

            return response()->json(['RspCode' => '00', 'Message' => 'Confirm Success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['RspCode' => '99', 'Message' => 'Error']);
        }
    }

    /**
     * Lấy danh sách VNPay
     */
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 7;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $data = VNPay::join('khach_hangs', 'v_n_pays.id_khach_hang', '=', 'khach_hangs.id')
            ->select('v_n_pays.*', 'khach_hangs.ho_va_ten as ten_khach_hang')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu cấu hình VNPay thành công',
            'data' => $data
        ]);
    }

    /**
     * Thêm mới dữ liệu VNPay
     */
    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 7;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        VNPay::create([
            'id_khach_hang' => $request->id_khach_hang,
            'id_hoa_don'    => $request->id_hoa_don, // Thêm id_hoa_don
            'link_data'     => $request->link_data,
            'tinh_trang'    => $request->tinh_trang ?? 0,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm dữ liệu VNPay thành công'
        ]);
    }

    /**
     * Cập nhật dữ liệu VNPay
     */
    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 7;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $vnpay = VNPay::find($request->id);

        if(!$vnpay) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy dữ liệu VNPay'
            ]);
        }

        $vnpay->update([
            'id_khach_hang' => $request->id_khach_hang,
            'id_hoa_don'    => $request->id_hoa_don, // Thêm id_hoa_don
            'link_data'     => $request->link_data,
            'tinh_trang'    => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật dữ liệu VNPay thành công'
        ]);
    }

    /**
     * Xóa dữ liệu VNPay
     */
    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 7;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $vnpay = VNPay::find($request->id);

        if ($vnpay) {
            $vnpay->delete();
            return response()->json([
                'status' => true,
                'message' => 'Xóa dữ liệu VNPay thành công'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Dữ liệu không tồn tại hoặc đã bị xóa.'
        ]);
    }

    /**
     * Thay đổi trạng thái VNPay
     */
    public function changeStatus(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user->is_master != 1) {
            $id_chuc_nang = 7;
            $id_chuc_vu   = $user->id_chuc_vu;
            $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
            if (!$check) {
                return response()->json([
                    'status'    =>  0,
                    'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
                ]);
            }
        }

        $vnpay = VNPay::find($request->id);

        if ($vnpay) {
            $vnpay->update(['tinh_trang' => $request->tinh_trang]);
            return response()->json([
                'status' => true,
                'message' => 'Thay đổi trạng thái VNPay thành công'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Dữ liệu không tồn tại.'
        ]);
    }
}
