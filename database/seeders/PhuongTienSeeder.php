<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PhuongTienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $phuongTien = [
            [
                'loai_phuong_tien' => 'Xe khách 45 chỗ',
                'so_hieu' => '43B-123.45',
                'mo_ta' => 'Xe giường nằm Thaco Mobihome đời mới, phục vụ các tour đường dài và đón trả khách ngoại tỉnh.',
                'tinh_trang' => 'available',
                'created_at' => $now, 
                'updated_at' => $now,
            ],
            [
                'loai_phuong_tien' => 'Xe du lịch 16 chỗ',
                'so_hieu' => '43A-678.90',
                'mo_ta' => 'Xe Ford Transit 16 chỗ, phù hợp cho các nhóm gia đình, tour VIP hoặc đưa đón sân bay.',
                'tinh_trang' => 'in_use',
                'created_at' => $now, 
                'updated_at' => $now,
            ],
            [
                'loai_phuong_tien' => 'Máy bay',
                'so_hieu' => 'VN-A214',
                'mo_ta' => 'Chuyến bay liên kết của Vietnam Airlines, phục vụ các tour nội địa từ Nam ra Bắc.',
                'tinh_trang' => 'available',
                'created_at' => $now, 
                'updated_at' => $now,
            ],
            [
                'loai_phuong_tien' => 'Tàu cao tốc',
                'so_hieu' => 'PQ-01',
                'mo_ta' => 'Tàu cao tốc 2 thân Superdong, chuyên phục vụ chặng di chuyển ra đảo Phú Quốc.',
                'tinh_trang' => 'maintenance', // Đang bảo trì
                'created_at' => $now, 
                'updated_at' => $now,
            ],
            [
                'loai_phuong_tien' => 'Ca nô siêu tốc',
                'so_hieu' => 'CN-05',
                'mo_ta' => 'Ca nô 35 chỗ phục vụ tuyến Cảng Cửa Đại - Cù Lao Chàm, có trang bị đầy đủ áo phao.',
                'tinh_trang' => 'available',
                'created_at' => $now, 
                'updated_at' => $now,
            ],
            [
                'loai_phuong_tien' => 'Du thuyền 5 sao',
                'so_hieu' => 'HL-CRUISE-09',
                'mo_ta' => 'Du thuyền ngủ đêm trên vịnh Hạ Long, cung cấp dịch vụ ăn uống và giải trí cao cấp.',
                'tinh_trang' => 'available',
                'created_at' => $now, 
                'updated_at' => $now,
            ],
            [
                'loai_phuong_tien' => 'Xe điện',
                'so_hieu' => 'XĐ-012',
                'mo_ta' => 'Xe điện tham quan thân thiện với môi trường, sử dụng nội khu tại các điểm di tích như Tràng An, Bái Đính.',
                'tinh_trang' => 'available',
                'created_at' => $now, 
                'updated_at' => $now,
            ]
        ];

        // Xóa dữ liệu cũ và reset ID tự tăng
        DB::table('phuong_tiens')->truncate();
        DB::table('phuong_tiens')->delete();
        // Chèn dữ liệu mới vào bảng
        DB::table('phuong_tiens')->insert($phuongTien);
    }
}