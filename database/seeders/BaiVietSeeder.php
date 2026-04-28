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
            // 3 BÀI VIẾT MỚI THÊM VÀO DƯỚI ĐÂY:
            [
                'tieu_de'       => 'Hướng dẫn xin Visa du lịch Châu Á nhanh chóng',
                'mo_ta_ngan'    => 'Tổng hợp các bước chuẩn bị hồ sơ và thủ tục xin Visa du lịch các nước Châu Á phổ biến như Hàn Quốc, Nhật Bản, Đài Loan với tỷ lệ đậu cao.',
                'noi_dung'      => '
                    <p>Châu Á luôn là điểm đến hấp dẫn với văn hóa đa dạng và ẩm thực phong phú. Tuy nhiên, rào cản lớn nhất của du khách Việt thường là khâu xin Visa. Đừng lo lắng, dưới đây là bí kíp giúp bạn vượt qua ải Visa dễ dàng.</p>
                    <h3>1. Bộ hồ sơ cốt lõi cần chuẩn bị</h3>
                    <p>Dù xin Visa đi Hàn, Nhật hay Đài Loan, bạn đều cần chuẩn bị 4 nhóm giấy tờ sau thật minh bạch và trung thực:</p>
                    <ul>
                        <li><strong>Hồ sơ nhân thân:</strong> Hộ chiếu còn hạn ít nhất 6 tháng, CCCD, Sổ hộ khẩu/Giấy xác nhận cư trú, Ảnh thẻ chuẩn quốc tế.</li>
                        <li><strong>Chứng minh công việc:</strong> Hợp đồng lao động, Giấy xin nghỉ phép đi du lịch có mộc của công ty, Sao kê lương 3 tháng gần nhất.</li>
                        <li><strong>Chứng minh tài chính:</strong> Sổ tiết kiệm (thường yêu cầu tối thiểu 100 triệu VNĐ) đã gửi ít nhất 1-3 tháng, Giấy tờ nhà đất, ô tô (nếu có).</li>
                        <li><strong>Lịch trình chuyến đi:</strong> Vé máy bay khứ hồi, Booking khách sạn, Lịch trình tham quan chi tiết từng ngày.</li>
                    </ul>
                    <h3>2. Lưu ý quan trọng giúp tăng tỷ lệ đậu</h3>
                    <p>Lịch sử du lịch tốt (từng đi các nước Đông Nam Á không cần Visa như Thái Lan, Singapore) là một điểm cộng rất lớn. Nếu hồ sơ của bạn chưa đủ mạnh, việc <strong>đặt tour trọn gói tại IXTAL TOUR</strong> sẽ giúp tỷ lệ đậu Visa của bạn lên đến 99% nhờ sự bảo lãnh từ công ty lữ hành.</p>
                ',
                'hinh_anh'      => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=800&q=80',
                'tag'           => 'Thủ tục, Visa, Châu Á',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => 'Bí kíp sắp xếp hành lý khi đi du lịch nước ngoài',
                'mo_ta_ngan'    => 'Mẹo đóng gói hành lý gọn nhẹ, tối ưu không gian nhưng vẫn đảm bảo mang đủ những vật dụng cần thiết cho chuyến xuất ngoại của bạn.',
                'noi_dung'      => '
                    <p>Đóng gói hành lý luôn là "nỗi ám ảnh" trước mỗi chuyến đi xa. Làm sao để mang cả tủ đồ mà không bị quá ký? Hãy áp dụng ngay những mẹo dưới đây của IXTAL TOUR.</p>
                    <h3>1. Lên danh sách (Checklist) trước khi xếp đồ</h3>
                    <p>Việc viết ra giấy hoặc ghi chú trên điện thoại giúp bạn không bỏ sót đồ quan trọng (hộ chiếu, sạc dự phòng, thuốc men) và loại bỏ được những món "mang đi nhưng không bao giờ mặc tới".</p>
                    <h3>2. Quy tắc "Cuộn tròn" thần thánh</h3>
                    <p>Thay vì gấp quần áo theo cách truyền thống, hãy <strong>cuộn tròn chúng lại</strong>. Phương pháp này vừa giúp tiết kiệm diện tích tối đa trong vali, vừa giữ cho quần áo không bị nhăn nheo khi di chuyển.</p>
                    <h3>3. Sử dụng bộ chiết mỹ phẩm mini</h3>
                    <p>Quy định hàng không quốc tế rất khắt khe với chất lỏng xách tay (không quá 100ml/lọ). Việc mua các bộ chiết mỹ phẩm mini vừa giúp tuân thủ luật, vừa làm giảm đáng kể trọng lượng hành lý của bạn.</p>
                    <h3>4. Phân chia rủi ro</h3>
                    <p>Luôn để các đồ vật giá trị cao (trang sức, máy ảnh, laptop) và giấy tờ tùy thân quan trọng trong túi xách tay mang theo người, tuyệt đối không để trong hành lý ký gửi để đề phòng thất lạc.</p>
                ',
                'hinh_anh'      => 'https://images.unsplash.com/photo-1476480862126-209bfaa8edc8?auto=format&fit=crop&w=800&q=80',
                'tag'           => 'Cẩm nang, Mẹo vặt, Hành lý',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => 'Cẩm nang du lịch một mình (Solo Travel) an toàn và thú vị',
                'mo_ta_ngan'    => 'Vượt qua vùng an toàn để tận hưởng sự tự do tuyệt đối. Những kinh nghiệm xương máu dành cho người đi du lịch một mình lần đầu.',
                'noi_dung'      => '
                    <p>Du lịch một mình không có nghĩa là cô đơn, mà đó là cơ hội tuyệt vời để bạn thấu hiểu bản thân và tự do khám phá thế giới theo cách riêng của mình.</p>
                    <h3>1. Tại sao nên thử Solo Travel?</h3>
                    <p>Bạn được tự do quyết định lịch trình: muốn ngủ nướng đến trưa hay dậy sớm đón bình minh, rẽ ngang vào một quán cafe nhỏ ven đường mà không cần phải biểu quyết với bất kỳ ai.</p>
                    <h3>2. Bí quyết đảm bảo an toàn</h3>
                    <ul>
                        <li><strong>Cập nhật lịch trình:</strong> Luôn chia sẻ lịch trình chuyến đi và địa chỉ khách sạn cho ít nhất một người thân hoặc bạn bè.</li>
                        <li><strong>Trang phục phù hợp:</strong> Ăn mặc gọn gàng, tôn trọng văn hóa địa phương để tránh thu hút sự chú ý không mong muốn.</li>
                        <li><strong>Không về khuya:</strong> Hạn chế đi dạo một mình ở những khu vực vắng vẻ hoặc tối tăm sau 10h đêm.</li>
                    </ul>
                    <p>Và điều quan trọng nhất: Hãy luôn tự tin, mỉm cười và mở lòng đón nhận những người bạn mới trên đường đi nhé!</p>
                ',
                'hinh_anh'      => 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&w=800&q=80',
                'tag'           => 'Solo Travel, Kinh nghiệm, Trải nghiệm',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => '5 mẹo chụp ảnh du lịch bằng điện thoại siêu ảo rinh ngàn lượt "Like"',
                'mo_ta_ngan'    => 'Không cần máy ảnh cơ cồng kềnh, chỉ với chiếc smartphone và vài bí kíp nhỏ, bạn đã có ngay album ảnh du lịch đẹp mê ly.',
                'noi_dung'      => '
                    <p>Để lưu giữ những khoảnh khắc đẹp trong chuyến đi, bạn không nhất thiết phải sắm một chiếc máy ảnh đắt tiền. Smartphone hiện nay đã đủ sức "cân" mọi khung hình nếu bạn nắm được các quy tắc sau:</p>
                    <h3>1. Bật lưới (Grid) để căn bố cục</h3>
                    <p>Hãy bật tính năng đường lưới (Grid) trên camera điện thoại. Đặt chủ thể chính vào các điểm giao nhau của đường lưới (quy tắc 1/3) sẽ giúp bức ảnh trông hài hòa và chuyên nghiệp hơn rất nhiều.</p>
                    <h3>2. Tận dụng "Giờ Vàng" (Golden Hour)</h3>
                    <p>Khoảng 1 tiếng sau bình minh và 1 tiếng trước hoàng hôn là thời điểm ánh sáng tự nhiên đẹp nhất, mềm mại nhất. Đây là lúc tuyệt vời để cho ra đời những bức ảnh chân dung ngược nắng siêu "nghệ".</p>
                    <h3>3. Chú ý đến hậu cảnh</h3>
                    <p>Đừng chỉ chăm chăm vào người chụp. Hãy dọn dẹp "rác" trong khung hình (như thùng rác, người đi đường lọt vào góc ảnh) hoặc dùng chế độ xóa phông (Portrait) để làm nổi bật chủ thể.</p>
                    <h3>4. Lau sạch ống kính</h3>
                    <p>Một lỗi cực kỳ phổ biến! Ống kính điện thoại thường bị mờ do dấu vân tay. Chỉ cần một thao tác lau nhẹ bằng vạt áo, bức ảnh của bạn sẽ trong vắt và sắc nét hơn gấp bội.</p>
                ',
                'hinh_anh'      => 'https://images.unsplash.com/photo-1516546453174-5e1098a4b4af?auto=format&fit=crop&w=800&q=80',
                'tag'           => 'Nhiếp ảnh, Sống ảo, Điện thoại',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => 'Food tour Bangkok: Ăn sập thủ đô Thái Lan với chưa tới 500k',
                'mo_ta_ngan'    => 'Pad Thái, Tom Yum, Xôi xoài... Khám phá thiên đường ẩm thực đường phố Bangkok rẻ, ngon và đậm đà hương vị.',
                'noi_dung'      => '
                    <p>Bangkok không chỉ là thiên đường mua sắm mà còn là "cái rốn" ẩm thực đường phố của Châu Á. Nếu có dịp đến đây, bạn nhất định không được bỏ qua hành trình Food tour ẩm thực này.</p>
                    <h3>1. Những khu chợ đêm không thể bỏ lỡ</h3>
                    <ul>
                        <li><strong>Chợ đêm Jodd Fairs:</strong> Nổi tiếng với món Sườn cay khổng lồ (Laeng Saeb) và hải sản tươi sống.</li>
                        <li><strong>Chinatown (Yaowarat):</strong> Nơi hội tụ các món ăn mang âm hưởng Trung Hoa - Thái Lan như hủ tiếu xào, bánh mì nướng Yaowarat.</li>
                        <li><strong>Chatuchak:</strong> Khu chợ cuối tuần lớn nhất thế giới, nơi bạn có thể tìm thấy món kem dừa và trà sữa Thái trứ danh.</li>
                    </ul>
                    <h3>2. Các món ăn "Must-try"</h3>
                    <p>Bên cạnh Pad Thái và Tom Yum, hãy thử Gỏi đu đủ (Som Tum) cay xé lưỡi, Xôi xoài ngọt lịm với nước cốt dừa béo ngậy, hay món thịt lợn xiên nướng (Moo Ping) thơm lừng ở bất kỳ xe đẩy ven đường nào.</p>
                    <h3>Lời khuyên từ Ixtal Tour</h3>
                    <p>Hãy chuẩn bị sẵn các loại thuốc tiêu hóa nếu bụng bạn không quen với đồ ăn cay nóng. Và nhớ mang theo tiền mặt lẻ (Bath) vì hầu hết các quầy thức ăn đường phố đều không nhận thẻ nhé!</p>
                ',
                'hinh_anh'      => 'https://images.unsplash.com/photo-1559314809-0d155014e29e?auto=format&fit=crop&w=800&q=80',
                'tag'           => 'Ẩm thực, Thái Lan, Food Tour',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'tieu_de'       => 'Nhận diện 4 chiêu trò lừa đảo du khách phổ biến trên thế giới',
                'mo_ta_ngan'    => 'Trang bị ngay những kiến thức phòng tránh lừa đảo, chặt chém để bảo vệ bản thân và tài sản khi đi du lịch nước ngoài.',
                'noi_dung'      => '
                    <p>Đi du lịch là khoảng thời gian tận hưởng niềm vui, nhưng nếu mất cảnh giác, bạn rất dễ trở thành mục tiêu của những kẻ lừa đảo chuyên nghiệp. Dưới đây là 4 mánh khóe bạn cần biết để né tránh.</p>
                    <h3>1. Đóng giả người bản địa nhiệt tình chỉ đường</h3>
                    <p>Một người lạ mặt tiếp cận bạn tại nhà ga hoặc điểm du lịch, tỏ ra thân thiện chỉ đường hoặc xách hành lý giúp bạn. Cuối cùng, họ sẽ đòi một khoản tiền "tip" cắt cổ. <strong>Cách xử lý:</strong> Lịch sự từ chối thẳng thừng và chỉ hỏi đường nhân viên an ninh hoặc cảnh sát.</p>
                    <h3>2. Taxi "mù" đồng hồ (No-meter taxi)</h3>
                    <p>Tài xế báo giá miệng thay vì bấm đồng hồ, thường giá sẽ cao gấp 2-3 lần bình thường. <strong>Cách xử lý:</strong> Luôn yêu cầu bật đồng hồ tính tiền (Meter) trước khi lên xe, hoặc sử dụng các ứng dụng gọi xe công nghệ (như Grab, Uber, Bolt) để biết trước giá.</p>
                    <h3>3. Chiêu trò làm bẩn quần áo</h3>
                    <p>Bất ngờ có người làm đổ nước hoặc mù tạt lên áo bạn, sau đó họ rối rít xin lỗi và lấy khăn lau giúp. Trong lúc bạn đang bối rối, đồng bọn của chúng sẽ nhanh tay móc túi. <strong>Cách xử lý:</strong> Lùi lại ngay lập tức, từ chối sự giúp đỡ và tự mình làm sạch áo sau.</p>
                    <h3>4. Vòng tay may mắn / Thức ăn cho chim bồ câu</h3>
                    <p>Tại các quảng trường lớn ở Châu Âu, một số người sẽ tự động đeo vòng tay vào tay bạn hoặc nhét hạt bắp vào tay để bạn cho bồ câu ăn, sau đó ép bạn phải trả một số tiền lớn. <strong>Cách xử lý:</strong> Đút tay vào túi áo/quần khi đi qua đám đông và kiên quyết lắc đầu đi thẳng.</p>
                ',
                'hinh_anh'      => 'https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?auto=format&fit=crop&w=800&q=80',
                'tag'           => 'Cảnh báo, An toàn, Kinh nghiệm',
                'tinh_trang'    => 1,
                'created_at'    => $now, 'updated_at' => $now,
            ]

        ];

        DB::table('bai_viets')->truncate();
        DB::table('bai_viets')->delete();
        DB::table('bai_viets')->insert($bai_viet);
    }
}
