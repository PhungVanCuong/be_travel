<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HuongDanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $huongDanVien = [
            [
                'email' => 'hdv.quanghai@vietnamtravel.com',
                'ho_va_ten' => 'Nguyễn Quang Hải',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Anh',
                'so_dien_thoai' => '0901111001',
                'avatar' => 'https://i.pinimg.com/736x/56/72/d6/5672d634f75f75edb6e8cd3de03f099e.jpg',
                'is_active' => 1,
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.thuthao@vietnamtravel.com',
                'ho_va_ten' => 'Đặng Thu Thảo',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Hàn',
                'so_dien_thoai' => '0901111002',
                'avatar' => 'https://i.pinimg.com/736x/56/72/d6/5672d634f75f75edb6e8cd3de03f099e.jpg',
                'is_active' => 1,
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.congphuong@vietnamtravel.com',
                'ho_va_ten' => 'Nguyễn Công Phượng',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Trung',
                'so_dien_thoai' => '0901111003',
                'avatar' => 'https://i.pinimg.com/736x/56/72/d6/5672d634f75f75edb6e8cd3de03f099e.jpg',
                'is_active' => 1,
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.hhennie@vietnamtravel.com',
                'ho_va_ten' => 'H\'Hen Niê',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Anh, Tiếng Pháp',
                'so_dien_thoai' => '0901111004',
                'avatar' => 'https://i.pinimg.com/736x/56/72/d6/5672d634f75f75edb6e8cd3de03f099e.jpg',
                'is_active' => 1,
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.tienlinh@vietnamtravel.com',
                'ho_va_ten' => 'Nguyễn Tiến Linh',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Nhật',
                'so_dien_thoai' => '0901111005',
                'avatar' => 'https://i.pinimg.com/736x/56/72/d6/5672d634f75f75edb6e8cd3de03f099e.jpg',
                'is_active' => 1, // Đã kích hoạt
                'is_block' => 0,
            ],
            [
                'email' => 'hdv.hoangyen@vietnamtravel.com',
                'ho_va_ten' => 'Võ Hoàng Yến',
                'password' => '123456',
                'ngon_ngu' => 'Tiếng Việt, Tiếng Anh',
                'so_dien_thoai' => '0901111006',
                'avatar' => 'https://i.pinimg.com/736x/56/72/d6/5672d634f75f75edb6e8cd3de03f099e.jpg',
                'is_active' => 1,
                'is_block' => 0, // Đã mở khóa
            ]
        ];

        // Xóa dữ liệu cũ và reset ID
        DB::table('huong_dan_viens')->truncate();
        DB::table('huong_dan_viens')->delete();
        // Chèn dữ liệu mới
        DB::table('huong_dan_viens')->insert($huongDanVien);
    }
}
