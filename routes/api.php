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
Route::post('/nhan-vien/add-data', [NhanVienController::class, 'addData']);
route::post('/nhan-vien/update', [NhanVienController::class, 'update']);
route::post('/nhan-vien/destroy', [NhanVienController::class, 'destroy']);
Route::get('/khach-hang/get-data', [KhachHangController::class, 'getData']);
Route::post('/khach-hang/add-data', [KhachHangController::class, 'addData']);
Route::post('/khach-hang/update', [KhachHangController::class, 'update']);
Route::post('/khach-hang/destroy', [KhachHangController::class, 'destroy']);
Route::get('/chuc-vu/get-data', [ChucVuController::class, 'getData']);
Route::post('/chuc-vu/add-data', [ChucVuController::class, 'addData']);
Route::post('/chuc-vu/update', [ChucVuController::class, 'update']);
Route::post('/chuc-vu/destroy', [ChucVuController::class, 'destroy']);



