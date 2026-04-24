<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HuongDanVienTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Phân công 10 Tour cho 4 HDV đang hoạt động (ID 1 -> 4)
        // Bỏ qua HDV ID 5 (chưa kích hoạt) và ID 6 (đang bị khóa)
        $huongDanVienTours = [
            [
                'id_tour' => 1, // Đà Nẵng: Khám phá Bà Nà Hills
                'id_huong_dan_vien' => 1, // Nguyễn Quang Hải
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 2, // Vịnh Hạ Long
                'id_huong_dan_vien' => 2, // Đặng Thu Thảo
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 3, // Phú Quốc
                'id_huong_dan_vien' => 3, // Nguyễn Công Phượng
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 4, // Tà Xùa
                'id_huong_dan_vien' => 4, // H'Hen Niê
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 5, // Di sản miền Trung: Huế - Hội An
                'id_huong_dan_vien' => 1, // Nguyễn Quang Hải
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 6, // Đà Lạt
                'id_huong_dan_vien' => 2, // Đặng Thu Thảo
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 7, // Miền Tây
                'id_huong_dan_vien' => 3, // Nguyễn Công Phượng
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 8, // Sapa
                'id_huong_dan_vien' => 4, // H'Hen Niê
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 9, // Nha Trang
                'id_huong_dan_vien' => 1, // Nguyễn Quang Hải
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_tour' => 10, // Ninh Bình
                'id_huong_dan_vien' => 2, // Đặng Thu Thảo
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Dọn dẹp dữ liệu cũ
        DB::table('huong_dan_vien_tours')->truncate();
        DB::table('huong_dan_vien_tours')->delete();

        // Thêm dữ liệu phân công mới
        DB::table('huong_dan_vien_tours')->insert($huongDanVienTours);
    }
}
