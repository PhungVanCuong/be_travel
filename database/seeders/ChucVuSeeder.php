<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    public function run(): void
    {
        $chucVu = [
            [
                'id' => 1,
                'ten_chuc_vu' => 'Admin',
                'tinh_trang' => 1
            ],
            [
                'id' => 2,
                'ten_chuc_vu' => 'Điều hành tour',
                'tinh_trang' => 1
            ],
            [
                'id' => 3,
                'ten_chuc_vu' => 'Kế toán',
                'tinh_trang' => 1
            ],
            [
                'id' => 4,
                'ten_chuc_vu' => 'Chăm sóc khách hàng',
                'tinh_trang' => 1
            ],
            [
                'id' => 5,
                'ten_chuc_vu' => 'Hướng dẫn viên',
                'tinh_trang' => 1
            ],
            [
                'id' => 6,
                'ten_chuc_vu' => 'Kỹ thuật hệ thống',
                'tinh_trang' => 1
            ],
        ];

        DB::table('chuc_vus')->truncate();
        DB::table('chuc_vus')->delete();
        DB::table('chuc_vus')->insert($chucVu);
    }
}
