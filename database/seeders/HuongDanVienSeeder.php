<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HuongDanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tắt kiểm tra khóa ngoại trước khi truncate để tránh lỗi
        Schema::disableForeignKeyConstraints();
        DB::table('huong_dan_viens')->truncate();
        Schema::enableForeignKeyConstraints();

        $huongDanVien = [
            [
                'email' => 'hdv.quanghai@vietnamtravel.com',
                'ho_va_ten' => 'Nguyễn Quang Hải',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Anh',
                'so_dien_thoai' => '0901111001',
                'is_active' => 1,
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.thuthao@vietnamtravel.com',
                'ho_va_ten' => 'Đặng Thu Thảo',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Hàn',
                'so_dien_thoai' => '0901111002',
                'is_active' => 1,
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.congphuong@vietnamtravel.com',
                'ho_va_ten' => 'Nguyễn Công Phượng',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Trung',
                'so_dien_thoai' => '0901111003',
                'is_active' => 1,
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.hhennie@vietnamtravel.com',
                'ho_va_ten' => 'H\'Hen Niê',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Anh, Tiếng Pháp',
                'so_dien_thoai' => '0901111004',
                'is_active' => 1,
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.tienlinh@vietnamtravel.com',
                'ho_va_ten' => 'Nguyễn Tiến Linh',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Nhật',
                'so_dien_thoai' => '0901111005',
                'is_active' => 1, // Đã kích hoạt
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.hoangyen@vietnamtravel.com',
                'ho_va_ten' => 'Võ Hoàng Yến',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Anh',
                'so_dien_thoai' => '0901111006',
                'is_active' => 1,
                'is_block' => 0, // Đã mở khóa
            ]
        ];

        // Chuẩn hóa mảng dữ liệu avatar chung
        $avatars = [
            'https://png.pngtree.com/png-vector/20201223/ourlarge/pngtree-cute-cartoon-hand-drawn-cow-animal-avatar-vector-png-image_2591528.jpg',
            'https://thuvienavatar.edu.vn/wp-content/uploads/2025/12/avatar-vo-tri-cute-4.jpg',
            'https://jbagy.me/wp-content/uploads/2025/03/hinh-anh-cute-avatar-vo-tri-3.jpg',
            'https://mayweddingstudio.vn/wp-content/uploads/anh-dai-dien-facebook-nam-6.webp',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA5W8mmdqgticBgvZuCKQ30R7Tez2grRh9fA&s',
            'https://lh3.googleusercontent.com/a/ACg8ocJSirL9mGUSxGZg5N3sLQw-SM9T0RvQpPBiDehCkdMJ9uiRyBqg=s96-c'
        ];

        $dataToInsert = [];

        foreach ($huongDanVien as $index => $hdv) {
            // Gán avatar tự động theo thứ tự xoay vòng từ mảng $avatars
            $hdv['avatar'] = $avatars[$index % count($avatars)];

            // Bạn có thể thêm created_at, updated_at ở đây nếu database yêu cầu
            // $hdv['created_at'] = now();
            // $hdv['updated_at'] = now();

            $dataToInsert[] = $hdv;
        }

        // Chèn dữ liệu mới vào database
        DB::table('huong_dan_viens')->insert($dataToInsert);
    }
}
