<?php

namespace Database\Seeders;

use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xác định connection hiện tại
        $connection = DB::getDefaultConnection();

        // Xóa dữ liệu cũ để tránh rác database khi seed nhiều lần
        DB::connection($connection)->table('hoa_dons')->truncate();

        // Lấy danh sách Khách hàng và Tour đang có trong DB
        $khachHangs = KhachHang::on($connection)->get();
        $tours = Tour::on($connection)->get();

        // Nếu chưa có khách hàng hoặc tour nào thì dừng seeder để tránh lỗi
        if ($khachHangs->isEmpty() || $tours->isEmpty()) {
            $this->command->info('Vui lòng chạy KhachHangSeeder và TourSeeder trước khi chạy HoaDonSeeder!');
            return;
        }

        $phuongThucThanhToan = ['vnpay', 'cash'];
        $trangThai = ['đang chờ xử lý', 'đã thanh toán', 'hủy'];

        // Tạo 50 hóa đơn mẫu
        for ($i = 0; $i < 50; $i++) {
            // Lấy ngẫu nhiên 1 khách hàng và 1 tour
            $khachHang = $khachHangs->random();
            $tour = $tours->random();

            // Random số lượng người đi (từ 1 đến 10 người, không vượt quá max của tour)
            $soLuongNguoi = rand(1, min(10, $tour->so_nguoi_toi_da ?? 10));

            // Tính tổng tiền = Số lượng người * Giá tour
            $tongTien = $soLuongNguoi * $tour->gia;

            // Random phương thức thanh toán và trạng thái
            // Nếu thanh toán VNPay thì tỉ lệ "đã thanh toán" cao hơn
            $phuongThuc = $phuongThucThanhToan[array_rand($phuongThucThanhToan)];
            if ($phuongThuc == 'vnpay') {
                $trangThaiHienTai = rand(1, 100) <= 80 ? 'đã thanh toán' : 'đang chờ xử lý';
            } else {
                $trangThaiHienTai = $trangThai[array_rand($trangThai)];
            }

            // Ghi chú danh sách người đi mô phỏng
            $ghiChu = "Người đặt: " . $khachHang->ho_va_ten . ". Bao gồm " . $soLuongNguoi . " người lớn.";

            // Random ngày tạo hóa đơn (trong vòng 30 ngày qua để test thống kê)
            $ngayTao = Carbon::today()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            // Tạo bản ghi hóa đơn
            HoaDon::on($connection)->create([
                'id_khach_hang' => $khachHang->id,
                'id_tour' => $tour->id,
                'so_luong_nguoi' => $soLuongNguoi,
                'tong_tien' => $tongTien,
                'phuong_thuc_thanh_toan' => $phuongThuc,
                'trang_thai' => $trangThaiHienTai,
                'ghi_chu_danh_sach_nguoi_di' => $ghiChu,
                'ngay_tao' => $ngayTao,
                'created_at' => $ngayTao,
                'updated_at' => $ngayTao,
            ]);
        }
    }
}