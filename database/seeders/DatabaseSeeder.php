<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // 1. Cấp dữ liệu nền tảng (Danh mục cơ sở)
            ChucVuSeeder::class,
            ChucNangSeeder::class,
            PhanQuyenSeeder::class, // Cần có Chức vụ và Chức năng trước

            // 2. Cấp dữ liệu Người dùng (Tài khoản)
            KhachHangSeeder::class,
            NhanVienSeeder::class, // Cần có Chức vụ trước
            HuongDanVienSeeder::class,

            // 3. Cấp dữ liệu Lõi (Sản phẩm Du lịch)
            TourSeeder::class,
            DiemDenSeeder::class,
            PhuongTienSeeder::class,

            // 4. Cấp dữ liệu Liên kết (Chi tiết Tour)
            LichTrinhSeeder::class, // Cần Tour, Điểm đến, Phương tiện
            HuongDanVienTourSeeder::class, // Cần Tour, Hướng dẫn viên

            // 5. Cấp dữ liệu Giao dịch (Booking)
            HoaDonSeeder::class, // Cần Khách hàng, Tour
            VeSeeder::class, // Cần Hóa đơn, Khách hàng

            // 6. Cấp dữ liệu Phản hồi (Review)
            DanhGiaSeeder::class, // Cần Khách hàng, Tour
        ]);
    }
}
