<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\Ve;
use Illuminate\Support\Facades\DB;

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

        if ($secureHash === $vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {
                return response()->json(['status' => true, 'message' => 'Giao dịch thành công']);
            } else {
                return response()->json(['status' => false, 'message' => 'Giao dịch thất bại']);
            }
        }

        return response()->json(['status' => false, 'message' => 'Sai chữ ký']);
    }

    /**
     * 3. IPN
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

        DB::beginTransaction();
        try {
            if ($inputData['vnp_ResponseCode'] == '00') {
                $hoaDon->trang_thai = HoaDon::DA_THANH_TOAN;
                Ve::where('id_hoa_don', $hoaDon->id)->update(['tinh_trang' => Ve::DA_THANH_TOAN]);
            } else {
                $hoaDon->trang_thai = HoaDon::DA_HUY;
                Ve::where('id_hoa_don', $hoaDon->id)->update(['tinh_trang' => Ve::DA_HUY]);
            }

            $hoaDon->save();
            DB::commit();

            return response()->json(['RspCode' => '00', 'Message' => 'Confirm Success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['RspCode' => '99', 'Message' => 'Error']);
        }
    }
}
