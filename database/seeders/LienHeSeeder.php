<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LienHe;

class LienHeSeeder extends Seeder
{
    public function run()
    {
        LienHe::create([
            'ho_ten' => 'Nguyễn Văn A',
            'email' => 'nguyenvana@gmail.com',
            'so_dien_thoai' => '0901234567',
            'noi_dung' => 'Tôi muốn hỏi về chính sách hoàn hủy tour Đà Nẵng.',
            'trang_thai' => 0,
        ]);

        LienHe::create([
            'ho_ten' => 'Trần Thị B',
            'email' => 'tranthib@gmail.com',
            'so_dien_thoai' => '0987654321',
            'noi_dung' => 'Công ty có hỗ trợ xuất hóa đơn VAT cho doanh nghiệp không?',
            'trang_thai' => 1,
        ]);
    }
}
