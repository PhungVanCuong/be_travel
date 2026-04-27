<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuocGiaSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $quocGias = [
            ['id' => 1, 'ten_quoc_gia' => 'Việt Nam', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'ten_quoc_gia' => 'Thái Lan', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'ten_quoc_gia' => 'Hàn Quốc', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'ten_quoc_gia' => 'Nhật Bản', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'ten_quoc_gia' => 'Singapore', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'ten_quoc_gia' => 'Malaysia', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'ten_quoc_gia' => 'Trung Quốc', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'ten_quoc_gia' => 'Đài Loan', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'ten_quoc_gia' => 'Indonesia', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'ten_quoc_gia' => 'DuBai', 'tinh_trang' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('quoc_gias')->truncate();
        DB::table('quoc_gias')->delete();
        DB::table('quoc_gias')->insert($quocGias);
    }
}
