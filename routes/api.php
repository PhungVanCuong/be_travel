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
Use App\Http\Controllers\SlideController;
use App\Http\Controllers\VNPayController;
use App\Http\Controllers\ThongKeController;
Use App\Http\Controllers\HoaDonController;
Use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\HuongDanVienController;
use App\Http\Controllers\PhuongTienController;
use App\Http\Controllers\HuongDanVienTourController;
use App\Http\Controllers\LichTrinhController;
use App\Http\Controllers\QuocGiaController;
use App\Http\Controllers\DiemDenController;
use App\Http\Controllers\LienHeController;

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
    Route::group(['prefix' => '/admin', 'middleware' => 'auth:sanctum'], function () {

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
        Route::post('/ve/store', [VeController::class, 'addData']);
        Route::post('/ve/update', [VeController::class, 'update']);
        Route::post('/ve/destroy', [VeController::class, 'destroy']);
        Route::post('/ve/change-status', [VeController::class, 'changeStatus']);
        Route::post('/ve/sync-prices', [VeController::class, 'syncPrices']);

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
        //Quốc gia
        Route::get('/quoc-gia/get-data', [QuocGiaController::class, 'getData']);
        Route::post('/quoc-gia/add-data', [QuocGiaController::class, 'addData']);
        Route::post('/quoc-gia/update', [QuocGiaController::class, 'update']);
        Route::post('/quoc-gia/destroy', [QuocGiaController::class, 'destroy']);
        // Đánh giá
        Route::get('/danh-gia/get-data', [DanhGiaController::class, 'getDataAdmin']);
        Route::post('/danh-gia/doi-tinh-trang', [DanhGiaController::class, 'doiTrangThai']);
        Route::post('/danh-gia/delete', [DanhGiaController::class, 'xoaDanhGia']);

        //slide
        Route::get('/slide/get-data', [SlideController::class, 'getData']);
        Route::post('/slide/add-data', [SlideController::class, 'addData']);
        Route::post('/slide/update', [SlideController::class, 'update']);
        Route::post('/slide/delete', [SlideController::class, 'destroy']);

        // API Hóa đơn và in vé
        Route::get('/hoa-don/get-data', [HoaDonController::class, 'getData']);
        Route::post('/hoa-don/update', [HoaDonController::class, 'update']);
        Route::post('/hoa-don/delete', [HoaDonController::class, 'destroy']);
        Route::post('/hoa-don/in-ve', [HoaDonController::class, 'inVeHoaDon']);
        // THÊM DÒNG MỚI NÀY ĐỂ TRA CỨU/QUÉT MÃ HÓA ĐƠN
        Route::post('/hoa-don/quet-ma', [HoaDonController::class, 'quetMaHoaDon']);

        //Bài viết
        Route::get('bai-viet/get-data', [BaiVietController::class, 'getData']);
        Route::post('bai-viet/add-data', [BaiVietController::class, 'addData']);
        Route::post('bai-viet/update', [BaiVietController::class, 'update']);
        Route::post('bai-viet/delete', [BaiVietController::class, 'destroy']);

        // chức năng
        Route::get('chuc-nang/get-data', [ChucNangController::class, 'getData']);

        // Thống kê
        Route::post('/thong-ke/khach-hang-moi', [ThongKeController::class, 'thongKeKHMoi']);
        Route::post('/thong-ke/doanh-thu', [ThongKeController::class, 'thongKeDoanhThu']);
        Route::post('/thong-ke/ve-ban-ra', [ThongKeController::class, 'ThongKeVeBanRa']);
        Route::post('/thong-ke/chi-tieu-khach-hang', [ThongKeController::class, 'thongKeChiTieuKhachHang']);
        Route::post('/thong-ke/tour', [ThongKeController::class, 'thongKeTour']);

        // VNPay
        Route::get('/vnpay-db/get-data', [VNPayController::class, 'getData']);
        Route::post('/vnpay-db/add-data', [VNPayController::class, 'addData']);
        Route::post('/vnpay-db/update', [VNPayController::class, 'update']);
        Route::post('/vnpay-db/destroy', [VNPayController::class, 'destroy']);
        Route::post('/vnpay-db/change-status', [VNPayController::class, 'changeStatus']);

        // api admin phương tiện
        Route::get('/phuong-tien/get-data', [PhuongTienController::class, 'getData']);
        Route::post('/phuong-tien/add-data', [PhuongTienController::class, 'addData']);
        Route::post('/phuong-tien/update', [PhuongTienController::class, 'update']);
        Route::post('/phuong-tien/delete', [PhuongTienController::class, 'destroy']);
        Route::post('/phuong-tien/change-status', [PhuongTienController::class, 'changeStatus']);

        // api admin hướng dẫn viên
        Route::get('/huong-dan-vien/get-data', [HuongDanVienController::class, 'getData']);
        Route::post('/huong-dan-vien/store', [HuongDanVienController::class, 'addData']);
        Route::post('/huong-dan-vien/update', [HuongDanVienController::class, 'update']);
        Route::post('/huong-dan-vien/destroy', [HuongDanVienController::class, 'destroy']);
        Route::post('/huong-dan-vien/change-status', [HuongDanVienController::class, 'changeStatus']);

        // api Quản lý Hướng Dẫn Viên và Phân Công (Admin)
        Route::get('/quan-ly-hdv/danh-sach-hdv', [HuongDanVienTourController::class, 'getDanhSachHuongDanVien']);
        Route::get('/quan-ly-hdv/danh-sach-phan-cong', [HuongDanVienTourController::class, 'getDanhSachPhanCong']);
        Route::post('/quan-ly-hdv/tao-phan-cong', [HuongDanVienTourController::class, 'taoPhanCong']);
        Route::post('/quan-ly-hdv/cap-nhat-phan-cong', [HuongDanVienTourController::class, 'capNhatPhanCong']);
        Route::post('/quan-ly-hdv/xoa-phan-cong', [HuongDanVienTourController::class, 'xoaPhanCong']);

        // API Admin: Quản lý Lịch Trình Tour
        Route::get('/lich-trinh/get-data', [LichTrinhController::class, 'getData']);
        Route::post('/lich-trinh/add-data', [LichTrinhController::class, 'addData']);
        Route::post('/lich-trinh/update', [LichTrinhController::class, 'update']);
        Route::post('/lich-trinh/delete', [LichTrinhController::class, 'destroy']);
        // API Admin: Quản lý Điểm đến
        Route::get('/diem-den/get-data', [DiemDenController::class, 'getData']);
        Route::post('/diem-den/add-data', [DiemDenController::class, 'addData']);
        Route::post('/diem-den/update', [DiemDenController::class, 'update']);
        Route::post('/diem-den/delete', [DiemDenController::class, 'destroy']);

        Route::get('/lien-he/get-data', [LienHeController::class, 'getData']);
        Route::post('/lien-he/change-status', [LienHeController::class, 'changeStatus']);
        Route::post('/lien-he/destroy', [LienHeController::class, 'destroy']);

    });
});

// CLIENT ROUTES (Public - Không cần đăng nhập)
Route::prefix('')->group(function () {
    // api trang chủ & chi tiết tour
    Route::get('/client/trang-chu/get-data', [TrangChuController::class, 'getData']);

    // api client dang ky và đăng nhập
    Route::post('/client/dang-nhap', [KhachHangController::class, 'dangNhap']);
    Route::post('/client/dang-ky', [KhachHangController::class, 'dangKy']);
    Route::post('/client/xac-nhan-dang-ky', [KhachHangController::class, 'xacNhanDangKy']);
    Route::get('/client/check-token', [KhachHangController::class, 'checkToken']);

    // api quên mật khẩu
    Route::post('/client/quen-mat-khau', [KhachHangController::class, 'quenMK']);
    Route::post('/client/lay-lai-mat-khau', [KhachHangController::class, 'layLaiMK']);

    // API Check chữ ký khi VNPay trả khách về Frontend (Return)
    Route::get('/client/vnpay/check-return', [VNPayController::class, 'vnpayReturn']);


    // VNPay Webhooks & Return (Bắt buộc để ngoài vùng Auth để VNPay có thể gửi dữ liệu tới)
    Route::get('/client/vnpay/check-return', [VNPayController::class, 'vnpayReturn']);
    Route::get('/client/vnpay/ipn', [VNPayController::class, 'vnpayIpn']);

    // API Hướng Dẫn Viên (Đưa ra vùng Public để ai cũng xem được)
    Route::get('/client/huong-dan-vien/danh-sach', [HuongDanVienTourController::class, 'getDanhSachHDVClient']);
    Route::get('/client/huong-dan-vien/chi-tiet/{id}', [HuongDanVienTourController::class, 'getChiTietHDVClient']);

    // ROUTE CHATBOT TẠI ĐÂY
    Route::post('/client/chatbot/chat', [ChatBotController::class, 'xuLyChat']);

    // ROUTE Dùng để tìm kiếm tour cho khách hàng (Tìm kiếm đa chiều: Tên Tour, Quốc Gia, Điểm Đến, Thành Phố)
    Route::post('/client/tour/search', [TourController::class, 'searchTourClient']);

    // Ở KHU VỰC CLIENT ROUTES (Public)
    Route::post('/client/lien-he', [LienHeController::class, 'store']);
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
        Route::post('/chi-tiet-tour/get-data', [ChiTietTourController::class, 'getData']);
        // ĐỔI DÒNG NÀY ĐỂ DÙNG API MỚI DÀNH CHO KHÁCH HÀNG:
        Route::get('/tour/get-data', [TourController::class, 'getDataClient']);

        //api đánh giá
        Route::post('/danh-gia/gui-danh-gia', [DanhGiaController::class, 'guiDanhGia']);
        Route::get('/danh-gia/get-danh-gia/{id}', [DanhGiaController::class, 'getDataClientBinhLuan']);

        // api đặt tour
        Route::post('/dat-tour/thanh-toan', [VeController::class, 'datTour']);

        // API Vue.js gọi lên để lấy link chuyển hướng (Nên yêu cầu đăng nhập)
        Route::post('/vnpay/tao-thanh-toan', [VNPayController::class, 'createPayment']);
        Route::get('/vnpay/check-thanh-toan', [VNPayController::class, 'checkThanhToan']);

        // API Lịch sử hóa đơn cá nhân
        Route::get('/hoa-don/danh-sach', [HoaDonController::class, 'getHoaDonCuaKhachHang']);
        Route::get('/hoa-don/chi-tiet-thanh-toan/{ma_hoa_don}', [HoaDonController::class, 'getChiTietThanhToanHoaDon']);
        Route::post('/hoa-don/huy', [HoaDonController::class, 'HuyHoaDon']);
        Route::get('/hoa-don/check-trang-thai/{id}', [HoaDonController::class, 'checkTrangThaiHoaDon']);

        // API Lấy chi tiết Bài viết
        Route::post('/chi-tiet-bai-viet/get-data', [BaiVietController::class, 'chiTietBaiVietClient']);

        // api lấy danh sách phương tiện
        Route::get('/phuong-tien/get-data', [PhuongTienController::class, 'getDataClient']);

        // API này vẫn để trong này vì nó liên quan đến đặt tour
        Route::get('/tour/huong-dan-vien/{id_tour}', [HuongDanVienTourController::class, 'getHDVByTour']);

    });
});


// HuongDanVien ROUTES (Public - Không cần đăng nhập)
Route::prefix('')->group(function () {
    // api client dang ky và đăng nhập
    Route::post('/huong-dan-vien/dang-nhap', [HuongDanVienController::class, 'dangNhap']);
    Route::post('/huong-dan-vien/dang-ky', [HuongDanVienController::class, 'dangKy']);
    Route::post('/huong-dan-vien/xac-nhan-dang-ky', [HuongDanVienController::class, 'xacNhanDangKy']);
    Route::get('/huong-dan-vien/check-token', [HuongDanVienController::class, 'checkToken']);

    // api quên mật khẩu
    Route::post('/huong-dan-vien/quen-mat-khau', [HuongDanVienController::class, 'quenMK']);
    Route::post('/huong-dan-vien/lay-lai-mat-khau', [HuongDanVienController::class, 'layLaiMK']);

});


// CLIENT ROUTES (Protected - Cần đăng nhập)
Route::prefix('')->group(function () {
    Route::group(['prefix' => '/huong-dan-vien'], function () {
        // profile hướng dẫn viên
        Route::get('/profile/get-data', [HuongDanVienController::class, 'getProfile']);
        Route::post('/profile/update', [HuongDanVienController::class, 'updateProfile']);
        // đổi mật khẩu hướng dẫn viên
        Route::post('/doi-mat-khau', [HuongDanVienController::class, 'doiMatKhau']);
        Route::post('/dang-xuat', [HuongDanVienController::class, 'dangXuat']);
        Route::post('/dang-xuat-all', [HuongDanVienController::class, 'dangXuatAll']);

        // THÊM DÒNG NÀY: Lấy danh sách lịch trình cho Hướng Dẫn Viên
        Route::get('/lich-trinh/get-data', [LichTrinhController::class, 'getLichTrinhHDV']);

        // Quản lý nhận tour dành cho Hướng Dẫn Viên
        Route::get('/quan-ly-tour/tour-trong', [HuongDanVienTourController::class, 'getTourTrong']);
        Route::get('/quan-ly-tour/tour-cua-toi', [HuongDanVienTourController::class, 'getTourCuaToi']);
        Route::post('/quan-ly-tour/nhan-tour', [HuongDanVienTourController::class, 'nhanTour']);

        // LẤY DANH SÁCH KHÁCH HÀNG THUỘC TOUR CỦA TÔI
        Route::get('/quan-ly-khach-hang/get-data', [HuongDanVienTourController::class, 'getKhachHangCuaToi']);
    });
});
