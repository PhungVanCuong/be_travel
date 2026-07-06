<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KhachHangSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('khach_hangs')->truncate();
        Schema::enableForeignKeyConstraints();

        // Danh sách khách hàng đa dạng trạng thái
        $khachHang = [
            // --- KHÁCH HÀNG HOẠT ĐỘNG BÌNH THƯỜNG (is_active = 1, is_block = 0) ---
            ['ho_va_ten' => 'Nguyễn Thị G', 'email' => 'nguyenthig@gmail.com', 'so_dien_thoai' => '0900111222', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-01-10 08:00:00'],
            ['ho_va_ten' => 'Trần Văn H', 'email' => 'tranvanh@gmail.com', 'so_dien_thoai' => '0911002200', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-02-15 09:30:00'],
            ['ho_va_ten' => 'Lê Thị I', 'email' => 'lethii@gmail.com', 'so_dien_thoai' => '0922334455', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-03-20 10:15:00'],
            ['ho_va_ten' => 'Nguyễn Thị K', 'email' => 'nguyenthik@gmail.com', 'so_dien_thoai' => '0944556677', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-05-05 14:00:00'],
            ['ho_va_ten' => 'Lê Thị M', 'email' => 'lethim@gmail.com', 'so_dien_thoai' => '0966778899', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-06-12 16:45:00'],
            ['ho_va_ten' => 'Nguyễn Thị O', 'email' => 'nguyenthio@gmail.com', 'so_dien_thoai' => '0988990011', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-07-22 08:20:00'],
            ['ho_va_ten' => 'Nguyễn Thị Q', 'email' => 'nguyenthiq@gmail.com', 'so_dien_thoai' => '0902233445', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-08-30 11:10:00'],
            ['ho_va_ten' => 'Lê Thị S', 'email' => 'lethis@gmail.com', 'so_dien_thoai' => '0922445566', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-10-15 09:05:00'],
            ['ho_va_ten' => 'Phạm Văn T', 'email' => 'phamvant@gmail.com', 'so_dien_thoai' => '0932555666', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2025-11-20 15:30:00'],
            ['ho_va_ten' => 'Phùng Văn Cường', 'email' => 'cuongphung1810@gmail.com', 'so_dien_thoai' => '0999000111', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2026-01-05 08:00:00'],
            ['ho_va_ten' => 'Hoàng Minh Ngọc', 'email' => 'ngocminh@gmail.com', 'so_dien_thoai' => '0977666555', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2026-02-10 09:00:00'],
            ['ho_va_ten' => 'Vũ Thị Lan', 'email' => 'lanvu@gmail.com', 'so_dien_thoai' => '0988777666', 'is_active' => 1, 'is_block' => 0, 'created_at' => '2026-03-12 10:00:00'],

            // --- KHÁCH HÀNG BỊ KHÓA DO VI PHẠM (is_active = 1, is_block = 1) (Vẫn giữ lịch sử mua hàng và đánh giá) ---
            ['ho_va_ten' => 'Phạm Văn J', 'email' => 'phamvanj@gmail.com', 'so_dien_thoai' => '0933445566', 'is_active' => 1, 'is_block' => 1, 'created_at' => '2025-04-10 08:00:00'],
            ['ho_va_ten' => 'Trần Văn L', 'email' => 'tranvanl@gmail.com', 'so_dien_thoai' => '0955667788', 'is_active' => 1, 'is_block' => 1, 'created_at' => '2025-05-20 09:00:00'],
            ['ho_va_ten' => 'Phạm Văn N', 'email' => 'phamvann@gmail.com', 'so_dien_thoai' => '0977889900', 'is_active' => 1, 'is_block' => 1, 'created_at' => '2025-06-25 10:00:00'],

            // --- KHÁCH HÀNG MỚI TẠO, CHƯA XÁC NHẬN EMAIL (is_active = 0, is_block = 0) (Không được mua hàng, không có đánh giá) ---
            ['ho_va_ten' => 'Trần Văn P', 'email' => 'tranvanp@gmail.com', 'so_dien_thoai' => '0999001122', 'is_active' => 0, 'is_block' => 0, 'created_at' => '2026-04-01 08:00:00'],
            ['ho_va_ten' => 'Trần Văn R', 'email' => 'tranvanr@gmail.com', 'so_dien_thoai' => '0912333444', 'is_active' => 0, 'is_block' => 0, 'created_at' => '2026-04-15 09:00:00'],
            ['ho_va_ten' => 'Nguyễn Thị U', 'email' => 'nguyenthiu@gmail.com', 'so_dien_thoai' => '0942667788', 'is_active' => 0, 'is_block' => 0, 'created_at' => '2026-05-02 10:00:00'],
        ];

        // Chuẩn hóa dữ liệu chung
        $avatars = [
            'https://png.pngtree.com/png-vector/20201223/ourlarge/pngtree-cute-cartoon-hand-drawn-cow-animal-avatar-vector-png-image_2591528.jpg',
            'https://thuvienavatar.edu.vn/wp-content/uploads/2025/12/avatar-vo-tri-cute-4.jpg',
            'https://mayweddingstudio.vn/wp-content/uploads/anh-dai-dien-facebook-nam-6.webp',
            'https://jbagy.me/wp-content/uploads/2025/03/hinh-anh-cute-avatar-vo-tri-3.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE84ZkAzHiXWkFTmCj7wCW2wmoSVweoOG95A&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA5W8mmdqgticBgvZuCKQ30R7Tez2grRh9fA&s',
            'https://lh3.googleusercontent.com/a/ACg8ocJSirL9mGUSxGZg5N3sLQw-SM9T0RvQpPBiDehCkdMJ9uiRyBqg=s96-c'
        ];

        foreach ($khachHang as $index => $kh) {
            $kh['password'] = '123456';
            $kh['ngay_sinh'] = '199' . ($index % 9) . '-0' . (($index % 8) + 1) . '-1' . ($index % 9);
            $kh['avatar'] = $avatars[$index % count($avatars)];
            $kh['updated_at'] = $kh['created_at'];

            DB::table('khach_hangs')->insert($kh);
        }
    }
}
