<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\ChucVuController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/nhan-vien/get-data', [NhanVienController::class, 'getData']);
Route::get('/khach-hang/get-data', [KhachHangController::class, 'getData']);
Route::get('/chuc-vu/get-data', [ChucVuController::class, 'getData']);

