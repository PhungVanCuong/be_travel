<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'tieu_de' => 'Slide 1',
                'hinh_anh' => 'https://media-cdn-v2.laodong.vn/storage/newsportal/2022/7/13/1067753/Cac-Tour-Dulich-Tron.jpg?w=800&crop=auto&scale=both',
                'tinh_trang' => 1,
            ],
            [
                'tieu_de' => 'Slide 2',
                'hinh_anh' => 'https://file.hstatic.net/200000851795/article/du-lich-viet-nam_a5b5777f771c44a89aee7f59151e7f95.jpg',
                'tinh_trang' => 1,
            ],
            [
                'tieu_de' => 'Slide 3',
                'hinh_anh' => 'https://5.imimg.com/data5/SELLER/Default/2024/9/454214306/OJ/FR/XY/26810836/tour-travel-services.jpg',
                'tinh_trang' => 1,
            ],
        ];
        DB::table('slides')->truncate();
        DB::table('slides')->delete();
        DB::table('slides')->insert($slides);
    }
}
