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
    // ================= TOUR Trong nước =================

        'id' => 1,
        'ten_tour' => 'Tour Đà Lạt 3N3Đ: HCM - Langbiang Land - Fresh Garden - Thiên Đường Săn Mây',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Săn mây tuyệt đẹp tại thiên đường săn mây vào bình minh.</li><li>Khám phá Fresh Garden: tổ hợp vườn hoa, sở thú trong nhà và khu vui chơi đa dạng.</li><li>Thưởng thức không gian văn hóa Cồng Chiêng Tây Nguyên đặc sắc tại LangBiang Land.</li><li>Khám phá Langbiang Land với khu vui chơi, vườn thú, vườn dâu và nhiều góc check-in độc đáo.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Xe ghế ngồi vận chuyển theo chương trình.</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tiêu chuẩn 3* địa phương (2-3 khách/phòng).</li></ul><p><strong>Khác:</strong></p><ul><li>Vé tham quan theo chương trình.</li><li>Các bữa ăn theo lịch trình (đảm bảo số lượng & chất lượng tương đương nếu có điều chỉnh).</li><li>01 chai nước suối/khách/ngày.</li><li>Bảo hiểm du lịch nội địa suốt tuyến.</li><li>HDV địa phương phục vụ suốt hành trình.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn: 950.000 đ/Khách.</li><li>Phụ thu khách nước ngoài: 500.000 đ/khách.</li><li>Phụ thu ghế ngồi cho bé dưới 05 tuổi (nếu có nhu cầu): 400.000 đ/khách.</li><li>Tips cho tài xế địa phương và hướng dẫn viên.</li><li>Chi phí cá nhân: hành lý quá cước, điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình</li></ul>',
        'gia' => 2888000.00,
        'ngay_bat_dau' => '2026-07-09',
        'ngay_ket_thuc' => '2026-07-12',
        'so_nguoi_toi_da' => 40,
        'diem_don' => 'Nhà Văn Hóa Thanh Niên số 4 Phạm Ngọc Thạch, Quận 1, TP. Hồ Chí Minh',
        'diem_tra' => 'Nhà Văn Hóa Thanh Niên số 4 Phạm Ngọc Thạch, Quận 1, TP. Hồ Chí Minh',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2026/04/10/09/san-may-da-lat-ivv-450x265.gif',
        'id_quoc_gia' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ],
    // ================= TOUR 2 =================
    [
        'id' => 2,
        'ten_tour' => 'Tour Miền Bắc 5N4Đ: HCM - Hà Giang - Đồng Văn - Cao Bằng - Sông Nho Quế',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Chinh phục đèo Mã Pì Lèng: cung đèo đẹp nhất Việt Nam.</li><li>Check-in Cột cờ Lũng Cú: điểm cực Bắc thiêng liêng của Tổ quốc.</li><li>Ngắm sông Nho Quế và hẻm Tu Sản: tuyệt tác thiên nhiên Hà Giang.</li><li>Khám phá Cao nguyên đá Đồng Văn: kỳ quan đá giữa trời Đông Bắc.</li><li>Chiêm ngưỡng Thác Bản Giốc: thác nước hùng vĩ bậc nhất Đông Nam Á.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Vé máy bay khứ hồi theo đoàn, hãng Sun PhuQuoc Airways (07kg xách tay + 01 kiện 20kg ký gửi).</li><li>Xe du lịch 16 - 45 chỗ đời mới máy lạnh, ghế bật.</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tiêu chuẩn 3* địa phương (2 khách/phòng; khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li><li>Khách sạn tiếu chuẩn 5* địa phương: Mường Thanh (2 khách/phòng; khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Vé tham quan theo chương trình.</li><li>Các bữa ăn theo lịch trình (đảm bảo số lượng & chất lượng tương đương nếu có điều chỉnh).</li><li>01 chai nước suối/khách/ngày.</li><li>Bảo hiểm du lịch nội địa suốt tuyến.</li><li>HDV địa phương phục vụ suốt hành trình.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn: 1.500.000 đ/khách. Lễ, Tết: 1.800.000 đ/khách.</li><li>Phụ thu khách nước ngoài: 300.000 đ/khách.</li><li>Tips cho tài xế địa phương và hướng dẫn viên.</li><li>Chi phí cá nhân: hành lý quá cước, điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình, ...</li><li>Xe điện tại các điểm tham quan, thuyền sông Nho Quế, nước uống tại các quán coffe.</li></ul>',
        'gia' => 10990000.00,
        'ngay_bat_dau' => '2026-07-15',
        'ngay_ket_thuc' => '2026-07-19',
        'so_nguoi_toi_da' => 30,
        'diem_don' => 'sân bay Tân Sơn Nhất, TP. Hồ Chí Minh',
        'diem_tra' => 'khu vực sân bay Nội Bài',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2026/06/15/14/lang-pa-vi-ha-ivv-1-450x265.png',
        'id_quoc_gia' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ],

            [
    'id' => 3,
    'ten_tour' => 'Tour Miền Trung 4N3Đ: HCM - Đà Nẵng - Hội An - Huế - Quảng Bình - Động Phong Nha',
    'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Check-in Bán đảo Sơn Trà: chùa Linh Ứng và tắm biển Mỹ Khê.</li><li>Ngắm Vịnh Lăng Cô, tham quan Đại Nội và chùa Thiên Mụ giữa Cố đô Huế.</li><li>Khám phá Ngũ Hành Sơn, Làng đá Non Nước và phố cổ Hội An lung linh đèn lồng.</li><li>Trải nghiệm cáp treo Bà Nà Hills, tham quan Fantasy Park & viếng chùa Linh Ứng Bà Nà.</li><li>Du ngoạn thuyền trên sông Son, khám phá Động Phong Nha kỳ vĩ Di sản thiên nhiên thế giới.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Vé máy bay khứ hồi Bamboo Airways. Thuế và phí sân bay. bao gồm hành lý 07kg xách tay + 20kg ký gửi</li><li>Xe du lịch đưa đón tham quan theo chương trình.</li><li>Thuyền đi Động Phong Nha.</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tiêu chuẩn 4 sao địa phương (2 khách/phòng; khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Ăn các bữa theo chương trình.</li><li>Vé tại các điểm tham quan.</li><li>Hướng dẫn viên tiếng Việt theo đoàn suốt tuyến.</li><li>Phục vụ 01 chai 0.5l/khách /ngày</li><li>Bảo hiểm du lịch.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn (nếu có): 1.500.000đ/tour.</li><li>Vé Cáp treo Bà Nà + buffet: 1.250.000đ/khách.</li><li>Phụ thu ngoại quốc: 500.000đ/tour (Đối với khách nước ngoài ).</li><li>Một bữa tối ngày 1 tại Phố Cổ Hội An.</li><li>Các phát sinh cá nhân khác ngoài chương trình.</li></ul>',
    'gia' => 6990000.00,
    'ngay_bat_dau' => '2026-08-20',
    'ngay_ket_thuc' => '2026-08-23',
    'so_nguoi_toi_da' => 25,
    'diem_don' => 'sân bay Tân Sơn Nhất, TP. Hồ Chí Minh',
    'diem_tra' => 'sân bay Đà Nẵng, TP. Đà Nẵng',
    'tinh_trang' => 1,
    'hinh_anh' => 'https://cdn2.ivivu.com/2025/04/15/10/cau-vang-ivv-450x265.gif',
    'id_quoc_gia' => 1,
    'created_at' => $now,
    'updated_at' => $now,
],
            [
        'id' => 4,
        'ten_tour' => 'Tour Phan Thiết 2N1Đ: HCM - Phan Thiết - Mũi Né - Bikini Beach - Bàu Trắng',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Ngắm cảnh biển xanh và dạo bước trên bãi cát dài tại Mũi Né.</li><li>Trải nghiệm độc đáo, hấp dẫn tại Bàu Trắng bằng xe Jeep địa hình.</li><li>Tự do khám phá trò chơi cảm giác mạnh tại công viên giải trí Circus Land.</li><li>Tham quan Bikini Beach và check-in với các biểu tượng khổng lồ và góc sống ảo độc đáo.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Xe du lịch đời mới 16, 29, 45 chỗ, máy lạnh phục vụ đoàn suốt tuyến.</li><li>Xe Jeep tại Bàu Trắng (6-8 khách/xe)</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Resort 3 sao, tiêu chuẩn 2,3,4 khách/phòng.</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Ăn uống theo chương trình.</li><li>Vé tham quan theo chương trình.</li><li>01 chai nước suối/khách/ngày.</li><li>Bảo hiểm du lịch nội địa suốt tuyến.</li><li>HDV địa phương phục vụ suốt hành trình.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn: 432.000 đ/khách. Lễ: 540.000 đ/khách.</li><li>Tips cho tài xế địa phương và hướng dẫn viên.</li><li>Chi phí cá nhân: hành lý quá cước, điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình, ...</li></ul>',
        'gia' => 1730000.00,
        'ngay_bat_dau' => '2026-08-08',
        'ngay_ket_thuc' => '2026-08-09',
        'so_nguoi_toi_da' => 15,
        'diem_don' => 'Nhà Văn Hóa Thanh Niên, Số 4 Phạm Ngọc Thạch, Quận 1. TP. Hồ Chí Minh',
        'diem_tra' => 'Nhà Văn Hóa Thanh Niên, Số 4 Phạm Ngọc Thạch, Quận 1. TP. Hồ Chí Minh',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2025/06/09/17/ivivu-novaworld-phan-thiet-450x265.jpg',
        'id_quoc_gia' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ],
    [
        'id' => 5,
        'ten_tour' => 'Tour Xe Lửa Lý Sơn 3N4Đ: HCM - Đảo Bé - Cổng Tò Vò - Chùa Hang',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Khám phá vách đá núi lửa triệu năm.</li><li>Khám phá Đảo Bé: Maldives của Việt Nam.</li><li>Check-in Cổng Tò Vò: Biểu tượng Lý Sơn.</li><li>Lặn ngắm san hô và hệ sinh thái biển đa dạng.</li><li>Núi Thới Lới: Điểm ngắm toàn cảnh đảo Lý Sơn.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Tàu lửa ngồi mềm điều hòa khứ hồi.</li><li>Xe đời mới máy lạnh, đón khách theo chương trình.</li><li>Vé khứ hồi tàu cao tốc SaKy-LySon-SaKy.</li><li>Cano đi Đảo Bé khứ hồi.</li><li>Xe điện chở đoàn đi tham quan cụm đảo Lý Sơn.</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tiêu chuẩn tại Đảo Lý Sơn (2 khách/phòng; khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Vé tham quan có trong chương trình.</li><li>Các bữa ăn theo chương trình. (đảm bảo số lượng & chất lượng tương đương nếu có điều chỉnh).</li><li>Nước suối 01 chai/khách/ngày.</li><li>Bảo hiểm du lịch nội địa suốt tuyến.</li><li>Hướng dẫn viên phục vụ suốt hành trình.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn: 500.000 đ/khách. Lễ Tết: 700.000 đ/khách/tour.</li><li>Phụ thu giường nằm khoang 4 xe lửa (nếu có nhu cầu).</li><li>Xe máy Đảo Bé - Lý Sơn.</li><li>Tips cho tài xế địa phương và hướng dẫn viên.</li><li>Chi phí cá nhân: điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình, ăn uống trên tàu lửa, ..</li></ul>',
        'gia' => 4990000.00,
        'ngay_bat_dau' => '2026-09-10',
        'ngay_ket_thuc' => '2026-09-14',
        'so_nguoi_toi_da' => 20,
        'diem_don' => 'Ga Sài Gòn, TP. Hồ Chí Minh',
        'diem_tra' => 'Ga Sài Gòn, TP. Hồ Chí Minh',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2023/03/02/11/ivivu-tour-xe-lua-450x265.gif',
        'id_quoc_gia' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ],
        // ================= TOUR Nước Ngoài =================
       [
        'id' => 6,
        'ten_tour' => 'Tour Trung Quốc 6N5Đ: HCM - Đại Lý - Lệ Giang - Shangrila - No Shopping',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Ngắm hồ Nhĩ Hải: bức tranh thiên nhiên yên bình và thơ mộng.</li><li>Hành trình không shopping, tận hưởng trọn vẹn trải nghiệm văn hóa cảnh sắc.</li><li>Dạo bước cổ trấn Lệ Giang và Đại Lý: những thị trấn di sản mang vẻ đẹp trường tồn.</li><li>Chiêm ngưỡng Núi Tuyết Ngọc Long hùng vĩ: một trong những biểu tượng của Vân Nam.</li><li>Khám phá Shangrila huyền thoại: vùng đất linh thiêng với Tu viện Songzanlin và văn hóa Tây Tạng.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Vé máy bay khứ hồi theo đoàn hãng Ruili Airlines (20kg hành lý ký gửi + xách tay 07kg).</li><li>Xe máy lạnh vận chuyển suốt tuyến.</li><li>Phí an ninh sân bay, bảo hiểm hàng không, thuế phi trường 2 nước, phí xăng dầu (có thể thay đổi tại thời điểm xuất vé).</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tiêu chuẩn 4-5* địa phương (2 khách/phòng, khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Visa đoàn nhập cảnh Trung Quốc (áp dụng cho khách hộ chiếu Việt Nam).</li><li>Vé tham quan theo chương trình.</li><li>Các bữa ăn theo lịch trình (đảm bảo số lượng & chất lượng tương đương nếu có điều chỉnh).</li><li>Nước suối 01 chai/khách/ngày.</li><li>Bảo hiểm du lịch quốc tế.</li><li>Trưởng đoàn và HDV địa phương phục vụ suốt hành trình.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn: 140 USD/khách/tour. Lễ: 180 USD/khách/tour.</li><li>Tips cho tài xế và hướng dẫn viên: 36 USD/khách/tour. Lễ, Tết: 42 USD/khách/tour.</li><li>Visa tái nhập Việt Nam cho khách quốc tịch nước ngoài theo quy định hiện hành (nếu có).</li><li>Chi phí cá nhân: hành lý quá cước, điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình, ...</li></ul>',
        'gia' => 20490000.00,
        'ngay_bat_dau' => '2026-09-03',
        'ngay_ket_thuc' => '2026-09-08',
        'so_nguoi_toi_da' => 20,
        'diem_don' => 'Sân bay Tân Sơn Nhất ga đi quốc tế, TP. Hồ Chí Minh',
        'diem_tra' => 'Sân bay Lệ Giang , Trung Quốc',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2023/03/15/16/ivivu-monastery-shangrila-02-450x265.gif',
        'id_quoc_gia' => 2,
        'created_at' => $now,
        'updated_at' => $now,
    ],
    [
        'id' => 7,
        'ten_tour' => 'Tour Singapore 3N2Đ: HCM - Haji Lane - Gardens By The Bay - Marina Barrage',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Tặng vé tàu điện đến Vivo City để quý khách tự do mua sắm.</li><li>Marina Barrage: Tận hưởng tầm nhìn tuyệt đẹp ôm trọn vịnh Marina.</li><li>Phố nghệ thuật Haji Lane: Khám phá con phố đầy màu sắc và không khí sôi động.</li><li>Gardens by the Bay: Chiêm ngưỡng siêu cây khổng lồ, biểu tượng xanh của Singapore.</li><li>Chùa Răng Phật: Viếng ngôi chùa linh thiêng với kiến trúc uy nghi, biểu tượng văn hóa.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Vé máy bay khứ hồi theo đoàn hãng Vietjet Air (20kg hành lý ký gửi và xách tay 7kg).</li><li>Xe máy lạnh phục vụ suốt tuyến.</li><li>Phí an ninh sân bay, bảo hiểm hàng không, thuế phi trường 2 nước, phí nhiên liệu (có thể thay đổi tại thời điểm xuất vé).</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tiêu chuẩn 3-4* địa phương (2 - 3 khách/phòng; khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Vé tham quan như chương trình.</li><li>Các bữa ăn theo chương trình: 1 Bữa Buffet Lẩu BBQ Hàn Quốc, 1 bữa sườn trà Bak Kuh Teh, 1 bữa đặc sản Cua sốt ớt (đảm bảo số lượng & chất lượng tương đương nếu có điều chỉnh).</li><li>Nước suối 01 chai/khách/ngày.</li><li>Bảo hiểm du lịch quốc tế.</li><li>Trưởng đoàn và HDV địa phương phục vụ suốt hành trình.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn: 4.800.000 đ/khách/tour.</li><li>Tips cho tài xế và hướng dẫn viên: 15 USD/khách/tour (thay đổi theo thời điểm).</li><li>Phụ thu đối với khách mang Quốc tịnh nước ngoài hoặc Khách Việt kiều có tên không thuần Việt: 20 USD/khách.</li><li>Visa tái nhập Việt Nam cho khách quốc tịch nước ngoài theo quy định hiện hành (nếu có).</li><li>Chi phí cá nhân: hành lý quá cước, điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình.</li></ul>',
        'gia' => 11290000.00,
        'ngay_bat_dau' => '2026-08-21',
        'ngay_ket_thuc' => '2026-08-23',
        'so_nguoi_toi_da' => 20,
        'diem_don' => 'Sân bay quốc tế Changi, Singapore',
        'diem_tra' => 'Sân bay quốc tế Changi, Singapore',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2022/03/28/16/ivivu-merlion-park-singapore-450x265.gif',
        'id_quoc_gia' => 7,
        'created_at' => $now,
        'updated_at' => $now,
    ],
    [
        'id' => 8,
        'ten_tour' => 'Tour Campuchia 4N3Đ: HCM - Angkor Wat - Siem Reap - Phnom Penh',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Du thuyền sông Bốn Mặt ngắm hoàng hôn Phnom Penh lãng mạn.</li><li>Thưởng thức buffet & múa Apsara truyền thống, nét văn hóa đặc sắc Campuchia.</li><li>Khám phá quần thể Angkor Wat huyền bí, kỳ quan kiến trúc Khmer nổi tiếng thế giới.</li><li>Trải nghiệm xe Tuk Tuk tham quan đền Ta Prohm và Bayon giữa rừng cổ thụ độc đáo</li><li>Cung Điện Hoàng Gia và Chùa Vàng Bạc, biểu tượng lộng lẫy của thủ đô Phnom Penh.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Xe máy lạnh phục vụ suốt tuyến.</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tiêu chuẩn 4* địa phương (2 khách/phòng; khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Vé tham quan trong chương trình.</li><li>Các bữa ăn theo chương trình (đảm bảo số lượng & chất lượng tương đương nếu có điều chỉnh).</li><li>Nước suối 02 chai/khách/ngày.</li><li>Bảo hiểm du lịch quốc tế.</li><li>Hướng dẫn viên Campuchia nói tiếng Việt.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn: 65 USD/khách/tour.</li><li>Tips cho tài xế và hướng dẫn viên: 4 USD/khách/tour.</li><li>Visa Cambodia cho khách nước ngoài: 35 USD/khách/tour.</li><li>Visa tái nhập Việt Nam cho khách quốc tịch nước ngoài theo quy định hiện hành (nếu có).</li><li>Chi phí cá nhân: hành lý quá cước, điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình, ...</li></ul>',
        'gia' => 5990000.00,
        'ngay_bat_dau' => '2026-10-01',
        'ngay_ket_thuc' => '2026-10-04',
        'so_nguoi_toi_da' => 20,
        'diem_don' => 'Bưu Điện TP.HCM',
        'diem_tra' => 'Bưu Điện TP.HCM',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2017/03/28/11/ivivu-angkor-wat-with-water-450x265.jpg',
        'id_quoc_gia' => 3,
        'created_at' => $now,
        'updated_at' => $now,
    ],
    [
        'id' => 9,
        'ten_tour' => 'Tour Phuket 4N3Đ: HCM - Đảo Phi Phi - Quần Đảo Khai',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Phố cổ Phuket: Khám phá khu phố cổ với kiến trúc độc đáo và sắc màu rực rỡ.</li><li>Lặn ngắm san hô: Khám phá thế giới đại dương với san hô và các loài cá đầy màu sắc.</li><li>Thưởng thức ẩm thực Phuket: Thử các món ăn địa phương với hương vị đậm chất Thái.</li><li>Đảo Phi Phi: Thưởng ngoạn vẻ đẹp tuyệt mỹ với biển xanh, cát trắng và thiên nhiên hùng vĩ.</li><li>Tặng 01 bữa tối BBQ hải sản phong cách Thái Lan.</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Vé máy bay khứ hồi theo hãng Vietjet Air (20kg hành lý ký gửi + xách tay 07kg).</li><li>Xe máy lạnh vận chuyển suốt tuyến.</li><li>Phí an ninh sân bay, bảo hiểm hàng không, thuế phi trường 2 nước (có thể thay đổi tại thời điểm xuất vé).</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tại khu Patong tiêu chuẩn 4* địa phương (2 khách/phòng, khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Vé tham quan theo chương trình.</li><li>Các bữa ăn theo lịch trình (đảm bảo số lượng & chất lượng tương đương nếu có điều chỉnh).</li><li>Nước suối 01 chai/khách/ngày.</li><li>Bảo hiểm du lịch quốc tế.</li><li>Trưởng đoàn và HDV địa phương phục vụ suốt hành trình.</li><li>Nón du lịch.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn (nếu có): 2.500.000 đ/khách/tour.</li><li>Tips cho tài xế địa phương và hướng dẫn viên: 550.000 đ/khách/tour.</li><li>Visa tái nhập Việt Nam cho khách quốc tịch nước ngoài theo quy định hiện hành (nếu có).</li><li>Chi phí cá nhân: hành lý quá cước, điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình, ...</li></ul>',
        'gia' => 11990000.00,
        'ngay_bat_dau' => '2026-10-15',
        'ngay_ket_thuc' => '2026-10-18',
        'so_nguoi_toi_da' => 20,
        'diem_don' => 'Ga đi quốc tế sân bay Tân Sơn Nhất, TP. Hồ Chí Minh',
        'diem_tra' => 'Ga đi quốc tế sân bay Tân Sơn Nhất, TP. Hồ Chí Minh',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2022/07/13/17/ivivu-vinh-phang-nga-450x265.gif',
        'id_quoc_gia' => 4,
        'created_at' => $now,
        'updated_at' => $now,
    ],
    [
        'id' => 10,
        'ten_tour' => 'Tour Nhật Bản 4N4Đ: HCM - Yamanashi - Núi Phú Sĩ - Tokyo Disneyland - Narita',
        'mo_ta' => '<h3><strong>Điểm Nổi Bật Tour</strong></h3><ul><li>Viếng Đền Asakusa Kannon: Ngôi đền cổ linh thiêng giữa lòng Tokyo.</li><li>Thưởng thức trà đạo và ngắm núi Phú Sĩ trên du thuyền ở hồ Yamanaka</li><li>Dạo Làng cổ Oshino Hakkai: Nơi có 8 hồ nước trong vắt từ tuyết tan.</li><li>Vui chơi thỏa thích tại công viên chủ đề Tokyo Disneyland</li><li>Mua sắm bất tận tại các trung tâm uy tín với nhiều mặt hàng chất lượng Nhật Bản</li></ul><h3><strong>Giá Tour Bao Gồm</strong></h3><p><strong>Vận Chuyển:</strong></p><ul><li>Vé máy bay khứ hồi theo hãng Vietjet Air, (20kg hành lý ký gửi + 7kg hành lý xách tay).</li><li>Phí an ninh sân bay, bảo hiểm hàng không, thuế phi trường 2 nước, phụ phí xăng dầu (theo quy định tại thời điểm xuất vé).</li><li>Xe máy lạnh phục vụ suốt tuyến.</li></ul><p><strong>Lưu Trú:</strong></p><ul><li>Khách sạn tiêu chuẩn 3 - 4* địa phương (2 khách/phòng; khách lẻ nam/nữ có thể bố trí phòng phù hợp).</li></ul><p><strong>Dịch Vụ Khác:</strong></p><ul><li>Visa nhập cảnh Nhật Bản theo chương trình.</li><li>Vé tham quan trong chương trình.</li><li>Các bữa ăn theo chương trình.</li><li>Nước suối 01 chai/khách/ngày.</li><li>Bảo hiểm du lịch quốc tế.</li><li>Trưởng đoàn và HDV địa phương phục vụ suốt hành trình.</li><li>Thuế VAT.</li></ul><h3><strong>Giá Tour Không Bao Gồm</strong></h3><ul><li>Phụ thu phòng đơn (nếu có): 5.000.000đ/khách</li><li>Tips cho tài xế và hướng dẫn viên: 1.000.000đ/khách/tour.</li><li>Visa tái nhập Việt Nam cho khách quốc tịch nước ngoài theo quy định hiện hành (nếu có).</li><li>Chi phí cá nhân: hành lý quá cước, điện thoại, giặt ủi, tham quan, chi tiêu ngoài chương trình.</li><li>Phí đổi vé, dời ngày về, đổi hành trình, đổi chặng bay hoặc nâng hạng vé (thương gia)</li></ul>',
        'gia' => 27990000.00,
        'ngay_bat_dau' => '2026-11-18',
        'ngay_ket_thuc' => '2026-11-22',
        'so_nguoi_toi_da' => 20,
        'diem_don' => 'Sân bay quốc tế Tân Sơn Nhất - Ga đi Quốc tế, TP. Hồ Chí Minh',
        'diem_tra' => 'Sân bay quốc tế Tân Sơn Nhất - Ga đi Quốc tế, TP. Hồ Chí Minh',
        'tinh_trang' => 1,
        'hinh_anh' => 'https://cdn2.ivivu.com/2017/05/15/17/ivivu-senso-ji-temple-asakusa-kannon-450x265.jpg',
        'id_quoc_gia' => 6,
        'created_at' => $now,
        'updated_at' => $now,
    ],

        ];

        DB::table('tours')->truncate();
        DB::table('tours')->delete();
        DB::table('tours')->insert($tours);
    }
}
