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
        ];

        DB::table('diem_dens')->truncate();
        DB::table('diem_dens')->delete();
        DB::table('diem_dens')->insert($diemDens);
    }
}
