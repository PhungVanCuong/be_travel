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

        // Phân công 18 Tour cho 6 HDV đang hoạt động (ID 1 -> 6)
        $huongDanVienTours = [
            // ============ TOUR TRONG NƯỚC (1 - 10) ============
            [
                'id_tour' => 1, // Đà Nẵng: Khám phá Bà Nà Hills
                'id_huong_dan_vien' => 1, // Nguyễn Quang Hải
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 2, // Vịnh Hạ Long
                'id_huong_dan_vien' => 2, // Đặng Thu Thảo
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 3, // Phú Quốc
                'id_huong_dan_vien' => 3, // Nguyễn Công Phượng
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 4, // Tà Xùa
                'id_huong_dan_vien' => 4, // H'Hen Niê
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 5, // Di sản miền Trung: Huế - Hội An
                'id_huong_dan_vien' => 5, // Nguyễn Tiến Linh
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6, // Đà Lạt
                'id_huong_dan_vien' => 6, // Võ Hoàng Yến
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 7, // Miền Tây
                'id_huong_dan_vien' => 1, // Nguyễn Quang Hải
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 8, // Sapa
                'id_huong_dan_vien' => 2, // Đặng Thu Thảo
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 9, // Nha Trang
                'id_huong_dan_vien' => 3, // Nguyễn Công Phượng
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 10, // Ninh Bình
                'id_huong_dan_vien' => 4, // H'Hen Niê
                'created_at' => $now, 'updated_at' => $now,
            ],

            // ============ TOUR NƯỚC NGOÀI (11 - 18) ============
            [
                'id_tour' => 11, // Chiang Mai - Chiang Rai
                'id_huong_dan_vien' => 5, // Nguyễn Tiến Linh
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 12, // Phuket - Đảo Phi Phi
                'id_huong_dan_vien' => 6, // Võ Hoàng Yến
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 13, // Busan - Làng văn hóa Gamcheon
                'id_huong_dan_vien' => 1, // Nguyễn Quang Hải
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 14, // Đảo Jeju: Hòn đảo hòa bình
                'id_huong_dan_vien' => 2, // Đặng Thu Thảo
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 15, // Hokkaido
                'id_huong_dan_vien' => 3, // Nguyễn Công Phượng
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 16, // Okinawa
                'id_huong_dan_vien' => 4, // H'Hen Niê
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 17, // Singapore Night Safari
                'id_huong_dan_vien' => 5, // Nguyễn Tiến Linh
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 18, // Singapore Du thuyền
                'id_huong_dan_vien' => 6, // Võ Hoàng Yến
                'created_at' => $now, 'updated_at' => $now,
            ],
        ];

        // Dọn dẹp dữ liệu cũ
        DB::table('huong_dan_vien_tours')->truncate();
        DB::table('huong_dan_vien_tours')->delete();

        // Thêm dữ liệu phân công mới
        DB::table('huong_dan_vien_tours')->insert($huongDanVienTours);
    }
}
