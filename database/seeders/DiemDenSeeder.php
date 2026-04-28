<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiemDenSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $diemDens = [
            // Tour 1: Bà Nà
            [
                'ten_diem_den' => 'Cầu Vàng Bà Nà',
                'mo_ta' => 'Cây cầu nổi tiếng thế giới với thiết kế bàn tay khổng lồ nâng đỡ dải lụa vàng giữa lưng chừng mây.',
                'thanh_pho' => 'Đà Nẵng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://vebanahill.vn/assets/images/hero/golden-bridge-hero.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Làng Pháp',
                'mo_ta' => 'Tái hiện một nước Pháp cổ điển, lãng mạn với những công trình kiến trúc độc đáo như quảng trường, nhà thờ, thị trấn.',
                'thanh_pho' => 'Đà Nẵng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://vebanahill.vn/assets/images/hero/castle-hero.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 2: Hạ Long
            [
                'ten_diem_den' => 'Vịnh Hạ Long trên cao',
                'mo_ta' => 'Chiêm ngưỡng toàn cảnh vịnh Hạ Long - kỳ quan thiên nhiên thế giới với hàng ngàn hòn đảo đá vôi kỳ vĩ.',
                'thanh_pho' => 'Quảng Ninh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://www.vietnamvisa.org.vn/wp-content/uploads/2024/08/Halong-Bay-Vietnam-08.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Chèo thuyền Kayak',
                'mo_ta' => 'Hoạt động trải nghiệm chèo thuyền luồn lách qua các hang động đá vôi tuyệt đẹp trên vịnh Hạ Long.',
                'thanh_pho' => 'Quảng Ninh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/05/12/87/bd/halong-bay.jpg?w=900&h=500&s=1',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 3: Phú Quốc
            [
                'ten_diem_den' => 'Bãi sao Phú Quốc',
                'mo_ta' => 'Một trong những bãi biển đẹp nhất Việt Nam với bờ cát trắng mịn như kem và làn nước trong xanh màu ngọc bích.',
                'thanh_pho' => 'Kiên Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://danatravel.com.vn/data/files/1w-min.png',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Cáp treo Hòn Thơm',
                'mo_ta' => 'Tuyến cáp treo vượt biển dài nhất thế giới, ngắm nhìn toàn cảnh biển đảo nam Phú Quốc tuyệt đẹp từ trên cao.',
                'thanh_pho' => 'Kiên Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-A85dro9C_jO7QskUtkwYPBZLiZ5gkMrD7w&s',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 4: Tà Xùa
            [
                'ten_diem_den' => 'Săn mây Tà Xùa',
                'mo_ta' => 'Trải nghiệm ngắm biển mây cuồn cuộn trên đỉnh Tà Xùa, một trong những thiên đường săn mây đẹp nhất Tây Bắc.',
                'thanh_pho' => 'Sơn La',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://bizweb.dktcdn.net/100/514/927/files/ta-xua.jpg?v=1755681677003',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Sống lưng khủng long',
                'mo_ta' => 'Con đường mòn chênh vênh trên đỉnh núi giống như sống lưng của một chú khủng long khổng lồ chìm trong biển mây.',
                'thanh_pho' => 'Sơn La',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://pystravel.vn/_next/image?url=https%3A%2F%2Fbooking.pystravel.vn%2Fuploads%2Fposts%2Favatar%2F1729750291.jpg&w=3840&q=75',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 5: Di sản miền Trung
            [
                'ten_diem_den' => 'Đại Nội Huế',
                'mo_ta' => 'Quần thể di tích Cố đô Huế, nơi lưu giữ những dấu ấn vàng son của triều đại nhà Nguyễn.',
                'thanh_pho' => 'Thừa Thiên Huế',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRebVDSlJkoxwi_eh9b0aycEnkNDV5vq6AAQQ&s',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Phố cổ Hội An về đêm',
                'mo_ta' => 'Ngắm nhìn khu phố cổ rực rỡ dưới ánh đèn lồng, dạo thuyền thả hoa đăng trên dòng sông Hoài thơ mộng.',
                'thanh_pho' => 'Quảng Nam',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9MyJ9JdGoihybQmWKxKnhMon_zspKspw0eg&s',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 6: Đà Lạt
            [
                'ten_diem_den' => 'Thung lũng tình yêu',
                'mo_ta' => 'Địa danh lãng mạn bậc nhất Đà Lạt với cảnh quan đồi thông, hồ nước và vô vàn các tiểu cảnh check-in tuyệt đẹp.',
                'thanh_pho' => 'Lâm Đồng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://upload.wikimedia.org/wikipedia/commons/c/c7/TLTY2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Quảng trường Lâm Viên',
                'mo_ta' => 'Biểu tượng mới của thành phố Đà Lạt với công trình nụ hoa Atiso và hoa Dã Quỳ khổng lồ làm bằng kính.',
                'thanh_pho' => 'Lâm Đồng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://agslandscape.vn/storage/lo/6h/lo6hofqyhupq07877l1jx001dckp_quang-truong-lam-vien-1.jpeg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 7: Miền Tây
            [
                'ten_diem_den' => 'Chợ nổi Cái Răng',
                'mo_ta' => 'Khu chợ nổi sầm uất mang đậm nét văn hóa đặc trưng của vùng sông nước Đồng bằng sông Cửu Long.',
                'thanh_pho' => 'Cần Thơ',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://canthotourist.vn/public/upload/images/hinh_tour/cho-noi-cai-rang-khu-du-lich-my-khanh1700638771_804820298836395235.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Miệt vườn trái cây',
                'mo_ta' => 'Tham quan và thưởng thức vô vàn các loại trái cây nhiệt đới tươi ngon ngay tại vườn của người dân bản địa.',
                'thanh_pho' => 'Cần Thơ',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/06/vuon-trai-cay-can-tho-3.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 8: Fansipan
            [
                'ten_diem_den' => 'Đỉnh Fansipan',
                'mo_ta' => 'Chạm tay vào cột mốc tọa độ trên đỉnh Fansipan - Nóc nhà Đông Dương với độ cao 3.143m.',
                'thanh_pho' => 'Lào Cai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://booking.muongthanh.com/upload_images/images/H%60/dinh-nui-fansipan.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Bản Cát Cát',
                'mo_ta' => 'Ngôi làng cổ tuyệt đẹp của người H\'Mông nằm e ấp dưới chân núi Hoàng Liên Sơn.',
                'thanh_pho' => 'Lào Cai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://hnm.1cdn.vn/2023/09/23/a357.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 9: Nha Trang
            [
                'ten_diem_den' => 'Lặn ngắm san hô',
                'mo_ta' => 'Khám phá thế giới đại dương đầy màu sắc với những rạn san hô tuyệt đẹp tại vùng biển Nha Trang.',
                'thanh_pho' => 'Khánh Hòa',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://buulong.com.vn/wp-content/uploads/2026/03/lan-ngam-san-ho-nha-trang-5.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Tắm bùn Hòn Tằm',
                'mo_ta' => 'Tận hưởng dịch vụ tắm bùn khoáng nóng thiên nhiên giúp thư giãn và phục hồi sức khỏe trên đảo Hòn Tằm.',
                'thanh_pho' => 'Khánh Hòa',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn.xanhsm.com/2025/02/e0a87a17-tam-bun-hon-tam-2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 10: Ninh Bình
            [
                'ten_diem_den' => 'Danh thắng Tràng An',
                'mo_ta' => 'Di sản thế giới kép được UNESCO công nhận với cảnh quan núi đá vôi tráng lệ và hệ thống hang động xuyên thủy.',
                'thanh_pho' => 'Ninh Bình',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://trangandanhthang.vn/wp-content/uploads/2025/06/khu-du-lich-trang-an-1.png',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Chùa Bái Đính',
                'mo_ta' => 'Quần thể chùa lớn nhất Đông Nam Á với nhiều kỷ lục như tượng Phật bằng đồng dát vàng lớn nhất châu Á.',
                'thanh_pho' => 'Ninh Bình',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://upload.wikimedia.org/wikipedia/commons/b/b2/Chua_Bai_Dinh_X8.JPG',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // ---------------- BỔ SUNG TỪ TOUR 11 ĐẾN 18 ---------------- //

            // Tour 11: Chiang Mai - Chiang Rai
            [
                'ten_diem_den' => 'Chùa Trắng Wat Rong Khun',
                'mo_ta' => 'Ngôi chùa có kiến trúc màu trắng tinh khôi, chạm trổ hoa văn tinh xảo tựa như tuyệt tác nghệ thuật.',
                'thanh_pho' => 'Chiang Rai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://zoomtravel.vn/upload/images/wat-rong-khun-2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Làng Cổ Dài (Karen Village)',
                'mo_ta' => 'Tìm hiểu đời sống và nét đẹp văn hóa độc đáo của những người phụ nữ đeo vòng đồng quanh cổ.',
                'thanh_pho' => 'Chiang Mai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://bizweb.dktcdn.net/100/539/761/articles/kham-pha-lang-co-dai-karen-ky-la-tai-thai-lan-1.jpg?v=1741160430137',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 12: Phuket - Đảo Phi Phi
            [
                'ten_diem_den' => 'Vịnh Maya',
                'mo_ta' => 'Một trong những bãi biển đẹp nhất thế giới, nổi tiếng với dải cát trắng ôm lấy làn nước màu ngọc bích.',
                'thanh_pho' => 'Phuket',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn.tcdulichtphcm.vn/upload/2-2022/images/2022-05-05/1651684789-picture-33-1651684666-909-width1600height1066.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Phố cổ Phuket',
                'mo_ta' => 'Khu phố mang đậm dấu ấn kiến trúc Sino-Portuguese rực rỡ sắc màu, góc check-in tuyệt đẹp.',
                'thanh_pho' => 'Phuket',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/10/pho-co-phuket-4-1024x683.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 13: Busan - Làng văn hóa Gamcheon
            [
                'ten_diem_den' => 'Làng văn hóa Gamcheon',
                'mo_ta' => 'Được ví như "Santorini của Hàn Quốc" với những ngôi nhà nhỏ rực rỡ xếp lớp trên sườn đồi hướng ra biển.',
                'thanh_pho' => 'Busan',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://dulichviet.com.vn/images/bandidau/lang-van-hoa-gamcheon-han-quoc.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Bãi biển Haeundae',
                'mo_ta' => 'Bãi biển lớn và sầm uất nhất Hàn Quốc, nơi thường xuyên diễn ra các lễ hội nhộn nhịp.',
                'thanh_pho' => 'Busan',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/04/bai-bien-haeundae-3.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 14: Đảo Jeju
            [
                'ten_diem_den' => 'Đỉnh Seongsan Ilchulbong',
                'mo_ta' => 'Ngọn núi lửa đã tắt vươn mình ra biển lớn, điểm ngắm bình minh huy hoàng nhất trên đảo Jeju.',
                'thanh_pho' => 'Jeju',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://images2.thanhnien.vn/528068263637045248/2023/11/11/hinh-4-16996721947841223282759.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Thác nước Cheonjiyeon',
                'mo_ta' => 'Thác nước tuyệt đẹp đổ xuống từ vách đá tạo nên bức tranh thiên nhiên hài hòa và thanh bình.',
                'thanh_pho' => 'Jeju',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://tour.dulichvietnam.com.vn/uploads/image/Du-lich-Han-Quoc/Jeju/thac-nuoc-cheonjiyeon-2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 15: Hokkaido
            [
                'ten_diem_den' => 'Khu trượt tuyết Niseko',
                'mo_ta' => 'Thánh địa trượt tuyết với chất lượng tuyết bột mịn màng bậc nhất thế giới.',
                'thanh_pho' => 'Hokkaido',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://file.smiletrip.vn/posts/vi-vn/2025/02/24/1210/khu-truot-tuyet-niseko-hokkaido-2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Kênh đào Otaru',
                'mo_ta' => 'Tản bộ dọc theo kênh đào lãng mạn được thắp sáng bởi những ánh đèn dịu nhẹ giữa màn tuyết trắng.',
                'thanh_pho' => 'Hokkaido',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://nippontravel.vn/wp-content/uploads/2023/08/kenh-dao-otaru-vao-ban-dem-1.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 16: Okinawa
            [
                'ten_diem_den' => 'Thủy cung Churaumi',
                'mo_ta' => 'Khám phá một trong những thủy cung lớn nhất thế giới, nổi tiếng với bể cá khổng lồ nuôi cá mập voi.',
                'thanh_pho' => 'Okinawa',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://songhantourist.com/upload/articles-images/images/196525899_4194618430599188_3636582163606984655_n.jpeg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Làng văn hóa Ryukyu Mura',
                'mo_ta' => 'Ngôi làng chủ đề tái hiện lại những giá trị lịch sử và phong tục tập quán truyền thống của người Okinawa.',
                'thanh_pho' => 'Okinawa',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://images.trvl-media.com/place/6270754/df070d95-847c-496c-9ba4-c3c890ec1fbf.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 17: Singapore Night Safari
            [
                'ten_diem_den' => 'Night Safari',
                'mo_ta' => 'Khám phá vườn thú đêm đầu tiên trên thế giới, quan sát sinh hoạt về đêm của hàng ngàn loài động vật hoang dã.',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://chiangmainightsafari.com/wp-content/uploads/2019/08/%E0%B8%8A%E0%B8%99%E0%B8%B4%E0%B8%99%E0%B8%97%E0%B8%A3%E0%B9%8C-%E0%B9%81%E0%B8%8B%E0%B9%88%E0%B8%9F%E0%B8%B8%E0%B9%89%E0%B8%87_ANA_6398-scaled.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Thác nước Jewel Changi',
                'mo_ta' => 'Choáng ngợp trước thác nước trong nhà cao nhất thế giới Rain Vortex bao quanh bởi khu vườn sinh thái.',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/06/jewel-changi-1.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 18: Singapore Du thuyền
            [
                'ten_diem_den' => 'Siêu du thuyền Royal Caribbean',
                'mo_ta' => 'Tận hưởng chuyến đi xa hoa với bể bơi, casino, nhà hát và đại tiệc buffet trên con tàu đẳng cấp quốc tế.',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://dulichduthuyen.com.vn/tour-du-thuyen/vnt_upload/news/10_2019/du-thuyen-royal-caribbean_3.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'ten_diem_den' => 'Vịnh Marina Bay',
                'mo_ta' => 'Vịnh biểu tượng của quốc đảo sư tử, nơi quy tụ những công trình kiến trúc hiện đại và lộng lẫy nhất.',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://media.vietravel.com/images/Content/du-lich-marina-bay-sands-1.png',
                'created_at' => $now, 'updated_at' => $now,
            ]
        ];

        DB::table('diem_dens')->truncate();
        DB::table('diem_dens')->delete();
        DB::table('diem_dens')->insert($diemDens);
    }
}
