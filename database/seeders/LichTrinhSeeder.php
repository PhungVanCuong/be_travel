<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LichTrinhSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $lichTrinhs = [
            // Tour 1: (id_tour = 1)
            [
                'id_tour' => 1,
                'id_diem_den' => 1,
                'id_phuong_tien' => 2, // Xe du lịch 16 chỗ
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 1,
                'id_diem_den' => 2,
                'id_phuong_tien' => null, // Đi bộ
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 1,
                'id_diem_den' => 3,
                'id_phuong_tien' => null, // Đi bộ
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 1,
                'id_diem_den' => 4,
                'id_phuong_tien' => null,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 2:  (id_tour = 2)
            [
                'id_tour' => 2,
                'id_diem_den' => 5,
                'id_phuong_tien' => 6,

                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 2,
                'id_diem_den' => 6,
                'id_phuong_tien' => 6,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 2,
                'id_diem_den' => 7,
                'id_phuong_tien' => 6,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 2,
                'id_diem_den' => 8,
                'id_phuong_tien' => 6,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 2,
                'id_diem_den' => 9,
                'id_phuong_tien' => 6,
                'created_at' => $now, 'updated_at' => $now,
            ],
// Tour 3:  (id_tour = 3)
            [
                'id_tour' => 3,
                'id_diem_den' => 10, // HCM - Đà Nẵng - Phố Cổ Hội An [cite: 46]
                'id_phuong_tien' => 3, // Gợi ý: Máy bay / Xe du lịch [cite: 47]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 3,
                'id_diem_den' => 11, // Đà Nẵng - Huế [cite: 52]
                'id_phuong_tien' => 2, // Gợi ý: Xe du lịch [cite: 53]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 3,
                'id_diem_den' => 12, // Huế - Động Phong Nha [cite: 57]
                'id_phuong_tien' => 2, // Gợi ý: Xe du lịch / Thuyền [cite: 58, 59]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 3,
                'id_diem_den' => 13, // Huế - Đà Nẵng - HCM [cite: 62]
                'id_phuong_tien' => 3, // Gợi ý: Máy bay [cite: 66]
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 4:  (id_tour = 4)
            [
                'id_tour' => 4,
                'id_diem_den' => 14, // HCM - Phan Thiết - Bikini Beach [cite: 68]
                'id_phuong_tien' => 2, // Gợi ý: Xe du lịch 16-45 chỗ [cite: 69]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 4,
                'id_diem_den' => 15, // Mũi Né - Bàu Trắng - HCM [cite: 75]
                'id_phuong_tien' => 2, // Gợi ý: Xe du lịch / Xe Jeep [cite: 77]
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 5:  (id_tour = 5)
            [
                'id_tour' => 5,
                'id_diem_den' => 16, // HCM - Quãng Ngãi [cite: 81]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 82]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 5,
                'id_diem_den' => 17, // Quảng Ngãi - Đảo Lý Sơn [cite: 84]
                'id_phuong_tien' => 5, // Gợi ý: Tàu cao tốc [cite: 86]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 5,
                'id_diem_den' => 18, // Đảo Bé - Núi Thới Lới - Hang Câu [cite: 90]
                'id_phuong_tien' => null, // Gợi ý: Ca nô / Đi bộ [cite: 91]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 5,
                'id_diem_den' => 19, // Đảo Lý Sơn - Quảng Ngãi [cite: 96]
                'id_phuong_tien' => 5, // Gợi ý: Tàu cao tốc [cite: 97]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 5,
                'id_diem_den' => 20, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6,
                'id_diem_den' => 21, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6,
                'id_diem_den' => 22, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6,
                'id_diem_den' => 23, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6,
                'id_diem_den' => 24, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6,
                'id_diem_den' => 25, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6,
                'id_diem_den' => 26, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 7,
                'id_diem_den' => 27, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 7,
                'id_diem_den' => 28, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 7,
                'id_diem_den' => 29, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 8,
                'id_diem_den' => 30, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 8,
                'id_diem_den' => 31, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 8,
                'id_diem_den' => 32, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 8,
                'id_diem_den' => 33, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 9,
                'id_diem_den' => 34, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 9,
                'id_diem_den' => 35, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 9,
                'id_diem_den' => 36, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 9,
                'id_diem_den' => 37, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 10,
                'id_diem_den' => 38, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 10,
                'id_diem_den' => 39, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 10,
                'id_diem_den' => 40, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 10,
                'id_diem_den' => 41, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 10,
                'id_diem_den' => 42, // Thành Phố Hồ Chí Minh [cite: 99]
                'id_phuong_tien' => 4, // Gợi ý: Tàu lửa [cite: 100]
                'created_at' => $now, 'updated_at' => $now,
            ],






        ];

        DB::table('lich_trinhs')->truncate();
        DB::table('lich_trinhs')->delete();
        DB::table('lich_trinhs')->insert($lichTrinhs);
    }
}
