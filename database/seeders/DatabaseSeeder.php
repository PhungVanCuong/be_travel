<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        $this->call([
            ChucVuSeeder::class,
            chucNangSeeder::class,
            KhachHangSeeder::class,
            NhanVienSeeder::class,
            HuongDanVienSeeder::class,
            PhanQuyenSeeder::class,
            TourSeeder::class,



        ]);
    }
}
