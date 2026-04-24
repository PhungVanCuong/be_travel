<?php

namespace App\Http\Controllers;
use App\Models\Ve;
use Illuminate\Http\Request;

class VeController extends Controller
{
    public function getData()
{
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
}
