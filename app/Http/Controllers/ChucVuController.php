<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVu;
class ChucVuController extends Controller
{
    public function getData()
    {
        $data = ChucVu::all();
        return response()->json([
            'status'  => true,
            'message' => 'Lấy dữ liệu chức vụ thành công',
            'data'    => $data,
        ]);
    }
}
