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
            SlideSeeder::class,
            BaiVietSeeder::class, // Cần có bảng bài viết
            ChucVuSeeder::class,
            ChucNangSeeder::class,
            PhanQuyenSeeder::class, // Cần có Chức vụ và Chức năng trước
            KhachHangSeeder::class,
            NhanVienSeeder::class, // Cần có Chức vụ trước
            HuongDanVienSeeder::class,
            QuocGiaSeeder::class,
            TourSeeder::class,
            DiemDenSeeder::class,
            PhuongTienSeeder::class,
            LichTrinhSeeder::class, // Cần Tour, Điểm đến, Phương tiện
            HuongDanVienTourSeeder::class, // Cần Tour, Hướng dẫn viên
            HoaDonSeeder::class, // Cần Khách hàng, Tour
            VeSeeder::class, // Cần Hóa đơn, Khách hàng
            DanhGiaSeeder::class, // Cần Khách hàng, Tour

        ]);
    }
}
