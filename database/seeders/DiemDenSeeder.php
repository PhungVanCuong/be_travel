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
                'id' => 1,
                'ten_diem_den' => 'Cầu Vàng Bà Nà',
                'mo_ta' => 'Cây cầu nổi tiếng thế giới với thiết kế bàn tay khổng lồ nâng đỡ dải lụa vàng giữa lưng chừng mây.',
                'thanh_pho' => 'Đà Nẵng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://vebanahill.vn/assets/images/hero/golden-bridge-hero.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 2,
                'ten_diem_den' => 'Làng Pháp',
                'mo_ta' => 'Tái hiện một nước Pháp cổ điển, lãng mạn với những công trình kiến trúc độc đáo như quảng trường, nhà thờ, thị trấn.',
                'thanh_pho' => 'Đà Nẵng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://vebanahill.vn/assets/images/hero/castle-hero.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 2: Hạ Long
            [
                'id' => 3,
                'ten_diem_den' => 'Vịnh Hạ Long trên cao',
                'mo_ta' => 'Chiêm ngưỡng toàn cảnh vịnh Hạ Long - kỳ quan thiên nhiên thế giới với hàng ngàn hòn đảo đá vôi kỳ vĩ.',
                'thanh_pho' => 'Quảng Ninh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://www.vietnamvisa.org.vn/wp-content/uploads/2024/08/Halong-Bay-Vietnam-08.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 4,
                'ten_diem_den' => 'Chèo thuyền Kayak',
                'mo_ta' => 'Hoạt động trải nghiệm chèo thuyền luồn lách qua các hang động đá vôi tuyệt đẹp trên vịnh Hạ Long.',
                'thanh_pho' => 'Quảng Ninh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/05/12/87/bd/halong-bay.jpg?w=900&h=500&s=1',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 3: Phú Quốc
            [
                'id' => 5,
                'ten_diem_den' => 'Bãi sao Phú Quốc',
                'mo_ta' => 'Một trong những bãi biển đẹp nhất Việt Nam với bờ cát trắng mịn như kem và làn nước trong xanh màu ngọc bích.',
                'thanh_pho' => 'Kiên Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://danatravel.com.vn/data/files/1w-min.png',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 6,
                'ten_diem_den' => 'Cáp treo Hòn Thơm',
                'mo_ta' => 'Tuyến cáp treo vượt biển dài nhất thế giới, ngắm nhìn toàn cảnh biển đảo nam Phú Quốc tuyệt đẹp từ trên cao.',
                'thanh_pho' => 'Kiên Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-A85dro9C_jO7QskUtkwYPBZLiZ5gkMrD7w&s',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 4: Tà Xùa
            [
                'id' => 7,
                'ten_diem_den' => 'Săn mây Tà Xùa',
                'mo_ta' => 'Trải nghiệm ngắm biển mây cuồn cuộn trên đỉnh Tà Xùa, một trong những thiên đường săn mây đẹp nhất Tây Bắc.',
                'thanh_pho' => 'Sơn La',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://bizweb.dktcdn.net/100/514/927/files/ta-xua.jpg?v=1755681677003',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 8,
                'ten_diem_den' => 'Sống lưng khủng long',
                'mo_ta' => 'Con đường mòn chênh vênh trên đỉnh núi giống như sống lưng của một chú khủng long khổng lồ chìm trong biển mây.',
                'thanh_pho' => 'Sơn La',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://pystravel.vn/_next/image?url=https%3A%2F%2Fbooking.pystravel.vn%2Fuploads%2Fposts%2Favatar%2F1729750291.jpg&w=3840&q=75',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 5: Di sản miền Trung
            [
                'id' => 9,
                'ten_diem_den' => 'Đại Nội Huế',
                'mo_ta' => 'Quần thể di tích Cố đô Huế, nơi lưu giữ những dấu ấn vàng son của triều đại nhà Nguyễn.',
                'thanh_pho' => 'Thừa Thiên Huế',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRebVDSlJkoxwi_eh9b0aycEnkNDV5vq6AAQQ&s',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 10,
                'ten_diem_den' => 'Phố cổ Hội An về đêm',
                'mo_ta' => 'Ngắm nhìn khu phố cổ rực rỡ dưới ánh đèn lồng, dạo thuyền thả hoa đăng trên dòng sông Hoài thơ mộng.',
                'thanh_pho' => 'Quảng Nam',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9MyJ9JdGoihybQmWKxKnhMon_zspKspw0eg&s',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 6: Đà Lạt
            [
                'id' => 11,
                'ten_diem_den' => 'Thung lũng tình yêu',
                'mo_ta' => 'Địa danh lãng mạn bậc nhất Đà Lạt với cảnh quan đồi thông, hồ nước và vô vàn các tiểu cảnh check-in tuyệt đẹp.',
                'thanh_pho' => 'Lâm Đồng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://upload.wikimedia.org/wikipedia/commons/c/c7/TLTY2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 12,
                'ten_diem_den' => 'Quảng trường Lâm Viên',
                'mo_ta' => 'Biểu tượng mới của thành phố Đà Lạt với công trình nụ hoa Atiso và hoa Dã Quỳ khổng lồ làm bằng kính.',
                'thanh_pho' => 'Lâm Đồng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://agslandscape.vn/storage/lo/6h/lo6hofqyhupq07877l1jx001dckp_quang-truong-lam-vien-1.jpeg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 7: Miền Tây
            [
                'id' => 13,
                'ten_diem_den' => 'Chợ nổi Cái Răng',
                'mo_ta' => 'Khu chợ nổi sầm uất mang đậm nét văn hóa đặc trưng của vùng sông nước Đồng bằng sông Cửu Long.',
                'thanh_pho' => 'Cần Thơ',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://canthotourist.vn/public/upload/images/hinh_tour/cho-noi-cai-rang-khu-du-lich-my-khanh1700638771_804820298836395235.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 14,
                'ten_diem_den' => 'Miệt vườn trái cây',
                'mo_ta' => 'Tham quan và thưởng thức vô vàn các loại trái cây nhiệt đới tươi ngon ngay tại vườn của người dân bản địa.',
                'thanh_pho' => 'Cần Thơ',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/06/vuon-trai-cay-can-tho-3.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 8: Fansipan
            [
                'id' => 15,
                'ten_diem_den' => 'Đỉnh Fansipan',
                'mo_ta' => 'Chạm tay vào cột mốc tọa độ trên đỉnh Fansipan - Nóc nhà Đông Dương với độ cao 3.143m.',
                'thanh_pho' => 'Lào Cai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://booking.muongthanh.com/upload_images/images/H%60/dinh-nui-fansipan.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 16,
                'ten_diem_den' => 'Bản Cát Cát',
                'mo_ta' => 'Ngôi làng cổ tuyệt đẹp của người H\'Mông nằm e ấp dưới chân núi Hoàng Liên Sơn.',
                'thanh_pho' => 'Lào Cai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://hnm.1cdn.vn/2023/09/23/a357.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 9: Nha Trang
            [
                'id' => 17,
                'ten_diem_den' => 'Lặn ngắm san hô',
                'mo_ta' => 'Khám phá thế giới đại dương đầy màu sắc với những rạn san hô tuyệt đẹp tại vùng biển Nha Trang.',
                'thanh_pho' => 'Khánh Hòa',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://buulong.com.vn/wp-content/uploads/2026/03/lan-ngam-san-ho-nha-trang-5.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 18,
                'ten_diem_den' => 'Tắm bùn Hòn Tằm',
                'mo_ta' => 'Tận hưởng dịch vụ tắm bùn khoáng nóng thiên nhiên giúp thư giãn và phục hồi sức khỏe trên đảo Hòn Tằm.',
                'thanh_pho' => 'Khánh Hòa',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn.xanhsm.com/2025/02/e0a87a17-tam-bun-hon-tam-2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 10: Ninh Bình
            [
                'id' => 19,
                'ten_diem_den' => 'Danh thắng Tràng An',
                'mo_ta' => 'Di sản thế giới kép được UNESCO công nhận với cảnh quan núi đá vôi tráng lệ và hệ thống hang động xuyên thủy.',
                'thanh_pho' => 'Ninh Bình',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://trangandanhthang.vn/wp-content/uploads/2025/06/khu-du-lich-trang-an-1.png',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 20,
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
                'id' => 21,
                'ten_diem_den' => 'Chùa Trắng Wat Rong Khun',
                'mo_ta' => 'Ngôi chùa có kiến trúc màu trắng tinh khôi, chạm trổ hoa văn tinh xảo tựa như tuyệt tác nghệ thuật.',
                'thanh_pho' => 'Chiang Rai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://zoomtravel.vn/upload/images/wat-rong-khun-2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 22,
                'ten_diem_den' => 'Làng Cổ Dài (Karen Village)',
                'mo_ta' => 'Tìm hiểu đời sống và nét đẹp văn hóa độc đáo của những người phụ nữ đeo vòng đồng quanh cổ.',
                'thanh_pho' => 'Chiang Mai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://bizweb.dktcdn.net/100/539/761/articles/kham-pha-lang-co-dai-karen-ky-la-tai-thai-lan-1.jpg?v=1741160430137',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 12: Phuket - Đảo Phi Phi
            [
                'id' => 23,
                'ten_diem_den' => 'Vịnh Maya',
                'mo_ta' => 'Một trong những bãi biển đẹp nhất thế giới, nổi tiếng với dải cát trắng ôm lấy làn nước màu ngọc bích.',
                'thanh_pho' => 'Phuket',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn.tcdulichtphcm.vn/upload/2-2022/images/2022-05-05/1651684789-picture-33-1651684666-909-width1600height1066.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 24,
                'ten_diem_den' => 'Phố cổ Phuket',
                'mo_ta' => 'Khu phố mang đậm dấu ấn kiến trúc Sino-Portuguese rực rỡ sắc màu, góc check-in tuyệt đẹp.',
                'thanh_pho' => 'Phuket',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/10/pho-co-phuket-4-1024x683.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 13: Busan - Làng văn hóa Gamcheon
            [
                'id' => 25,
                'ten_diem_den' => 'Làng văn hóa Gamcheon',
                'mo_ta' => 'Được ví như "Santorini của Hàn Quốc" với những ngôi nhà nhỏ rực rỡ xếp lớp trên sườn đồi hướng ra biển.',
                'thanh_pho' => 'Busan',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://dulichviet.com.vn/images/bandidau/lang-van-hoa-gamcheon-han-quoc.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 26,
                'ten_diem_den' => 'Bãi biển Haeundae',
                'mo_ta' => 'Bãi biển lớn và sầm uất nhất Hàn Quốc, nơi thường xuyên diễn ra các lễ hội nhộn nhịp.',
                'thanh_pho' => 'Busan',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/04/bai-bien-haeundae-3.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 14: Đảo Jeju
            [
                'id' => 27,
                'ten_diem_den' => 'Đỉnh Seongsan Ilchulbong',
                'mo_ta' => 'Ngọn núi lửa đã tắt vươn mình ra biển lớn, điểm ngắm bình minh huy hoàng nhất trên đảo Jeju.',
                'thanh_pho' => 'Jeju',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://images2.thanhnien.vn/528068263637045248/2023/11/11/hinh-4-16996721947841223282759.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 28,
                'ten_diem_den' => 'Thác nước Cheonjiyeon',
                'mo_ta' => 'Thác nước tuyệt đẹp đổ xuống từ vách đá tạo nên bức tranh thiên nhiên hài hòa và thanh bình.',
                'thanh_pho' => 'Jeju',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://tour.dulichvietnam.com.vn/uploads/image/Du-lich-Han-Quoc/Jeju/thac-nuoc-cheonjiyeon-2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 15: Hokkaido
            [
                'id' => 29,
                'ten_diem_den' => 'Khu trượt tuyết Niseko',
                'mo_ta' => 'Thánh địa trượt tuyết với chất lượng tuyết bột mịn màng bậc nhất thế giới.',
                'thanh_pho' => 'Hokkaido',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://file.smiletrip.vn/posts/vi-vn/2025/02/24/1210/khu-truot-tuyet-niseko-hokkaido-2.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 30,
                'ten_diem_den' => 'Kênh đào Otaru',
                'mo_ta' => 'Tản bộ dọc theo kênh đào lãng mạn được thắp sáng bởi những ánh đèn dịu nhẹ giữa màn tuyết trắng.',
                'thanh_pho' => 'Hokkaido',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://nippontravel.vn/wp-content/uploads/2023/08/kenh-dao-otaru-vao-ban-dem-1.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 16: Okinawa
            [
                'id' => 31,
                'ten_diem_den' => 'Thủy cung Churaumi',
                'mo_ta' => 'Khám phá một trong những thủy cung lớn nhất thế giới, nổi tiếng với bể cá khổng lồ nuôi cá mập voi.',
                'thanh_pho' => 'Okinawa',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://songhantourist.com/upload/articles-images/images/196525899_4194618430599188_3636582163606984655_n.jpeg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 32,
                'ten_diem_den' => 'Làng văn hóa Ryukyu Mura',
                'mo_ta' => 'Ngôi làng chủ đề tái hiện lại những giá trị lịch sử và phong tục tập quán truyền thống của người Okinawa.',
                'thanh_pho' => 'Okinawa',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://images.trvl-media.com/place/6270754/df070d95-847c-496c-9ba4-c3c890ec1fbf.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 17: Singapore Night Safari
            [
                'id' => 33,
                'ten_diem_den' => 'Night Safari',
                'mo_ta' => 'Khám phá vườn thú đêm đầu tiên trên thế giới, quan sát sinh hoạt về đêm của hàng ngàn loài động vật hoang dã.',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://chiangmainightsafari.com/wp-content/uploads/2019/08/%E0%B8%8A%E0%B8%99%E0%B8%B4%E0%B8%99%E0%B8%97%E0%B8%A3%E0%B9%8C-%E0%B9%81%E0%B8%8B%E0%B9%88%E0%B8%9F%E0%B8%B8%E0%B9%89%E0%B8%87_ANA_6398-scaled.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 34,
                'ten_diem_den' => 'Thác nước Jewel Changi',
                'mo_ta' => 'Choáng ngợp trước thác nước trong nhà cao nhất thế giới Rain Vortex bao quanh bởi khu vườn sinh thái.',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/06/jewel-changi-1.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 18: Singapore Du thuyền
            [
                'id' => 35,
                'ten_diem_den' => 'Siêu du thuyền Royal Caribbean',
                'mo_ta' => 'Tận hưởng chuyến đi xa hoa với bể bơi, casino, nhà hát và đại tiệc buffet trên con tàu đẳng cấp quốc tế.',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://dulichduthuyen.com.vn/tour-du-thuyen/vnt_upload/news/10_2019/du-thuyen-royal-caribbean_3.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 36,
                'ten_diem_den' => 'Vịnh Marina Bay',
                'mo_ta' => 'Vịnh biểu tượng của quốc đảo sư tử, nơi quy tụ những công trình kiến trúc hiện đại và lộng lẫy nhất.',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://media.vietravel.com/images/Content/du-lich-marina-bay-sands-1.png',
                'created_at' => $now, 'updated_at' => $now,
            ],
            // Tour 1 (Bổ sung)
            [
                'id' => 37,
                'ten_diem_den' => 'Vườn hoa Le Jardin D\'Amour',
                'mo_ta' => 'Khám phá 9 khu vườn mang 9 cung bậc cảm xúc khác nhau với muôn ngàn sắc hoa rực rỡ tuyệt đẹp.',
                'thanh_pho' => 'Đà Nẵng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://sun-ecommerce-cdn.azureedge.net/ecommerce/service-sites/asset/SunWorldBaNaHill/swold/vuon-hoa-le-jardin/DSC05966.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 38,
                'ten_diem_den' => 'Hầm Rượu Debay',
                'mo_ta' => 'Công trình kiến trúc độc đáo do người Pháp xây dựng xuyên sâu trong lòng núi Bà Nà từ năm 1923.',
                'thanh_pho' => 'Đà Nẵng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://tourbanahills.vn/wp-content/uploads/2022/03/ham-ruou-debay-4.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 2 (Bổ sung)
            [
                'id' => 39,
                'ten_diem_den' => 'Hang Sửng Sốt',
                'mo_ta' => 'Một trong những hang động rộng và đẹp bậc nhất vịnh Hạ Long với những thạch nhũ muôn hình vạn trạng.',
                'thanh_pho' => 'Quảng Ninh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://statics.vinpearl.com/hang-sung-sot-2_1627633591.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 40,
                'ten_diem_den' => 'Đảo Ti Tốp',
                'mo_ta' => 'Hòn đảo có bãi tắm vầng trăng khuyết tĩnh lặng, du khách có thể leo lên đỉnh núi để ngắm toàn cảnh vịnh.',
                'thanh_pho' => 'Quảng Ninh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://statics.vinpearl.com/dao-titop-quang-ninh-02_1625285135.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 3 (Bổ sung)
            [
                'id' => 41,
                'ten_diem_den' => 'Grand World Phú Quốc',
                'mo_ta' => 'Thành phố không ngủ với kiến trúc châu Âu tráng lệ, dòng sông Venice thơ mộng và các show diễn thực cảnh hoành tráng.',
                'thanh_pho' => 'Kiên Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://mia.vn/media/uploads/blog-du-lich/grand-world-phu-quoc-kham-pha-thien-duong-giai-tri-day-soi-dong-01-1661257653.jpeg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 42,
                'ten_diem_den' => 'Vinpearl Safari Phú Quốc',
                'mo_ta' => 'Công viên chăm sóc và bảo tồn động vật bán hoang dã lớn nhất Việt Nam với trải nghiệm "nhốt người thả thú" độc đáo.',
                'thanh_pho' => 'Kiên Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn3.ivivu.com/2024/01/vinpearl-safari-phu-quoc-ivivu-1.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // ================= 10 ĐIỂM ĐẾN MỚI CHO 5 TOUR QUỐC TẾ ================= //
            // Tour 19: Malaysia
            [
                'id' => 43,
                'ten_diem_den' => 'Tháp đôi Petronas',
                'mo_ta' => 'Tòa tháp đôi cao nhất thế giới với kiến trúc Hồi giáo ấn tượng, biểu tượng kiêu hãnh của Malaysia.',
                'thanh_pho' => 'Kuala Lumpur',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://phuotvivu.com/blog/wp-content/uploads/2018/10/thap-doi-petronas-kuala-lumpur-malaysia.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 44,
                'ten_diem_den' => 'Động Batu',
                'mo_ta' => 'Hệ thống hang động đá vôi cổ kính và là ngôi đền Hindu linh thiêng với bức tượng thần Murugan mạ vàng khổng lồ.',
                'thanh_pho' => 'Selangor',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://www.luavietours.com/wp/wp-content/uploads/2023/10/1-dong-batu-noi-bat-voi-cac-cong-trinh-kien-truc-tieu-bieu.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 20: Trung Quốc
            [
                'id' => 45,
                'ten_diem_den' => 'Tử Cấm Thành',
                'mo_ta' => 'Cung điện hoàng gia lớn nhất thế giới, nơi ngự trị của 24 vị hoàng đế triều Minh và triều Thanh.',
                'thanh_pho' => 'Bắc Kinh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://phetravel.com/uploads/tu-cam-thanh-19.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 46,
                'ten_diem_den' => 'Vạn Lý Trường Thành',
                'mo_ta' => 'Bức tường thành vĩ đại trải dài hàng vạn dặm trên những rặng núi non hiểm trở của đất nước tỷ dân.',
                'thanh_pho' => 'Bắc Kinh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://www.thanglongtravel.vn/Portals/28207/traffic/van-ly-truong-thanh.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 21: Đài Loan
            [
                'id' => 47,
                'ten_diem_den' => 'Phố cổ Thập Phần',
                'mo_ta' => 'Khu phố nhuốm màu hoài cổ chạy dọc theo đường ray xe lửa, nơi du khách có thể viết nguyện ước lên đèn trời.',
                'thanh_pho' => 'Tân Bắc',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://ik.imagekit.io/tvlk/blog/2023/08/Thap-Phan-10.jpg?tr=q-70,c-at_max,w-1000,h-600',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 48,
                'ten_diem_den' => 'Tháp Taipei 101',
                'mo_ta' => 'Tòa nhà cao 101 tầng với thiết kế tựa nhánh tre vươn lên bầu trời xanh, điểm ngắm toàn cảnh Đài Bắc tuyệt đẹp.',
                'thanh_pho' => 'Đài Bắc',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://vietluxtour.com/Upload/images/2023/KhamPhaNuocNgoai/Th%C3%A1p%20Taipei%20101/thap-taipei-101%20(5)-min.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 22: Bali
            [
                'id' => 49,
                'ten_diem_den' => 'Cổng trời Handara',
                'mo_ta' => 'Cánh cổng đá chẻ đôi huyền thoại nằm giữa những mảng xanh của núi rừng, biểu tượng check-in không thể bỏ lỡ tại Bali.',
                'thanh_pho' => 'Bali',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://s3-cmc.travel.com.vn/vtv-image/Images/Tour/tfd__0_3557_tanahlottemple.webp',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 50,
                'ten_diem_den' => 'Đền Tanah Lot',
                'mo_ta' => 'Ngôi đền Hindu độc đáo ngự trên hòn đá chênh vênh giữa biển khơi, được mệnh danh là nơi ngắm hoàng hôn đẹp nhất Bali.',
                'thanh_pho' => 'Bali',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://dulichdisanviet.vn/lib/ckeditor/images/den-tanah-lot-bali-indo.jpg',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // Tour 23: Dubai
            [
                'id' => 51,
                'ten_diem_den' => 'Tháp Burj Khalifa',
                'mo_ta' => 'Kiệt tác kiến trúc nhân tạo cao nhất thế giới vươn lên giữa tầng mây, minh chứng cho sự phồn vinh của Dubai.',
                'thanh_pho' => 'Dubai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://vcdn1-vnexpress.vnecdn.net/2022/08/24/Thanhphotronset-1661312598-8302-1661313189.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=co2NbySABqt9yLEwqs8X_g',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'id' => 52,
                'ten_diem_den' => 'Sa mạc Safari',
                'mo_ta' => 'Trải nghiệm mạo hiểm đua xe địa hình trên những đụn cát vàng óng ả, ngắm hoàng hôn rực rỡ và xem múa bụng nghệ thuật.',
                'thanh_pho' => 'Dubai',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://media.vietravel.com/images/Content/du-lich-sa-mac-safari-dubai--3-.png',
                'created_at' => $now, 'updated_at' => $now,
            ],
        ];

        DB::table('diem_dens')->truncate();
        DB::table('diem_dens')->delete();
        DB::table('diem_dens')->insert($diemDens);
    }
}
