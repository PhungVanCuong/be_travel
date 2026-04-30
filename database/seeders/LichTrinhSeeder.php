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
                'id_phuong_tien' => 2, // Xe du lịch 16 chỗ
                'tieu_de_hoat_dong' => 'Khởi hành từ trung tâm Đà Nẵng, đi cáp treo tham quan Cầu Vàng.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 1,
                'id_diem_den' => 2, // Làng Pháp
                'id_phuong_tien' => null, // Đi bộ
                'tieu_de_hoat_dong' => 'Khám phá Làng Pháp, vui chơi tại Fantasy Park và ăn trưa buffet.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 2: Hạ Long (id_tour = 2)
            [
                'id_tour' => 2,
                'id_diem_den' => 3, // Vịnh Hạ Long trên cao
                'id_phuong_tien' => 6, // Du thuyền
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
                'id_phuong_tien' => 1, // Xe 45 chỗ
                'tieu_de_hoat_dong' => 'Xe đón khách tại khách sạn di chuyển đến Bãi Sao, tự do tắm biển.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 3,
                'id_diem_den' => 6, // Cáp treo Hòn Thơm
                'id_phuong_tien' => null,
                'tieu_de_hoat_dong' => 'Trải nghiệm cáp treo vượt biển dài nhất thế giới sang đảo Hòn Thơm.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 4: Tà Xùa (id_tour = 4)
            [
                'id_tour' => 4,
                'id_diem_den' => 7, // Săn mây Tà Xùa
                'id_phuong_tien' => 2, // Xe 16 chỗ
                'tieu_de_hoat_dong' => 'Xe đón khách từ Hà Nội lên Sơn La, nghỉ ngơi đón bình minh và săn mây.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 4,
                'id_diem_den' => 8, // Sống lưng khủng long
                'id_phuong_tien' => null,
                'tieu_de_hoat_dong' => 'Trekking dọc Sống lưng khủng long, check-in và chụp ảnh kỷ niệm.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 5: Di sản miền Trung (id_tour = 5)
            [
                'id_tour' => 5,
                'id_diem_den' => 9, // Đại Nội Huế
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Tham quan Đại Nội Huế, nghe HDV thuyết minh về các triều đại nhà Nguyễn.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 5,
                'id_diem_den' => 10, // Phố cổ Hội An
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Di chuyển vào Hội An, dạo bước phố cổ đèn lồng về đêm, thưởng thức ẩm thực.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 6: Đà Lạt (id_tour = 6)
            [
                'id_tour' => 6,
                'id_diem_den' => 11, // Thung lũng tình yêu
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Tham quan Thung lũng tình yêu, đạp vịt trên hồ Đa Thiện lãng mạn.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 6,
                'id_diem_den' => 12, // Quảng trường Lâm Viên
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Tự do check-in tại Quảng trường, nhâm nhi cafe trong nụ hoa Atiso kính.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 7: Miền Tây (id_tour = 7)
            [
                'id_tour' => 7,
                'id_diem_den' => 13, // Chợ nổi Cái Răng
                'id_phuong_tien' => 5, // Ca nô / Tàu thuyền
                'tieu_de_hoat_dong' => 'Ngồi tàu rẽ sóng tham quan chợ nổi, ăn sáng bún riêu trên sông.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 7,
                'id_diem_den' => 14, // Miệt vườn trái cây
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Ghé thăm miệt vườn, tự tay hái trái cây và nghe đờn ca tài tử Nam Bộ.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 8: Fansipan (id_tour = 8)
            [
                'id_tour' => 8,
                'id_diem_den' => 15, // Đỉnh Fansipan
                'id_phuong_tien' => null,
                'tieu_de_hoat_dong' => 'Sử dụng cáp treo lên đỉnh Fansipan, làm lễ tại quần thể tâm linh trên núi.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 8,
                'id_diem_den' => 16, // Bản Cát Cát
                'id_phuong_tien' => 2,
                'tieu_de_hoat_dong' => 'Xe đưa đoàn xuống bản Cát Cát, tìm hiểu đời sống và chụp ảnh cùng người H\'Mông.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 9: Nha Trang (id_tour = 9)
            [
                'id_tour' => 9,
                'id_diem_den' => 17, // Lặn ngắm san hô
                'id_phuong_tien' => 5,
                'tieu_de_hoat_dong' => 'Đi ca nô siêu tốc ra đảo, thay đồ lặn và trải nghiệm lặn biển ngắm san hô.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 9,
                'id_diem_den' => 18, // Tắm bùn Hòn Tằm
                'id_phuong_tien' => 5,
                'tieu_de_hoat_dong' => 'Di chuyển sang Hòn Tằm, nghỉ ngơi phục hồi sức khỏe với dịch vụ tắm bùn khoáng.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 10: Ninh Bình (id_tour = 10)
            [
                'id_tour' => 10,
                'id_diem_den' => 19, // Danh thắng Tràng An
                'id_phuong_tien' => null,
                'tieu_de_hoat_dong' => 'Ngồi đò chèo tay dọc theo dòng Ngô Đồng, xuyên qua các hang động kỳ bí.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 10,
                'id_diem_den' => 20, // Chùa Bái Đính
                'id_phuong_tien' => 7, // Xe điện
                'tieu_de_hoat_dong' => 'Sử dụng xe điện di chuyển vào khuôn viên chùa, tham quan hành lang La Hán.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 11: Chiang Mai - Chiang Rai
            [
                'id_tour' => 11,
                'id_diem_den' => 21, // Chùa Trắng
                'id_phuong_tien' => 1, // Xe khách
                'tieu_de_hoat_dong' => 'Khởi hành tham quan Chùa Trắng Wat Rong Khun với lối kiến trúc độc lạ.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 11,
                'id_diem_den' => 22, // Làng cổ dài
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Giao lưu và tìm hiểu văn hóa tại ngôi làng của người phụ nữ cổ dài Karen.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 12: Phuket - Đảo Phi Phi
            [
                'id_tour' => 12,
                'id_diem_den' => 23, // Vịnh Maya
                'id_phuong_tien' => 5, // Ca nô
                'tieu_de_hoat_dong' => 'Di chuyển bằng ca nô ra vịnh Maya, tự do tắm biển và lặn ngắm bãi san hô tuyệt đẹp.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 12,
                'id_diem_den' => 24, // Phố cổ Phuket
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Dạo bước khám phá Phố cổ Phuket với các tòa nhà kiến trúc Sino-Portuguese.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 13: Busan - Làng văn hóa Gamcheon
            [
                'id_tour' => 13,
                'id_diem_den' => 25, // Gamcheon
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Tham quan ngôi làng rực rỡ sắc màu Gamcheon trên đồi, check-in cùng tượng Hoàng tử bé.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 13,
                'id_diem_den' => 26, // Haeundae
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Tản bộ và tận hưởng gió mát tại bãi biển Haeundae sầm uất nhất Hàn Quốc.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 14: Đảo Jeju
            [
                'id_tour' => 14,
                'id_diem_den' => 27, // Đỉnh Seongsan Ilchulbong
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Leo núi nhẹ nhàng, đón bình minh tuyệt đẹp trên đỉnh núi lửa Seongsan Ilchulbong.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 14,
                'id_diem_den' => 28, // Thác nước Cheonjiyeon
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Đi bộ qua con đường sinh thái xanh mát và ngắm vẻ đẹp huyền bí của thác nước Cheonjiyeon.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 15: Hokkaido
            [
                'id_tour' => 15,
                'id_diem_den' => 29, // Khu trượt tuyết Niseko
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Tham gia các hoạt động trượt tuyết vui nhộn giữa tiết trời mùa đông tại Niseko.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 15,
                'id_diem_den' => 30, // Kênh đào Otaru
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Đi dạo dọc bờ kênh Otaru lãng mạn dưới tuyết trắng và mua sắm đồ lưu niệm.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 16: Okinawa
            [
                'id_tour' => 16,
                'id_diem_den' => 31, // Thủy cung Churaumi
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Khám phá hệ sinh thái biển khổng lồ, chiêm ngưỡng cá mập voi tại Thủy cung Churaumi.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 16,
                'id_diem_den' => 32, // Làng Ryukyu Mura
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Tìm hiểu lịch sử và trải nghiệm mặc trang phục truyền thống tại làng văn hóa Ryukyu.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 17: Singapore Night Safari
            [
                'id_tour' => 17,
                'id_diem_den' => 33, // Night Safari
                'id_phuong_tien' => 7, // Xe điện
                'tieu_de_hoat_dong' => 'Ngồi xe điện dạo quanh vườn thú, ngắm nhìn cuộc sống về đêm của các loài thú hoang dã.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 17,
                'id_diem_den' => 34, // Thác nước Jewel
                'id_phuong_tien' => null, // Đi bộ
                'tieu_de_hoat_dong' => 'Tự do chụp ảnh và check-in thác nước trong nhà ấn tượng nhất thế giới tại Jewel Changi.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 18: Singapore Du thuyền
            [
                'id_tour' => 18,
                'id_diem_den' => 35, // Du thuyền Royal Caribbean
                'id_phuong_tien' => 6, // Tàu thủy / Du thuyền
                'tieu_de_hoat_dong' => 'Làm thủ tục lên siêu du thuyền, nhận phòng và thưởng thức đại tiệc buffet đón khách.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 18,
                'id_diem_den' => 36, // Marina Bay
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Du thuyền cập bến Marina Bay, tự do mua sắm và ngắm cảnh trung tâm Singapore lộng lẫy.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // BỔ SUNG LỊCH TRÌNH CHO TOUR 1 (id_tour = 1)
            [
                'id_tour' => 1,
                'id_diem_den' => 37, // Trỏ tới Vườn hoa
                'id_phuong_tien' => null, // Đi bộ tham quan
                'tieu_de_hoat_dong' => 'Dạo bước tham quan Vườn hoa Le Jardin D\'Amour, thỏa sức check-in cùng 9 khu vườn nghệ thuật.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 1,
                'id_diem_den' => 38, // Trỏ tới Hầm rượu
                'id_phuong_tien' => null, // Đi bộ
                'tieu_de_hoat_dong' => 'Tiếp tục di chuyển đến Hầm rượu Debay gần 100 năm tuổi và thưởng thức ly vang Pháp hảo hạng.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // BỔ SUNG LỊCH TRÌNH CHO TOUR 2 (id_tour = 2)
            [
                'id_tour' => 2,
                'id_diem_den' => 39, // Trỏ tới Hang Sửng Sốt
                'id_phuong_tien' => null, // Đi bộ lên hang
                'tieu_de_hoat_dong' => 'Du thuyền cập bến, quý khách đi bộ men theo vách đá để tham quan Hang Sửng Sốt tuyệt đẹp.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 2,
                'id_diem_den' => 40, // Trỏ tới Đảo Ti Tốp
                'id_phuong_tien' => 6, // Lên lại du thuyền di chuyển
                'tieu_de_hoat_dong' => 'Du thuyền đưa đoàn tới Đảo Ti Tốp, tự do tắm biển hoặc chinh phục đỉnh núi ngắm hoàng hôn.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // BỔ SUNG LỊCH TRÌNH CHO TOUR 3 (id_tour = 3)
            [
                'id_tour' => 3,
                'id_diem_den' => 41, // Trỏ tới Grand World
                'id_phuong_tien' => 1, // Đi bằng xe khách của Tour
                'tieu_de_hoat_dong' => 'Xe đưa đoàn tới Grand World - Thành phố không ngủ, dạo bước bên dòng sông Venice thu nhỏ.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 3,
                'id_diem_den' => 42, // Trỏ tới Safari
                'id_phuong_tien' => 7, // Xe điện chuyên dụng của Safari
                'tieu_de_hoat_dong' => 'Lên xe điện chuyên dụng khám phá Vinpearl Safari, trải nghiệm "nhốt người thả thú" ngắm động vật.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            // Lịch trình Tour 19: Malaysia
            [
                'id_tour' => 19,
                'id_diem_den' => 43, // Tháp đôi Petronas
                'id_phuong_tien' => 1, // Xe 45 chỗ
                'tieu_de_hoat_dong' => 'Tập trung tại sảnh, khởi hành tham quan biểu tượng vĩ đại của Malaysia - tháp đôi Petronas.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 19,
                'id_diem_den' => 44, // Động Batu
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Chinh phục 272 bậc thang rực rỡ sắc màu để viếng thăm ngôi đền linh thiêng nằm sâu trong động Batu.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Lịch trình Tour 20: Trung Quốc
            [
                'id_tour' => 20,
                'id_diem_den' => 45, // Tử Cấm Thành
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'HDV dẫn đoàn tiến vào trung tâm Bắc Kinh, khám phá kiến trúc vĩ đại của Cố Cung (Tử Cấm Thành).',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 20,
                'id_diem_den' => 46, // Vạn Lý Trường Thành
                'id_phuong_tien' => null, // Thường là đi bộ / cáp treo leo thành
                'tieu_de_hoat_dong' => 'Di chuyển lên Bát Đạt Lĩnh, tự do trekking chinh phục bức tường thành thế kỷ Vạn Lý Trường Thành.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Lịch trình Tour 21: Đài Loan
            [
                'id_tour' => 21,
                'id_diem_den' => 47, // Phố cổ Thập Phần
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Xe đưa đoàn tới Phố cổ Thập Phần. Du khách trải nghiệm viết điều ước lên đèn trời và thả lên không trung.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 21,
                'id_diem_den' => 48, // Tháp Taipei 101
                'id_phuong_tien' => null, // Đi bộ/Thang máy
                'tieu_de_hoat_dong' => 'Đến trung tâm Đài Bắc, mua sắm thả ga và check-in dưới chân tòa tháp Taipei 101 sừng sững.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Lịch trình Tour 22: Bali
            [
                'id_tour' => 22,
                'id_diem_den' => 49, // Cổng trời Handara
                'id_phuong_tien' => 2, // Thường đi Bali dùng xe nhỏ 16 chỗ do đường đồi
                'tieu_de_hoat_dong' => 'Đoàn di chuyển lên vùng cao nguyên, chụp những bức ảnh sống ảo cực chất tại Cổng trời Handara ma mị.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 22,
                'id_diem_den' => 50, // Đền Tanah Lot
                'id_phuong_tien' => 2,
                'tieu_de_hoat_dong' => 'Buổi chiều, tới đền Tanah Lot thưởng ngoạn cảnh hoàng hôn diệu kỳ đỏ rực trên biển Ấn Độ Dương.',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Lịch trình Tour 23: Dubai
            [
                'id_tour' => 23,
                'id_diem_den' => 51, // Tháp Burj Khalifa
                'id_phuong_tien' => 1,
                'tieu_de_hoat_dong' => 'Khởi hành tham quan trung tâm Dubai, chiêm ngưỡng tháp Burj Khalifa và đài phun nước lớn nhất thế giới.',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id_tour' => 23,
                'id_diem_den' => 52, // Sa mạc Safari
                'id_phuong_tien' => 2, // Đổi sang xe chuyên dụng chạy cát (Jeep 7 chỗ/16 chỗ)
                'tieu_de_hoat_dong' => 'Lên xe địa hình chuyên dụng, trải nghiệm cảm giác mạnh vượt đồi cát (Dune Bashing) tại Safari.',
                'created_at' => $now, 'updated_at' => $now,
            ],

        ];

        DB::table('lich_trinhs')->truncate();
        DB::table('lich_trinhs')->delete();
        DB::table('lich_trinhs')->insert($lichTrinhs);
    }
}
