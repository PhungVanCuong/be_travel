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
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\DanhGiaController;
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
        Route::post('/khach-hang/change-status', [KhachHangController::class, 'changeStatus']);

        // api admin chức vụ
        Route::get('/chuc-vu/get-data', [ChucVuController::class, 'getData']);
        Route::post('/chuc-vu/add-data', [ChucVuController::class, 'addData']);
        Route::post('/chuc-vu/update', [ChucVuController::class, 'update']);
        Route::post('/chuc-vu/destroy', [ChucVuController::class, 'destroy']);
        Route::post('/chuc-vu/change-status', [ChucVuController::class, 'changeStatus']);
        Route::post('/chuc-vu/search', [ChucVuController::class, 'search']);

        // api admin tour
        Route::get('/tour/get-data', [TourController::class, 'getData']);
        Route::post('/tour/add-data', [TourController::class, 'addData']);
        Route::post('/tour/update', [TourController::class, 'update']);
        Route::post('/tour/destroy', [TourController::class, 'destroy']);
        Route::post('/tour/change-status', [TourController::class, 'changeStatus']);

        // api admin vé
        Route::get('/ve/get-data', [VeController::class, 'getData']);
        Route::post('/ve/add-data', [VeController::class, 'addData']);
        Route::post('/ve/update/{id}', [VeController::class, 'update']);
        Route::post('/ve/delete', [VeController::class, 'destroy']);
        Route::post('/ve/change-status', [VeController::class, 'changeStatus']);

        // đổi mật khẩu nhân viên
        Route::post('/doi-mat-khau', [NhanVienController::class, 'doiMatKhau']);
        // profile nhân viên
        Route::get('/profile/get-data', [NhanVienController::class, 'getProfile']);
        Route::post('/profile/update', [NhanVienController::class, 'updateProfile']);
        Route::post('/dang-xuat', [NhanVienController::class, 'dangXuat']);
        Route::post('/dang-xuat-all', [NhanVienController::class, 'dangXuatAll']);
        //Phân quyền
        Route::post('phan-quyen/chi-tiet-phan-quyen/add-data', [PhanQuyenController::class, 'addData']);
        Route::post('phan-quyen/chi-tiet-phan-quyen/delete', [PhanQuyenController::class, 'destroy']);
        Route::post('phan-quyen/chi-tiet-phan-quyen/data', [PhanQuyenController::class, 'getChiTietPhanQuyen']);
        // Đánh giá
        Route::get('/danh-gia/get-data', [DanhGiaController::class, 'getDataAdmin']);
        Route::post('/danh-gia/doi-tinh-trang', [DanhGiaController::class, 'doiTrangThai']);
        Route::post('/danh-gia/delete', [DanhGiaController::class, 'xoaDanhGia']);
    });
});

// CLIENT ROUTES (Public - Không cần đăng nhập)
Route::prefix('')->group(function () {
    // api trang chủ & chi tiết tour
    Route::get('/client/trang-chu/get-data', [TrangChuController::class, 'getData']);

    // api client dang ky và đăng nhập
    Route::post('/client/dang-nhap', [KhachHangController::class, 'dangNhap']);
    Route::post('/client/dang-ky', [KhachHangController::class, 'dangKy']);
    Route::get('/client/check-token', [KhachHangController::class, 'checkToken']);

    // api quên mật khẩu
    Route::post('/client/quen-mat-khau', [KhachHangController::class, 'quenMK']);
    Route::post('/client/lay-lai-mat-khau', [KhachHangController::class, 'layLaiMK']);
});

// CLIENT ROUTES (Protected - Cần đăng nhập)
Route::prefix('')->group(function () {
    Route::group(['prefix' => '/client'], function () {
        // profile khach hang
        Route::get('/profile/get-data', [KhachHangController::class, 'getProfile']);
        Route::post('/profile/update', [KhachHangController::class, 'updateProfile']);
        // đổi mật khẩu khách hàng
        Route::post('/doi-mat-khau', [KhachHangController::class, 'doiMatKhau']);
        Route::post('/dang-xuat', [KhachHangController::class, 'dangXuat']);
        Route::post('/dang-xuat-all', [KhachHangController::class, 'dangXuatAll']);

        // api chi tiết tour
        Route::get('/tour/get-data', [TourController::class, 'getData']);
        Route::post('/chi-tiet-tour/get-data', [ChiTietTourController::class, 'getData']);
        //api đánh giá
        Route::post('/danh-gia/gui-danh-gia', [DanhGiaController::class, 'guiDanhGia']);
        Route::get('/danh-gia/get-danh-gia/{id}', [DanhGiaController::class, 'getDataClientBinhLuan']);
    });
});
