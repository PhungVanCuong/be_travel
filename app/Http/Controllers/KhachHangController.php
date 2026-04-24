<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
class KhachHangController extends Controller
{
    public function getData()
    {
        $data = KhachHang::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu khách hàng thành công',
            'data'    => $data,
        ]);
    }
}
