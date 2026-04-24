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
            // Tour 1: Bà Nà Hills (id_tour = 1)
            [
                'id_tour' => 1,
                'id_diem_den' => 1, // Cầu Vàng
                'id_phuong_tien' => 2, // Xe du lịch 16 chỗ đón khách
                'tieu_de_hoat_dong' => 'Khởi hành từ trung tâm Đà Nẵng, đi cáp treo tham quan Cầu Vàng.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 1,
                'id_diem_den' => 2, // Làng Pháp
                'id_phuong_tien' => null, // Đi bộ nội khu
                'tieu_de_hoat_dong' => 'Khám phá Làng Pháp, vui chơi tại Fantasy Park và ăn trưa buffet.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 2: Hạ Long (id_tour = 2)
            [
                'id_tour' => 2,
                'id_diem_den' => 3, // Vịnh Hạ Long trên cao
                'id_phuong_tien' => 6, // Du thuyền 5 sao
                'tieu_de_hoat_dong' => 'Lên du thuyền 5 sao, ngắm toàn cảnh Vịnh Hạ Long và ăn trưa trên tàu.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 2,
                'id_diem_den' => 4, // Chèo thuyền Kayak
                'id_phuong_tien' => 6, // Du thuyền
                'tieu_de_hoat_dong' => 'Dừng tại hang Luồn, nhận xuồng và tự do chèo Kayak khám phá hang động.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 3: Phú Quốc (id_tour = 3)
            [
                'id_tour' => 3,
                'id_diem_den' => 5, // Bãi sao
                'id_phuong_tien' => 1, // Xe khách 45 chỗ
                'tieu_de_hoat_dong' => 'Xe đón khách tại khách sạn di chuyển đến Bãi Sao, tự do tắm biển.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 3,
                'id_diem_den' => 6, // Cáp treo Hòn Thơm
                'id_phuong_tien' => null, // Cáp treo (hoặc null)
                'tieu_de_hoat_dong' => 'Trải nghiệm cáp treo vượt biển dài nhất thế giới sang đảo Hòn Thơm.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 4: Tà Xùa (id_tour = 4)
            [
                'id_tour' => 4,
                'id_diem_den' => 7, // Săn mây Tà Xùa
                'id_phuong_tien' => 2, // Xe 16 chỗ leo núi
                'tieu_de_hoat_dong' => 'Xe 16 chỗ đón khách từ Hà Nội lên Sơn La, đón bình minh và săn mây.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 4,
                'id_diem_den' => 8, // Sống lưng khủng long
                'id_phuong_tien' => null, // Đi bộ/trekking
                'tieu_de_hoat_dong' => 'Trekking dọc Sống lưng khủng long, check-in và chụp ảnh kỷ niệm.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 5: Di sản miền Trung (id_tour = 5)
            [
                'id_tour' => 5,
                'id_diem_den' => 9, // Đại Nội Huế
                'id_phuong_tien' => 1, // Xe 45 chỗ
                'tieu_de_hoat_dong' => 'Tham quan Đại Nội Huế, nghe HDV thuyết minh về các triều đại nhà Nguyễn.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 5,
                'id_diem_den' => 10, // Phố cổ Hội An
                'id_phuong_tien' => 1, // Xe 45 chỗ
                'tieu_de_hoat_dong' => 'Di chuyển vào Hội An, dạo bước phố cổ đèn lồng về đêm, thưởng thức cao lầu.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 6: Đà Lạt (id_tour = 6)
            [
                'id_tour' => 6,
                'id_diem_den' => 11, // Thung lũng tình yêu
                'id_phuong_tien' => 1, // Xe 45 chỗ
                'tieu_de_hoat_dong' => 'Tham quan Thung lũng tình yêu, đạp vịt trên hồ Đa Thiện.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6,
                'id_diem_den' => 12, // Quảng trường Lâm Viên
                'id_phuong_tien' => 1, // Xe 45 chỗ
                'tieu_de_hoat_dong' => 'Tự do check-in tại Quảng trường Lâm Viên, nhâm nhi cafe trong nụ hoa Atiso.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 7: Miền Tây (id_tour = 7)
            [
                'id_tour' => 7,
                'id_diem_den' => 13, // Chợ nổi Cái Răng
                'id_phuong_tien' => 5, // Ca nô siêu tốc (hoặc ghe/tàu)
                'tieu_de_hoat_dong' => 'Lên cano/tàu tham quan chợ nổi Cái Răng, ăn sáng và mua trái cây trên sông.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 7,
                'id_diem_den' => 14, // Miệt vườn trái cây
                'id_phuong_tien' => 1, // Xe 45 chỗ
                'tieu_de_hoat_dong' => 'Ghé thăm miệt vườn trái cây, nghe đờn ca tài tử và ăn trưa dân dã.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 8: Fansipan (id_tour = 8)
            [
                'id_tour' => 8,
                'id_diem_den' => 15, // Đỉnh Fansipan
                'id_phuong_tien' => null, // Tàu hỏa Mường Hoa + Cáp treo
                'tieu_de_hoat_dong' => 'Sử dụng cáp treo lên đỉnh Fansipan, làm lễ tại quần thể tâm linh.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 8,
                'id_diem_den' => 16, // Bản Cát Cát
                'id_phuong_tien' => 2, // Xe 16 chỗ
                'tieu_de_hoat_dong' => 'Xe đưa đoàn xuống bản Cát Cát, tìm hiểu đời sống người H\'Mông.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 9: Nha Trang (id_tour = 9)
            [
                'id_tour' => 9,
                'id_diem_den' => 17, // Lặn ngắm san hô
                'id_phuong_tien' => 5, // Ca nô siêu tốc
                'tieu_de_hoat_dong' => 'Đi ca nô siêu tốc ra đảo, thay đồ lặn và trải nghiệm lặn biển ngắm san hô.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 9,
                'id_diem_den' => 18, // Tắm bùn Hòn Tằm
                'id_phuong_tien' => 5, // Ca nô siêu tốc
                'tieu_de_hoat_dong' => 'Di chuyển sang Hòn Tằm, nghỉ ngơi phục hồi sức khỏe với dịch vụ tắm bùn khoáng.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 10: Ninh Bình (id_tour = 10)
            [
                'id_tour' => 10,
                'id_diem_den' => 19, // Danh thắng Tràng An
                'id_phuong_tien' => null, // Đi đò chèo tay
                'tieu_de_hoat_dong' => 'Ngồi đò chèo tay dọc theo dòng Ngô Đồng, xuyên qua các hang động kỳ bí.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 10,
                'id_diem_den' => 20, // Chùa Bái Đính
                'id_phuong_tien' => 7, // Xe điện
                'tieu_de_hoat_dong' => 'Sử dụng xe điện di chuyển vào khuôn viên chùa Bái Đính, tham quan hành lang La Hán.',
                'created_at' => $now, 'updated_at' => $now,
            ],
        ];

        DB::table('lich_trinhs')->truncate();
        DB::table('lich_trinhs')->delete();
        DB::table('lich_trinhs')->insert($lichTrinhs);
    }
}
