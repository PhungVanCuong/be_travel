<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BaiVietSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $bai_viet = [
            [
                'tieu_de'       => 'Cẩm nang du lịch Đà Nẵng: Ăn gì, chơi ở đâu?',
                'mo_ta_ngan'    => 'Trọn bộ bí kíp khám phá thành phố đáng sống nhất Việt Nam dành cho những tín đồ xê dịch.',
                'noi_dung'      => '
                    <p>Đà Nẵng không chỉ nổi tiếng với những cây cầu độc đáo mà còn sở hữu những bãi biển đẹp say đắm lòng người. Hãy cùng VietnamTravel khám phá những địa điểm không thể bỏ lỡ nhé.</p>
                    <h3>1. Địa điểm vui chơi</h3>
                    <ul>
                        <li><strong>Bà Nà Hills:</strong> Trải nghiệm cáp treo và chiêm ngưỡng Cầu Vàng huyền thoại.</li>
                        <li><strong>Bán đảo Sơn Trà:</strong> Viếng chùa Linh Ứng và ngắm nhìn toàn cảnh thành phố từ trên cao.</li>
                        <li><strong>Phố cổ Hội An:</strong> Dù thuộc Quảng Nam nhưng chỉ cách Đà Nẵng 30km, rất đáng để kết hợp trong chuyến đi.</li>
                    </ul>
                    <h3>2. Ăn gì ở Đà Nẵng?</h3>
                    <p>Mì Quảng, Bánh tráng cuốn thịt heo, Gỏi cuốn, và các loại hải sản tươi sống tại các quán ven biển Mỹ Khê là những món bạn nhất định phải thử.</p>
                ',
                'hinh_anh'      => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?auto=format&fit=crop&w=800&q=80', // Ảnh Cầu Vàng
                'tag'           => 'Đà Nẵng, Cẩm nang, Du lịch miền Trung',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => 'Hướng dẫn thanh toán tour qua VNPay nhanh chóng',
                'mo_ta_ngan'    => 'Chỉ với 3 bước đơn giản, bạn có thể thanh toán tour an toàn tuyệt đối qua cổng thanh toán VNPay.',
                'noi_dung'      => '
                    <p>Nhằm mang đến trải nghiệm tiện lợi và an toàn nhất cho khách hàng, hệ thống đặt tour của chúng tôi đã tích hợp cổng thanh toán VNPay. Việc thanh toán chưa bao giờ dễ dàng đến thế.</p>
                    <h3>Các bước thanh toán bằng VNPay:</h3>
                    <ol>
                        <li><strong>Bước 1:</strong> Sau khi điền đầy đủ thông tin đặt tour, chọn phương thức thanh toán là "Thanh toán qua VNPAY".</li>
                        <li><strong>Bước 2:</strong> Màn hình sẽ hiển thị một mã QR Code.</li>
                        <li><strong>Bước 3:</strong> Mở ứng dụng ngân hàng (Mobile Banking) trên điện thoại, chọn tính năng Quét mã QR, đưa camera quét mã trên màn hình và xác nhận thanh toán.</li>
                    </ol>
                    <p>Hệ thống sẽ tự động cập nhật trạng thái <strong>"Đã thanh toán"</strong> ngay sau khi giao dịch thành công. Chúc bạn có một chuyến đi vui vẻ!</p>
                ',
                'hinh_anh'      => 'https://vnpay.vn/s1/statics.vnpay.vn/2023/9/06ncktiwd6dc1694418196384.png', // Ảnh minh họa VNPay
                'tag'           => 'Hướng dẫn, VNPay, Thanh toán',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => 'Trải nghiệm tính năng Chatbot AI: Tư vấn lịch trình tự động 24/7',
                'mo_ta_ngan'    => 'Giờ đây bạn không cần phải chờ đợi nhân viên phản hồi, Chatbot AI của chúng tôi sẽ giải đáp mọi thắc mắc ngay lập tức.',
                'noi_dung'      => '
                    <p>Bạn đang phân vân không biết nên đi Phú Quốc hay Đà Lạt? Bạn muốn biết giá tour cho trẻ em được tính như thế nào? Đừng lo, <strong>Tư vấn viên AI</strong> của chúng tôi luôn sẵn sàng hỗ trợ bạn.</p>
                    <p>Được tích hợp công nghệ xử lý ngôn ngữ tự nhiên (NLP), Chatbot của VietnamTravel có khả năng:</p>
                    <ul>
                        <li>Gợi ý tour du lịch dựa trên ngân sách và sở thích của bạn.</li>
                        <li>Giải đáp các câu hỏi thường gặp (FAQ) về thủ tục hoàn hủy, giấy tờ cần thiết.</li>
                        <li>Hỗ trợ tra cứu trạng thái đơn hàng (Mã hóa đơn) chỉ trong 3 giây.</li>
                    </ul>
                    <p>Chỉ cần nhấp vào biểu tượng tin nhắn góc phải màn hình, nhập câu hỏi của bạn và tận hưởng sự tiện lợi của công nghệ AI!</p>
                ',
                'hinh_anh'      => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80', // Ảnh minh họa AI/Chat
                'tag'           => 'Công nghệ, Chatbot AI, Hỗ trợ 24/7',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => 'Săn mây Tà Xùa: Kinh nghiệm thực tế từ A đến Z',
                'mo_ta_ngan'    => 'Chinh phục "Sống lưng khủng long" và chiêm ngưỡng biển mây cuộn trào tại Tà Xùa - Sơn La.',
                'noi_dung'      => '
                    <p>Tà Xùa (Bắc Yên, Sơn La) được mệnh danh là "Thiên đường mây" của miền Bắc. Tuy nhiên, không phải ai lên đây cũng may mắn "săn" được mây. Dưới đây là một số kinh nghiệm quý báu.</p>
                    <h3>Thời điểm lý tưởng nhất:</h3>
                    <p>Từ tháng 10 đến tháng 4 năm sau là mùa mây Tà Xùa đẹp nhất. Đặc biệt là những ngày sau khi trời có mưa phùn nhẹ, ban đêm lạnh và sáng có nắng.</p>
                    <h3>Cần chuẩn bị gì?</h3>
                    <p>Đường đèo lên Tà Xùa khá dốc và sương mù che khuất tầm nhìn. Nếu bạn tự đi xe máy, hãy chắc chắn tay lái thật vững. Lựa chọn an toàn nhất là <strong>đặt tour trọn gói</strong> để có xe 16 chỗ đưa đón tận nơi, vừa an toàn lại có người lo chỗ ăn ngủ chu đáo.</p>
                ',
                'hinh_anh'      => 'https://bizweb.dktcdn.net/100/514/927/files/ta-xua.jpg?v=1755681677003', // Lấy lại ảnh Tà xùa bạn gửi
                'tag'           => 'Tà Xùa, Phượt, Săn mây',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => 'Những lưu ý quan trọng khi đi du lịch cùng người cao tuổi',
                'mo_ta_ngan'    => 'Chuẩn bị kỹ càng sẽ giúp chuyến đi của ông bà, cha mẹ được trọn vẹn và an toàn.',
                'noi_dung'      => '
                    <p>Đưa gia đình đi du lịch là một trải nghiệm tuyệt vời, nhưng nếu đoàn có người lớn tuổi, bạn cần lưu ý những vấn đề sau:</p>
                    <ul>
                        <li><strong>Chọn lịch trình thư giãn:</strong> Tránh các tour có cường độ di chuyển quá dày đặc, đi bộ nhiều hoặc thay đổi khí hậu đột ngột.</li>
                        <li><strong>Chuẩn bị thuốc men:</strong> Luôn mang theo các loại thuốc đặc trị (huyết áp, tim mạch, tiểu đường...) và các loại thuốc phổ thông (tiêu hóa, say xe).</li>
                        <li><strong>Phương tiện di chuyển:</strong> Nếu đi xa, nên ưu tiên đi máy bay hoặc tàu hỏa để người già được nghỉ ngơi thoải mái nhất.</li>
                        <li><strong>Bảo hiểm du lịch:</strong> Khi đặt tour tại hệ thống của chúng tôi, tất cả hành khách (đặc biệt là người cao tuổi) đều được mua bảo hiểm du lịch trọn gói để yên tâm tận hưởng chuyến đi.</li>
                    </ul>
                ',
                'hinh_anh'      => 'https://admin.vov.gov.vn/UploadFolder/KhoTin/Images/UploadFolder/VOVVN/Images/sites/default/files/styles/large/public/2020-10/unnamed_0.png', // Ảnh gia đình
                'tag'           => 'Cẩm nang, Gia đình, Sức khỏe',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
        ];

        DB::table('bai_viets')->truncate();
        DB::table('bai_viets')->delete();
        DB::table('bai_viets')->insert($bai_viet);
    }
}
