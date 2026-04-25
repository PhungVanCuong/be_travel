<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\ChiTietTourController;
use App\Http\Controllers\VeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ĐĂNG NHẬP ADMIN
Route::prefix('')->group(function () {
    // api admin đăng nhập
    Route::post('/admin/dang-nhap', [NhanVienController::class, 'dangNhap']);
    Route::get('/admin/check-token', [NhanVienController::class, 'checkToken']);
});

// ADMIN ROUTES (Cần xác thực Admin)
Route::prefix('')->group(function () {
    // CHECK TOKEN ADMIN
    Route::post('/admin/dang-nhap', [NhanVienController::class, 'dangNhap']);
    Route::get('/admin/check-token', [NhanVienController::class, 'checkToken']);
    Route::group(['prefix' => '/admin'], function () {
        
        // api admin nhân viên
        Route::get('/nhan-vien/get-data', [NhanVienController::class, 'getData']);
        Route::post('/nhan-vien/add-data', [NhanVienController::class, 'addData']);
        Route::post('/nhan-vien/update', [NhanVienController::class, 'update']);
        Route::post('/nhan-vien/destroy', [NhanVienController::class, 'destroy']);
        Route::post('/nhan-vien/change-status', [NhanVienController::class, 'changeStatus']);

        // api admin khách hàng
        Route::get('/khach-hang/get-data', [KhachHangController::class, 'getData']);
        Route::post('/khach-hang/add-data', [KhachHangController::class, 'addData']);
        Route::post('/khach-hang/update', [KhachHangController::class, 'update']);
        Route::post('/khach-hang/destroy', [KhachHangController::class, 'destroy']);

        // api admin chức vụ
        Route::get('/chuc-vu/get-data', [ChucVuController::class, 'getData']);
        Route::post('/chuc-vu/add-data', [ChucVuController::class, 'addData']);
        Route::post('/chuc-vu/update', [ChucVuController::class, 'update']);
        Route::post('/chuc-vu/destroy', [ChucVuController::class, 'destroy']);

        // api admin tour & vé
        Route::get('/tour/get-data', [TourController::class, 'getData']);
        Route::get('/ve/get-data', [VeController::class, 'getData']);

    });
});

// CLIENT ROUTES (Public - Không cần đăng nhập)
Route::prefix('')->group(function () {
    // api trang chủ & chi tiết tour
    Route::get('/client/trang-chu/get-data', [TrangChuController::class, 'getData']);
    Route::post('/client/chi-tiet-tour/get-data', [ChiTietTourController::class, 'getData']);

    // api client dang ky và đăng nhập
    Route::post('/client/dang-nhap', [KhachHangController::class, 'dangNhap']); // chưa làm
    Route::post('/client/dang-ky', [KhachHangController::class, 'dangKy']); // chưa làm
    Route::get('/client/check-token', [KhachHangController::class, 'checkToken']); // chưa làm

    // api quên mật khẩu
    Route::post('/client/quen-mat-khau', [KhachHangController::class, 'quenMK']); // chưa làm
    Route::post('/client/lay-lai-mat-khau', [KhachHangController::class, 'layLaiMK']); // chưa làm
});

// CLIENT ROUTES (Protected - Cần đăng nhập)
Route::prefix('')->group(function () {
    Route::group(['prefix' => '/client'], function () {
        // Route::get('profile/get-data', [KhachHangController::class, 'getProfile']);
        // Route::post('profile/update', [KhachHangController::class, 'updateProfile']);
    });
});
