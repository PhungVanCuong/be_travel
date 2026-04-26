<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $tours = [
            [
                'ten_tour' => 'Đà Nẵng: Khám phá Bà Nà Hills - Cầu Vàng',
                'mo_ta' => 'Trải nghiệm cáp treo đạt nhiều kỷ lục thế giới, check-in Cầu Vàng hùng vĩ và lạc lối trong không gian kiến trúc Làng Pháp cổ điển.',
                'gia' => 1250000.00,
                'ngay_bat_dau' => '2026-05-01',
                'ngay_ket_thuc' => '2026-05-01',
                'so_nguoi_toi_da' => 40,
                'diem_don' => 'Trung tâm TP. Đà Nẵng',
                'diem_tra' => 'Trung tâm TP. Đà Nẵng',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Vịnh Hạ Long: Du thuyền & Chèo Kayak',
                'mo_ta' => 'Chiêm ngưỡng kỳ quan thiên nhiên thế giới từ du thuyền sang trọng, tham gia chèo thuyền Kayak khám phá các hang động kỳ ảo trên vịnh.',
                'gia' => 2500000.00,
                'ngay_bat_dau' => '2026-05-10',
                'ngay_ket_thuc' => '2026-05-11',
                'so_nguoi_toi_da' => 30,
                'diem_don' => 'Cảng tàu khách quốc tế Hạ Long',
                'diem_tra' => 'Cảng tàu khách quốc tế Hạ Long',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Phú Quốc: Bãi Sao & Cáp treo Hòn Thơm',
                'mo_ta' => 'Tận hưởng làn nước xanh ngắt tại Bãi Sao và trải nghiệm tuyến cáp treo vượt biển dài nhất thế giới sang đảo Hòn Thơm.',
                'gia' => 3800000.00,
                'ngay_bat_dau' => '2026-06-15',
                'ngay_ket_thuc' => '2026-06-17',
                'so_nguoi_toi_da' => 25,
                'diem_don' => 'Sân bay Phú Quốc',
                'diem_tra' => 'Sân bay Phú Quốc',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Tà Xùa: Săn mây & Sống lưng khủng long',
                'mo_ta' => 'Hành trình chinh phục thiên đường mây Tà Xùa, check-in "Sống lưng khủng long" và tận hưởng không khí hùng vĩ của núi rừng Tây Bắc.',
                'gia' => 1850000.00,
                'ngay_bat_dau' => '2026-04-20',
                'ngay_ket_thuc' => '2026-04-22',
                'so_nguoi_toi_da' => 15,
                'diem_don' => 'Bến xe Mỹ Đình, Hà Nội',
                'diem_tra' => 'Bến xe Mỹ Đình, Hà Nội',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Di sản miền Trung: Đại Nội Huế - Hội An',
                'mo_ta' => 'Tìm về cội nguồn văn hóa tại Cố đô Huế và thả mình trong không gian lung linh của Phố cổ Hội An về đêm.',
                'gia' => 2900000.00,
                'ngay_bat_dau' => '2026-05-05',
                'ngay_ket_thuc' => '2026-05-07',
                'so_nguoi_toi_da' => 20,
                'diem_don' => 'Ga Huế',
                'diem_tra' => 'Phố cổ Hội An',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Đà Lạt: Thung lũng Tình Yêu & Quảng trường Lâm Viên',
                'mo_ta' => 'Thăm thành phố ngàn hoa, check-in nụ hoa Atiso khổng lồ tại Quảng trường và dạo bước trong Thung lũng Tình Yêu thơ mộng.',
                'gia' => 3200000.00,
                'ngay_bat_dau' => '2026-05-12',
                'ngay_ket_thuc' => '2026-05-15',
                'so_nguoi_toi_da' => 30,
                'diem_don' => 'Sân bay Liên Khương',
                'diem_tra' => 'Trung tâm Đà Lạt',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Miền Tây: Chợ nổi Cái Răng & Miệt vườn trái cây',
                'mo_ta' => 'Trải nghiệm nét văn hóa sông nước độc đáo tại chợ nổi lớn nhất miền Tây và thưởng thức trái cây tươi ngon ngay tại vườn.',
                'gia' => 1500000.00,
                'ngay_bat_dau' => '2026-06-20',
                'ngay_ket_thuc' => '2026-06-21',
                'so_nguoi_toi_da' => 35,
                'diem_don' => 'Bến Ninh Kiều, Cần Thơ',
                'diem_tra' => 'Bến Ninh Kiều, Cần Thơ',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Sapa: Chinh phục Fansipan & Bản Cát Cát',
                'mo_ta' => 'Chạm tay vào cột mốc "Nóc nhà Đông Dương" và tìm hiểu đời sống văn hóa đặc sắc của người dân tộc Mông tại bản Cát Cát.',
                'gia' => 4500000.00,
                'ngay_bat_dau' => '2026-05-18',
                'ngay_ket_thuc' => '2026-05-20',
                'so_nguoi_toi_da' => 20,
                'diem_don' => 'Ga Lào Cai',
                'diem_tra' => 'Thị xã Sapa',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Nha Trang: Lặn ngắm san hô & Tắm bùn Hòn Tằm',
                'mo_ta' => 'Khám phá thế giới đại dương rực rỡ và thư giãn tuyệt đối với dịch vụ tắm bùn khoáng nóng trên đảo Hòn Tằm.',
                'gia' => 2200000.00,
                'ngay_bat_dau' => '2026-07-01',
                'ngay_ket_thuc' => '2026-07-02',
                'so_nguoi_toi_da' => 25,
                'diem_don' => 'Cảng Cầu Đá, Nha Trang',
                'diem_tra' => 'Cảng Cầu Đá, Nha Trang',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_tour' => 'Ninh Bình: Danh thắng Tràng An & Chùa Bái Đính',
                'mo_ta' => 'Ngồi thuyền xuôi dòng Ngô Đồng khám phá di sản thế giới Tràng An và chiêm bái ngôi chùa có nhiều kỷ lục nhất Việt Nam.',
                'gia' => 1350000.00,
                'ngay_bat_dau' => '2026-05-22',
                'ngay_ket_thuc' => '2026-05-22',
                'so_nguoi_toi_da' => 45,
                'diem_don' => 'Thành phố Ninh Bình',
                'diem_tra' => 'Thành phố Ninh Bình',
                'tinh_trang' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
        ];

        DB::table('tours')->truncate();
        DB::table('tours')->delete();
        DB::table('tours')->insert($tours);
    }
}
