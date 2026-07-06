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
            // Tour 1
            [
                'id' => 1,
                'ten_diem_den' => 'HCM - Đà Lạt (Nghỉ đêm trên xe)',
                'thoi_gian' => 'Tối ngày 1',
                'mo_ta' => '<p><strong>Điểm đón:</strong></p>
<p>- Nhà Văn Hóa Thanh Niên số 4 Phạm Ngọc Thạch, Quận 1.</p>
<p>- Ngã tư Thủ Đức.</p>
<p>Khoảng 21h45: Quý khách có mặt tại điểm tập trung. Xe và hướng dẫn viên đón đoàn theo giờ đã hẹn, khởi hành đi Đà Lạt. Quý khách nghỉ đêm trên xe.</p>',
                'thanh_pho' => 'Hồ Chí Minh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2020/06/03/09/ivivu-thac-datanla-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'ten_diem_den' => 'Thiên Đường Săn Mây (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>05h00: Đến Cầu Đất, Đoàn đến với khu vực:</p>
<p><strong>Thiên Đường Săn Mây</strong> <strong>Cầu Đất Panorama</strong> - Du khách có cơ hội đón bình minh và chụp hình với cảnh mây trắng bồng bềnh. Có dịch vụ thuê trang phục đa dạng để chụp ảnh độc đáo. (chi phí thuê trang phục tự túc)</p>
<p><img title="" src="//cdn2.ivivu.com/2026/04/10/09/san-may-da-lat-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Thiên đường Săn Mây Đà Lạt.</em></p>
<p>Quý khách dùng điểm tâm sáng tại nhà hàng Panorama. Tiếp tục khám phá những điểm tham quan hấp dẫn tại khu vực Cầu Đất:</p>
<p><strong>Đồi Chè Cầu Đất</strong> - Nổi bật với những dãy chè xanh mướt. Vẻ đẹp của đồi chè hiện lên huyền ảo dưới làn sương sớm, tạo nên một điểm đến lý tưởng cho những ai mê khám phá và chụp ảnh.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/01/02/10/doi-che-cau-dat-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đồi Chè Cầu Đất.</em></p>
<p>Check-in với <strong>Cánh Đồng Điện Gió</strong> trên đồi chè xanh mát.</p>
<p>Đoàn về trung tâm Đà Lạt, trên đường ghé tham quan <strong>Trạm Ký Ức</strong>&nbsp;- <strong>Ngôi làng cổ châu Âu</strong>, không gian kiến trúc cổ kính như bức tranh yên bình.</p>
<p>Dùng bữa trưa tại nhà hàng. Đoàn về khách san nhận phòng nghỉ ngơi.</p>
<p>Chiều đoàn tham quan:</p>
<p>Quý khách có thẻ trải nghiệm <strong>Cáp treo xuyên rừng thông</strong> ngắm toàn cảnh Đà Lạt, rừng thông và hồ Tuyền Lâm từ trên cao (chi phí tự túc).</p>
<p><strong>Thiền Viện Trúc Lâm</strong> - Du khách sẽ cảm nhận được sự yên bình và thanh tịnh, nơi này mang lại cảnh quan tuyệt vời, hòa quyện giữa vẻ đẹp Phật giáo và thiên nhiên.</p>
<p><img title="" src="//cdn2.ivivu.com/2023/03/31/11/ivivu-thien-vien-truc-lam-da-lat-05.gif" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Thiền Viện Trúc Lâm.</em></p>
<p>Quý khách dùng <strong>bữa tối BBQ</strong>, tự do khám phá thành phố về đêm.</p>',
                'thanh_pho' => 'Hồ Chí Minh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2022/10/26/16/ivivu-san-may-da-lat-2-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id' => 3,
                'ten_diem_den' => 'Langbiang Land - Fresh Garden (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Quý khách dùng điểm tâm sáng, bắt đầu tham quan:</p>
<p><strong> Quảng trường Lâm Viên</strong> - Biểu tượng Đà Lạt bên hồ Xuân Hương với khối hoa dã quỳ và nụ hoa kính độc đáo.</p>
<p>Tham quan <strong>KDL Langbiang Land&nbsp;</strong>với nhiều trải nghiệm hấp dẫn:</p>
<p>- Check-in cảnh quan: thác hoa đào, vườn đào lông, cầu bán nguyệt, hồ vô cực và chương trình “Vũ điệu Langbiang Land”.</p>
<p>- Khám phá thiên nhiên: công viên khủng long, vườn chim và khu vườn thú.</p>
<p>- Vui chơi giải trí: trượt phao, trượt máng cầu vồng và đua xe Go-Kart (đua xe chi phí tự túc).</p>
<p>-&nbsp;<strong>Giao lưu cồng chiêng Tây Nguyên</strong>&nbsp;cho bạn cơ hội thưởng thức âm nhạc truyền thống.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/03/23/17/ivivu-langbiang-land-da-lat-1.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Quan cảnh ở KDL Langbiang Land.</em></p>
<p>Quý khách dùng bữa trưa tại nhà hàng. Về khách sạn nghỉ ngơi.</p>
<p><strong>Fresh Garden</strong> - Không gian rực rỡ sắc hoa và thiên nhiên trong lành, đắm chìm trong khung cảnh thơ mộng, tràn ngập sắc màu của hoa.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/11/20/11/fresh-garden-dat-lat-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Fresh Garden.</em></p>
<p>Quý khách tự túc dùng bữa tối và khám phá ẩm thực Đà Lạt về đêm.</p>',
                'thanh_pho' => 'Hồ Chí Minh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2021/12/23/14/ivivu-happy-hill-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'ten_diem_den' => 'Đà Lạt - HCM (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<p>Quý khách dùng điểm tâm sáng và làm thủ tục trả phòng.</p>
<p>Đoàn ghé&nbsp;<strong>Chợ Đà Lạt&nbsp;</strong>chọn cho mình những món quà ý nghĩa tại đây nhé.</p>
<p><img title="" src="//cdn2.ivivu.com/2019/03/06/15/ivivu-cho-da-lat-1.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Chợ Đà Lạt - Nơi giao thoa văn hóa và thương mại.</em></p>
<p>Đoàn dừng chân dùng bữa trưa tại Bảo Lộc. Tiếp tục hành trình về TP. HCM quý khách nghỉ ngơi trên xe.</p>
<p>Tối về đến điểm đón ban đầu, chia tay và hẹn gặp lại Quý khách</p>',
                'thanh_pho' => 'Hồ Chí Minh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2023/12/06/14/dapa-hill-dalat-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Tour 2:
            [
                'id' => 5,
                'ten_diem_den' => 'HCM - Hà Nội - Hà Giang (Ăn Trưa, Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>Sáng Quý khách tập trung tại sân bay Tân Sơn Nhất, làm thủ tục đáp chuyến bay <strong>05:15</strong> đi Hà Nội.</p>
<p>Đến sân bay Nội Bài, xe và HDV đón đoàn khởi hành đi Hà Giang, trên đường đi, Quý khách chiêm ngưỡng vẻ đẹp hùng vĩ của núi rừng Đông Bắc và dừng chân chụp ảnh lưu niệm.</p>
<p>Đoàn dùng bữa trưa tại nhà hàng địa phương ở Tuyên Quang. Tiếp tục hành trình tham quan:</p>
<p>Quý khách check-in tại<strong> cột mốc số 0 Hà Giang</strong>. <strong>Dốc Bắc Sum</strong>, chụp ảnh và ngắm cảnh tại con dốc dài 8km.</p>
<p>Khám phá <strong>Huyện Quản Bạ với Núi Đôi Cô Tiên</strong>&nbsp;“tác phẩm nghệ thuật” của tạo hoá ban tặng cho vùng đất này.</p>
<p><strong>Cổng Trời Quản Bạ</strong> - Cổng trời nằm trên đỉnh cao nhất của con đèo từ Hà Giang lên Quản Bạ.</p>
<p><img title="" src="//cdn2.ivivu.com/2019/08/29/10/iivu-nui-doi-quan-ba.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Núi đôi Cô Tiên, Quản Bạ.</em></p>
<p>Check-in <strong>cây nghiến cô đơn</strong> trên đường. Tiếp đó, đoàn tới rừng thông Yên Minh, phóng tầm mắt chiêm ngưỡng vẻ đẹp hùng vĩ ruộng bậc thang, những cánh rừng thông, đồi cây lá ngón nơi đây.</p>
<p>Đoàn dùng bữa tối tại nhà hàng địa phương, nhận phòng khách sạn nghỉ ngơi. Tự do khám phá thị trấn Yên Minh về đêm.</p>',
                'thanh_pho' => 'Hà Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2026/06/15/13/cay-nghien-co-don-ha-giang-ivv-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'ten_diem_den' => 'Yên Minh - Sông Nho Quế - Lô Lô Chải - Đồng Văn (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Quý khách dùng bữa sáng và làm thủ tục trả phòng. Đoàn tiếp tục hành trình khám phá:</p>
<p><strong>Cao nguyên đá Đồng Văn</strong> - Công viên địa chất toàn cầu được UNESCO công nhận, vùng đá vôi kỳ vĩ với cảnh quan độc đáo bậc nhất Việt Nam.</p>
<p><strong>Dốc Thẩm Mã</strong> - Cung đường đèo nổi tiếng với những khúc cua mềm mại giữa núi non hùng vĩ.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/06/15/14/doc-tham-ma.png" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Dốc Thẩm Mã.</em></p>
<p><strong>Phố Cáo</strong> - Ngôi làng vùng cao mang vẻ đẹp mộc mạc và đậm bản sắc dân tộc.</p>
<p><strong>Làng văn hóa Lũng Cẩm</strong> (Nhà của Pao) - Bối cảnh bộ phim nổi tiếng Chuyện của Pao, nổi bật với những ngôi nhà trình tường truyền thống.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/06/15/14/lang-van-hoa-lung-cam-nha-cua-pao-ha-giang.png" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Làng văn hóa Lũng Cẩm (Nhà của Pao).</em></p>
<p><strong>Dinh thự Vua Mèo Vương Chí Sình</strong> - Công trình kiến trúc độc đáo gắn liền với lịch sử gia tộc họ Vương.</p>
<p>Quý khách&nbsp;dùng bữa trưa tại nhà hàng địa phương. Tiếp tục tham quan:</p>
<p><strong>Cột cờ Lũng Cú</strong> - Nơi&nbsp;địa đầu Tổ Quốc, hay còn được miêu tả là: “Nơi cúi mặt sát đất, ngẩng mặt đụng trời”.</p>
<p><img title="" src="//cdn2.ivivu.com/2019/12/20/16/ivivu-cot-co-lung-cu.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Cột cờ Lũng Cú.</em></p>
<p><strong>Sông Nho Quế và Hẻm Tu Sản</strong>&nbsp;- Trải nghiệm du thuyền khám phá dòng sông xanh ngọc bích giữa hẻm vực sâu nhất Đông Nam Á (chi phí tự túc).</p>
<p><img title="" src="//cdn2.ivivu.com/2026/06/15/14/hem-tu-san-song-nho-que-ivv.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Sông Nho Quế và Hẻm Tu Sản.</em></p>
<p><strong>Làng văn hóa Lô Lô Chải</strong> - Bản làng yên bình dưới chân cột cờ Lũng Cú, lưu giữ nét đẹp truyền thống của người Lô Lô Đen.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/06/15/14/lo-lo-chai.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Làng văn hóa Lô Lô Chải.</em></p>
<p>Đoàn dùng bữa tối tại nhà hàng địa phương. Tự do dạo chơi và khám phá Phố cổ Đồng Văn, thưởng thức cà phê phố cổ và cảm nhận nhịp sống đặc trưng của vùng cao nguyên đá.</p>',
                'thanh_pho' => 'Hà Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2026/06/15/14/doc-tham-ma-120x76.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],


            [
                'id' => 7,
                'ten_diem_den' => 'Đồng Văn - Cao Bằng (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<p>Quý khách dùng bữa sáng và làm thủ tục trả phòng. Đoàn khởi hành đi Mèo Vạc, chinh phục những cung đường đẹp nhất vùng Đông Bắc.</p>
<p>Chiêm ngưỡng <strong>Đèo Mã Pì Lèng</strong> - Một trong “tứ đại đỉnh đèo” của Việt Nam, nổi tiếng với cảnh quan hùng vĩ của Cao nguyên đá Đồng Văn.</p>
<p><strong>Panorama Mã Pì Lèng</strong>&nbsp;- Điểm dừng chân lý tưởng để ngắm toàn cảnh sông Nho Quế và núi non trùng điệp từ trên cao (chi phí cà phê tự túc).</p>
<p><img title="" src="//cdn2.ivivu.com/2020/06/24/11/ivivu-deo-ma-pi-leng-ha-giang-1.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Quan cảnh đèo&nbsp;Mã Pì Lèng từ trên cao.</em></p>
<p><strong>Làng Văn hóa du lịch cộng đồng Pả Vi Hạ</strong>&nbsp;- Nơi lưu giữ những giá trị văn hóa đặc sắc và kiến trúc truyền thống của đồng bào dân tộc Mông.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/06/15/14/lang-pa-vi-ha-ivv-1.png" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Làng Văn hóa du lịch cộng đồng Pả Vi Hạ.</em></p>
<p>Đoàn dùng bữa trưa tại nhà hàng địa phương. Sau đó tiếp tục hành trình qua những cung đường đèo ngoạn mục để đến Cao Bằng.</p>
<p>Tham quan<strong> Khu di tích lịch sử Pác Bó</strong> - Nơi Chủ tịch Hồ Chí Minh sống và làm việc trong những năm đầu trở về lãnh đạo cách mạng Việt Nam.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/03/02/15/suoi-le-nin-pac-bo.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Suối Lê-nin ở Khu di tích lịch sử Pác Bó.</em></p>
<p>Đoàn dùng bữa tối tại nhà hàng địa phương, nhận phòng khách sạn nghỉ ngơi và tự do khám phá thành phố Cao Bằng về đêm.</p>',
                'thanh_pho' => 'Cao Bằng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2020/06/24/11/ivivu-deo-ma-pi-leng-ha-giang-1-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'ten_diem_den' => 'Cao Bằng - Thác Bản Giốc - Lạng Sơn (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 4',
                'mo_ta' => '<p>Quý khách dùng bữa sáng và làm thủ tục trả phòng. Đoàn khởi hành tham quan:</p>
<p><strong>Thác Bản Giốc</strong> - Một trong những thác nước đẹp và hùng vĩ nhất Việt Nam, nằm trên biên giới Việt Nam - Trung Quốc.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/12/13/16/ban-gioc-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Thác Bản Giốc.</em></p>
<p><strong>Động Ngườm Ngao</strong> - Hang động nổi tiếng với hệ thống nhũ đá kỳ ảo, được ví như kiệt tác của thiên nhiên vùng Đông Bắc.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/06/15/15/image-xdo1636791787.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Động Ngườm Ngao.</em></p>
<p>Quý khách dùng bữa trưa tại nhà hàng địa phương và tự do mua sắm tại khu vực biên mậu.</p>
<p>Khởi hành đi Lạng Sơn theo cung đường Phục Hòa - Đông Khê. Đến nơi, đoàn tham quan:</p>
<p><strong> Chùa Tam Thanh</strong>, <strong>động Tam Thanh</strong> nổi tiếng, chiêm ngưỡng <strong>Hòn Vọng Phu</strong> trên núi Tô Thị nổi tiếng trong văn thơ Việt Nam.</p>
<p>Quý khách&nbsp;dùng bữa tối tại nhà hàng địa phương. Tự do khám phá chợ đêm Kỳ Lừa và thưởng thức đặc sản địa phương. Nghỉ đêm tại Lạng Sơn.</p>',
                'thanh_pho' => 'Cao Bằng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2026/06/15/14/hem-tu-san-song-nho-que-ivv-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'ten_diem_den' => 'Lạng Sơn - Thảo Nguyên Đồng Lâm - HCM (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 5',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại khách sạn và làm thủ tục trả phòng. Đoàn khởi hành tham quan:</p>
<p><strong>Thảo nguyên Đồng Lâm</strong>&nbsp;- Thảo nguyên xanh mướt nổi tiếng của Lạng Sơn với khung cảnh yên bình, những đàn ngựa thong dong gặm cỏ và không gian lý tưởng để chụp ảnh, thư giãn giữa thiên nhiên.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/06/15/15/thao-nguyen-dong-lam.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Thảo nguyên Đồng Lâm.</em></p>
<p>Đoàn dùng bữa trưa với các món đặc sản địa phương như gà nướng, thịt nướng, xôi nếp cẩm và rau củ theo mùa.</p>
<p>Khởi hành về Hà Nội. Trên đường đi, đoàn nghỉ ngơi và ngắm nhìn cảnh sắc vùng Đông Bắc.</p>
<p>Đến khu vực sân bay Nội Bài, Quý khách tự túc dùng bữa tối nhẹ trước giờ bay. Xe và HDV đưa đoàn ra sân bay làm thủ tục đáp chuyến bay<strong> 21:00</strong> về TP.HCM.</p>
<p>Kết thúc chương trình, chia tay và hẹn gặp lại Quý khách trong những hành trình tiếp theo.</p>',
                'thanh_pho' => 'Lạng Sơn',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2026/06/15/15/thao-nguyen-dong-lam-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Tour 3
            [
                'id' => 10,
                'ten_diem_den' => 'HCM - Đà Nẵng - Phố Cổ Hội An (Ăn Trưa)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>Sáng: Khởi hành từ sân bay Tân Sơn Nhất&nbsp;làm thủ tục khởi hành đi Đà Nẵng.</p>
<p>Đến Đà Nẵng,&nbsp;Xe và HDV đưa đoàn đi tham quan:</p>
<p><strong>Bán Đảo Sơn Trà</strong>&nbsp;- Quà tặng thiên nhiên cho Đà Nẵng, nổi bật với bãi biển trong và rừng xanh mát, là điểm tham quan yên bình và xinh đẹp.</p>
<p><strong>Chùa Linh Ứng&nbsp;</strong>- Được xem là cõi Phật giữa chốn trần gian. Nơi&nbsp;có tượng Quan Âm cao nhất Việt Nam, được xem là một trong “Tứ Trấn Đà thành.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/04/01/17/ivivu-linh-ung-tu-ban-dao-son-tra-da-nang.jpg" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Chùa Linh Ứng -&nbsp;Tượng Phật linh thiêng và hùng vĩ giữa Sơn Trà.</em></p>
<p>Đoàn dùng bữa trưa với đặc sản Bánh Tráng Cuốn Thịt Heo, Mì Quảng, Bánh Bèo,...</p>
<p>Sau đó đoàn khởi hành về khách sạn nhận phòng nghỉ ngơi hoặc tự do tắm biển Mỹ Khê</p>
<p>16h00: Đoàn khởi hành đi tham quan:</p>
<p><strong>Ngũ Hành Sơn - Làng Nghề Điêu Khắc Đá Non Nước</strong> với các pho tượng bằng Đá được điêu khắc dưới bàn tay tài hoa của nghệ nhân nơi đây.&nbsp;</p>
<p><img title="" src="//cdn2.ivivu.com/2021/05/07/16/ivivu-ngu-hanh-son.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"><em>Ngũ Hành Sơn.</em></p>
<p>Xe đưa Quý khách khởi hành vào<strong> Hội An</strong> - Nơi mà cuộc sống cứ bình lặng, nơi mà dường như dòng chảy vô tình của thời gian chẳng thể nào vùi lấp đi cái không khí cổ xưa.</p>
<p><img title="" src="//cdn2.ivivu.com/2020/02/14/10/ivivu-hoi-an.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Phố Cổ Hội An yên bình với nét cổ kính huyền bí.</em></p>
<p>Du khách bách bộ tham quan Phố Cổ Hội An với Chùa Cầu Nhật Bản, Nhà Cổ, Hội Quán Phước Kiến và xưởng thủ công mỹ nghệ.</p>
<p>Đoàn tự do thưởng thức các món đặc sản tại Hội An như: Cao Lầu, Mì Quảng…</p>
<p>20h00: Đoàn khởi hành về lại Đà Nẵng nghỉ đêm. Tự do ngắm cảnh Đà Thành về đêm, tự do dạo phố biển.</p>',
                'thanh_pho' => 'Đà Nẵng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2022/06/22/17/ivivu-pho-co-hoi-an-1-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'ten_diem_den' => 'Đà Nẵng - Huế (Ăn Sáng, Tối)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại nhà hàng, trả phòng. Đoàn khởi hành đi tham quan:</p>
<p><strong>Cầu Tình Yêu</strong> - Đây là nơi minh chứng, ước hẹn cho các đôi lứa, ý nghĩa của ổ khóa tình yêu thể hiện một tình yêu bền chặt, vĩnh cửu.</p>
<p><strong>Tượng Đài Cá Chép Hoá Rồng</strong> là biểu tượng tâm linh của người Việt, thể hiện sự may mắn, thành công.</p>
<p><img title="" src="//cdn2.ivivu.com/2022/06/22/17/ivivu-da-nang.gif" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Tượng Đài Cá Chép Hoá Rồng.</em></p>
<p>Sau đó xe sẽ đưa đoàn đi tham quan chương trình&nbsp;<strong>Khám Phá Bà Nà Hills</strong>. Trải nghiệm cáp treo Bà Nà, ngắm nhìn cảnh quan núi rừng mây phủ, và thăm quan (Chi phí tự túc).</p>
<p><em><img title="" src="//cdn2.ivivu.com/2021/05/07/10/ivivu-ba-na-hill.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></em></p>
<p><em>Làng Pháp Bà Nà Hills.</em></p>
<p><strong>Chùa Linh Ứng</strong> trên Bà Nà Hills với tượng Phật Thích Ca cao 27m, cao 27m, viếng đền thờ Bà Chúa Mẫu Thượng Ngàn.</p>
<p><em><img title="" src="//cdn2.ivivu.com/2022/03/01/14/ivivu-chua-linh-ung-ba-na.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></em></p>
<p><em>Chùa Linh Ứng trên Bà Nà.</em></p>
<p><strong>Công viên Fantasy Park</strong>&nbsp;mang đến các trò chơi giải trí sôi động và Bảo tàng Sáp với những tượng sáp nhân vật nổi tiếng.</p>
<p><img title="" src="//cdn2.ivivu.com/2020/05/27/09/ivivu-cau-vang-dn.gif" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Cầu Vàng Bàn tay Phật trên Bà Nà.</em></p>
<p>Trưa: Đoàn dùng buffet tại Bà Nà (Chi phí Tự túc)&nbsp;</p>
<p>15h30: Đoàn khởi hành đi <strong>Cố Đô Huế</strong>&nbsp;- Di sản văn hoá Thế Giới, xuyên hầm đường bộ đèo Hải vân, dừng chân chụp ảnh <strong>Vịnh biển Lăng Cô</strong>.</p>
<p>Đến Huế, nhận phòng khách sạn nghỉ ngơi.</p>
<p>18h00: Quý khách dùng cơm tối tại nhà hàng. Bữa tối, khách tự do dạo phố về đêm. Nghỉ đêm tại Huế.</p>',
                'thanh_pho' => 'Đà Nẵng',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2021/05/07/10/ivivu-ba-na-hill-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'ten_diem_den' => 'Huế - Động Phong Nha (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<div _ngcontent-ng-c3806179398="" tourrichcontentimageloading="" class="tour-detail-rich-content tour-detail-program__day-body-inner"><p>Đoàn dùng bữa sáng tại khách sạn. Đoàn khởi hành đi Phong Nha - Kẻ Bàng Di Sản Thiên Nhiên Thế Giới.</p>
<p>Trên đường đi, đoàn viếng thăm <strong>Thánh Địa La Vang -&nbsp;</strong>Là một trong những địa điểm hành hương quan trọng không chỉ riêng đồng bào Công giáo, mà còn của cả người không Công giáo và khách du lịch quốc tế.</p>
<p>&nbsp;</p>
<p><img title="" src="//cdn2.ivivu.com/2019/02/13/15/ivivu-tour-da-nang-hue-thanh-dia-la-vang.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Thánh Địa La Vang.</em></p>
<p>Tiếp đến đoàn dừng chân ngắm nhìn <strong>Vĩ tuyến 17 - Cầu Hiền Lương - Sông Bến Hải</strong>.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/05/06/11/vi-tuyen-17-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Toàn cảnh ở&nbsp;Vĩ tuyến 17.</em></p>
<p>Đoàn dùng cơm trưa tại nhà hàng ở Phong Nha, nghỉ ngơi tại nhà hàng.</p>
<p>Tham quan <strong>Động Phong Nha</strong> bằng thuyền trên sông Son, khám phá hang động kỳ vĩ trong khu đá vôi nhiệt đới, với hơn 300 hang động đa dạng. Hang Bi Ký, Cô Tiên và Cung Đình là điểm nhấn, nơi sông ngầm từ Lào tạo nên cảnh quan huyền ảo.</p>
<p><img title="" src="//cdn2.ivivu.com/2019/02/13/15/ivivu-tour-da-nang-dong-phong-nha.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Khung cảnh bên trong Động Phong Nha.</em></p>
<p>15h30: Đoàn khởi hành về lại Cố Đô Huế theo đường&nbsp;Trường Sơn - Hồ Chí Minh&nbsp;Huyền Thoại.</p>
<p>Đoàn dùng cơm tối tại nhà hàng Đông Hà, Quảng Trị.</p>
<p>Đến Huế, về khách sạn nghỉ ngơi, tự do thưởng thức đặc sản và tham quan phố Huế về đêm.</p>',
                'thanh_pho' => 'Huế',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2022/05/12/18/phong-nha-ke-bang-view-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'ten_diem_den' => 'Huế - Đà Nẵng - HCM (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 4',
                'mo_ta' => '<p>Dùng bữa sáng tại khách sạn, làm thủ tục trả phòng. Đoàn tham quan:</p>
<p><strong>Đại Nội</strong> - Gắn liền cùng triều đại nhà Nguyễn với Ngọ Môn, điện Thái Hoà, Tử Cấm Thành, Thế Miếu, Hiển Lâm Các, Cửu Đỉnh. Đây cũng là một trong những di sản của Việt Nam được UNESCO ghi nhận là Di sản văn hóa thế giới.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/02/24/14/dai-noi-hue-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đại Nội Huế -&nbsp;Di sản&nbsp;nguy nga và cổ kính.</em></p>
<p><strong>Chùa Thiên Mụ</strong> - Biểu tượng linh thiêng của Huế, nằm trên đồi Hà Khê, bên sông Hương. Được ca ngợi trong thơ nhạc, chùa là điểm đến không thể bỏ qua, mang vẻ đẹp lịch sử, văn hóa đặc sắc.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/02/24/14/chua-thien-mu-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Chùa Thiên Mụ cổ kính - Nổi bật với tháp Phước Duyên uy nghi.</em></p>
<p>Khám phá <strong>làng nghề làm hương</strong> truyền thống Huế, nổi bật với khung cảnh rực rỡ sắc màu, điểm check-in ấn tượng.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/12/19/17/ivv-lang-huong-thuy-xuan.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Nghề làm hương truyền thống Huế.</em></p>
<p>Đoàn đến nhà hàng dùng cơm trưa.</p>
<p>Sau đó&nbsp;Xe đưa quý khách di chuyển về TP. Đà Nẵng, làm thủ tục bay chuyến dự kiến lúc&nbsp;<strong>QH173 18:40</strong> về TP.HCM. HDV chào tạm biệt du khách, kết thúc chương trình tham quan và hẹn gặp lại trong những tour tiếp theo.</p>',
                'thanh_pho' => 'Huế',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2018/05/14/17/ivivu-dai-noi-hue-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //tour 4
            [
                'id' => 14,
                'ten_diem_den' => 'HCM - Phan Thiết - Bikini Beach (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p><strong>Địa điểm đón/trả khách:&nbsp;</strong></p>
<p>- Nhà Văn Hóa Thanh Niên, Số 4 Phạm Ngọc Thạch, Quận 1.</p>
<p>- Thuận Kiều Plaza, Quận 5 (không có điểm gửi xe máy).</p>
<p>- 502 Quốc Lộ 13, TP Thủ Đức (đối diện Vạn Phúc City).</p>
<p>- Ngã 4 Thủ Đức, Xa Lộ Hà Nội, TP Hồ Chí Minh (không có điểm gửi xe máy).</p>
<p>- Ngã 4 Amata, Biên Hòa, Đồng Nai.</p>
<p>06h00:&nbsp;Xe và Hướng dẫn viên đón khách tại điểm hẹn. Đoàn dùng điểm tâm sáng tại nhà hàng.</p>
<p>Đến Phan Thiết, đoàn tham quan <strong>Bikini Beach</strong>, nơi du khách có thể check-in với các biểu tượng khổng lồ, cánh cửa đỏ, cổng Cầu Vồng, và nhiều điểm chụp ảnh hấp dẫn khác như nhà Gỗ, khung ảnh logo Novaworld Phan Thiết.</p>
<p><img title="" src="//cdn2.ivivu.com/2022/12/28/11/ivivu-bikini-beach-1.gif" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Bikini Beach.</em></p>
<p>Ngoài ra, du khách có thể tham gia các trò chơi cảm giác mạnh tại khu vui chơi <strong>Circus Land</strong> (vé trò chơi tự túc), mang lại trải nghiệm đầy vui nhộn và thách thức gan dạ.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/10/23/10/vekhuvuichoicircuslandphanthiet-ivivu.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Khu vui chơi&nbsp;Circus Land.</em></p>
<p>Đoàn dùng bữa trưa tại nhà hàng. Sau đó di chuyển về Mũi Né, nhận phòng Resort nghỉ ngơi<em> (Quy định checkin lúc 14h00, có thể nhận phòng sớm hơn nếu resort đã dọn xong phòng)</em>.</p>
<p>Chiều đoàn đến <strong>Pineapple Mũi Né Beach Bar</strong> - Không gian xinh đẹp mang đậm sắc màu nhiệt đới. Tại đây, ngoài quán bar chill lãng mạn, quý khách còn có thể ngắm cảnh biển nên thơ với hàng dừa cao và tiếng sóng rì rào, tạo nên không gian thư giãn tuyệt vời.</p>
<p><em>Chi phí ước uống tự túc, giá từ 40.000 - 70.000đ/ly.</em></p>
<p><em><img title="" src="//cdn2.ivivu.com/2026/01/12/16/pineapple-mui-ne-beach-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></em></p>
<p><em>Pineapple Mũi Né Beach Bar.</em></p>
<p>Hoặc Quý khách tự do tắm biển tại resort, khám phá Mũi Né.</p>
<p>Đoàn dùng bữa tối tại nhà hàng. Quý khách tự do khám phá Mũi Né về đêm.</p>',
                'thanh_pho' => 'Hồ Chí Minh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2024/10/23/10/circus-land-novaworld-ivv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'ten_diem_den' => 'Mũi Né - Bàu Trắng - HCM (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Quý khách dùng điểm tâm sáng tại Resort.</p>
<p>Khởi hành tham quan&nbsp;<strong>Bàu Trắng</strong> - "Tiểu sa mạc Sahara" nổi bật với đồi cát trắng và hồ sen. Tại đây, Quý khách sẽ được trải nghiệm một dịch vụ độc đáo và hấp dẫn <strong>khám phá đồi cát bằng xe Jeep hoặc xe địa hình</strong> (6-8 khách/ 01 xe). Cảm giác lướt trên những đồi cát rộng lớn với xe Jeep mang đến những cảm xúc phấn khởi khó quên (Đã bao gồm vé).</p>
<p><img title="" src="//cdn2.ivivu.com/2024/04/17/17/bau-trang-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Tiểu sa mạc Sahara, Bàu Trắng.</em></p>
<p>10h00: Đoàn về resort làm thủ tục trả phòng. Sau đó di chuyển dùng bữa trưa tại nhà hàng địa phương.</p>
<p>Tham quan <strong>Lâu Đài Rượu Vang</strong>&nbsp;- Khám phá kiến trúc Trung Cổ châu Âu, tọa lạc tại Sea Links City, với hầm rượu lớn và không gian sang trọng bậc nhất (vé vào cổng tự túc).</p>
<p><img title="" src="//cdn2.ivivu.com/2025/05/02/12/lau-dai-ruou-vang-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Quan cảnh bên ngoài của Lâu Đài Rượu Vang.</em></p>
<p>Check-in Rặng Dừa Hàm Tiến, Bãi Đá Ông Địa, sau đó khởi hành về TP.HCM.</p>
<p>Ghé mua đặc sản Phan Thiết: mực một nắng, nước mắm nhĩ, thanh long ruột đỏ/trắng… làm quà.</p>
<p>Kết thúc chương trình Tour Phan Thiết - Mũi Né 2N1Đ, HDV chia tay và hẹn gặp Quý khách ở chuyến tour sau.</p>',
                'thanh_pho' => 'Phan Thiết',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2022/03/09/16/ivivu-kdl-bau-trang-binh-thuan-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            //tour 5
            [
                'id' => 16,
                'ten_diem_den' => 'HCM - Quãng Ngãi (Nghỉ Đêm Trên Tàu)',
                'thoi_gian' => 'Đêm ngày 1',
                'mo_ta' => '<p>19h00: Hướng dẫn viên đón khách tại Ga Sài Gòn, bắt đầu cuộc hành trình đến với Quãng Ngãi. Quý khách nghỉ đêm trên tàu.</p>',
                'thanh_pho' => 'Hồ Chí Minh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2020/06/22/14/ivivu-ly-son-bia-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id' => 17,
                'ten_diem_den' => 'Quảng Ngãi - Đảo Lý Sơn (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>Quý khách dùng bữa sáng trên tàu.</p>
<p>Khoảng 10h30: Đến Ga Quảng Ngãi, xe đón đoàn dùng cơm trưa tại nhà hàng địa phương. Sau đó, khởi hành ra cảng Sa Kỳ làm thủ tục lên tàu đến đảo Lý Sơn.</p>
<p>14h30: Đến Lý Sơn, Quý khách nhận phòng nghỉ ngơi.</p>
<p>15h00: Xe và HDV đưa đoàn tham quan <strong>Núi Giếng Tiền</strong>, chinh phục hơn 100 bậc thang để viếng <strong>Chùa Đục</strong> - ngôi chùa linh thiêng nổi tiếng trên đảo. Tại đây, Quý khách chiêm ngưỡng tượng Quan Thế Âm Bồ Tát cao 27m và nghe kể về những truyền thuyết gắn liền với người dân đảo Lý Sơn.</p>
<p><img title="" src="//cdn2.ivivu.com/2021/03/03/09/ivivu-nui-gieng-tien.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Qaun cảnh Núi Giếng Tiền từ trên cao.</em></p>
<p><img title="" src="//cdn2.ivivu.com/2023/03/31/11/ivivu-chua-duc.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Chùa Đục.</em></p>
<p>&nbsp;Chụp hình hoàng hôn tại <strong>Cổng Tò Vò</strong>&nbsp;- Biểu tượng nổi tiếng của đảo Lý Sơn, nơi được ví như “Cổng Trời” giữa biển khơi. Dưới ánh bình minh hay hoàng hôn rực đỏ, vòm đá tự nhiên hiện lên đầy ấn tượng, tạo nên khung cảnh tuyệt đẹp cho những bức ảnh khó quên.</p>
<p><img title="" src="//cdn2.ivivu.com/2021/03/03/09/ivivu-cong-to-vo.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Cổng Tò Vò.</em></p>
<p>Quý khách dùng cơn tối tại nhà hàng&nbsp;địa phương, nghỉ ngơi. Quý khách tự do khám phá đảo Lý Sơn về đêm.</p>',
                'thanh_pho' => 'Quảng Ngãi',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2021/03/03/09/ivivu-nui-gieng-tien-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'ten_diem_den' => 'Đảo Bé - Núi Thới Lới - Hang Câu (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Quý khách dùng bữa sáng, sau đó khởi hành đi Đảo Bé.</p>
<p>Đoàn khởi hành bằng ca nô tham quan <strong>Đảo Bé Lý Sơn</strong> (đảo An Bình) - Hòn đảo nổi tiếng với bãi cát trắng, nước biển trong xanh và không gian yên bình. Trên đường tham quan, Quý khách ngắm nhìn những cánh đồng tỏi đặc trưng và check-in tại vách đá trầm tích núi lửa hàng triệu năm tuổi.</p>
<p><img title="" src="//cdn2.ivivu.com/2020/06/04/09/ivivu-dao-be.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đảo Bé.</em></p>
<p>Quý khách dùng bữa trưa tại nhà hàng địa phương.</p>
<p>Chiều tham quan<strong> Bảo tàng Hải đội Hoàng Sa Kiêm Bắc Hải</strong>, tìm hiểu các hiện vật khẳng định chủ quyền biển đảo Việt Nam và nghe kể về Giếng Vua Gia Long (giếng Xó La).</p>
<p><img title="" src="//cdn2.ivivu.com/2020/06/22/14/ivivu-hoang-sa-bac-ho.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Hải Đội&nbsp;Hoàng Sa Kiêm Bắc Hải.</em></p>
<p><strong>Núi Thới Lới</strong>&nbsp;- Ngọn núi cao nhất Lý Sơn với tầm nhìn toàn cảnh đảo tuyệt đẹp.</p>
<p><img title="" src="//cdn2.ivivu.com/2022/04/27/11/ivivu-ly-son-thoi-loi.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Núi Thới Lới.</em></p>
<p><strong>Hang Câu</strong>&nbsp;- Thắng cảnh nổi tiếng với làn nước trong xanh và khung cảnh núi đá hùng vĩ ven biển.</p>
<p><img title="" src="//cdn2.ivivu.com/2021/03/03/09/ivivu-hang-cau.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Hang Cau.</em></p>
<p><strong>Chùa Hang</strong> - Ngôi chùa linh thiêng nổi tiếng trên đảo, cầu bình an và may mắn. Trên đường đi, đoàn ngắm nhìn những cánh đồng tỏi xanh mướt, đặc sản nổi tiếng của Lý Sơn.</p>
<p><img title="" src="//cdn2.ivivu.com/2022/04/27/11/ivivu-chua-hang.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Chùa Hang.</em></p>
<p>Quý khách dùng bữa tối tại nhà hàng địa phương. Về kahsch sạn nghỉ ngơi.</p>',
                'thanh_pho' => 'Quảng Ngãi',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2020/06/04/09/ivivu-dao-be-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'ten_diem_den' => 'Đảo Lý Sơn - Quảng Ngãi (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<p>Khoảng 07h00 Quý khách dùng bữa sáng tại nhà hàng, tự do tham quan và mua sắm đặc sản về làm quà cho người thân, bạn bè.</p>
<p>09h00: Đoàn làm thủ tục trả phòng khách sạn</p>
<p>Khoảng 10h00: Quý khách lên tàu cao tốc trở về cảng Sa Kỳ.</p>
<p>Sau đó, đoàn tham quan <strong>Chùa Thiên Ấn</strong>&nbsp;- Ngôi chùa cổ nổi tiếng được mệnh danh là “Đệ nhất thắng cảnh” của Quảng Ngãi với kiến trúc cổ kính và không gian thanh tịnh.</p>
<p><img title="" src="//cdn2.ivivu.com/2021/03/03/09/ivivu-chua-thien-an.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"><em>Chùa Thiên Ẩn.</em></p>
<p>Quý khách&nbsp;dùng bữa trưa tại nhà hàng địa phương.</p>
<p>Khoảng 13h30: Đoàn có mặt tại Ga Quảng Ngãi, lên tàu khởi hành về TP.HCM. Quý khách tự túc dùng bữa tối trên tàu.</p>',
                'thanh_pho' => 'Quảng Ngãi',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2021/03/03/09/ivivu-chua-thien-an-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'ten_diem_den' => 'Thành Phố Hồ Chí Minh',
                'thoi_gian' => 'Ngày 4',
                'mo_ta' => '<p>04h45. Tàu tới ga Sài Gòn. HDV chia tay và hẹn gặp lại Quý khách trên các chương trình tiếp theo.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2016/02/18/16/dao-ly-son-1-120x76.JPG',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Tour Ngoài nước
            // tour 6
            [
                'id' => 21,
                'ten_diem_den' => 'HCM - Lệ Giang (Ăn Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>Quý khách có mặt tại sân bay Tân Sơn Nhất ga đi quốc tế. Trưởng Đoàn hướng dẫn làm thủ tục chuyến&nbsp;<strong>DR5052 14:05 - 18:35</strong>&nbsp;đi Lệ Giang.&nbsp;</p>
<p>Đoàn đến sân bay Lệ Giang, HDV đón đoàn dùng cơm tối, sau đó về khách sạn nhận phòng nghỉ ngơi.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2024/03/07/16/ho-nhi-hai-van-nam-ivv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 22,
                'ten_diem_den' => 'Lệ Giang - Đại Lý (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại khách sạn. Đoàn khởi hành đi Đại Lý bằng xe, tham quan:</p>
<p><strong>Hỷ Châu Cổ Trấn</strong> - Nơi sinh sống của người Nạp Tây (Naxi). Nổi bật với nhà cổ mái ngói đen, phố đá sạch sẽ và bề dày văn hóa. Còn gọi là “Vùng Đất Hạnh Phúc”, Hỷ Châu mang ý nghĩa thịnh vượng, may mắn và an lành.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/04/04/19/quang-truong-hy-chau-co-tran-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Hỷ Châu Cổ Trấn - Ngôi làng cổ yên bình ở Đại Lý.</em></p>
<p>Đoàn dùng cơm trưa tại nhà hàng <strong>view hồ Nhĩ Hải</strong>. Tiếp tục tham quan:</p>
<p><strong>Hành lang sinh thái Erhai</strong> (Hành Lang Nhĩ Hải) - Hồ trong vắt và cảnh quan thức tỉnh mùa xuân với đàn hải âu và bầu trời trong xanh.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/03/07/16/ho-nhi-hai-van-nam-ivv.gif" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Phong cảnh Hồ Nhĩ Hải.</em></p>
<p><strong>Tam Tháp</strong> (tham quan bên ngoài) - Trong 3 tháp có 1 ngọn tháp cao nhất cao 69m, 16 tầng. tòa tháp chính - Thiên Thuần&nbsp;là một trong những nơi linh thiêng cao nhất và minh chứng cho&nbsp;sự phát triển rực rỡ của Phật giáo&nbsp;vào thời nhà Đường.</p>
<p><img title="" src="//cdn2.ivivu.com/2019/06/24/16/ivivu-dai-ly-tam-thap.jpg" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Tam Tháp Đại Lý in bóng nên thơ trên mặt hồ.</em></p>
<p><strong>Thành cổ Đại Lý</strong> - Cố đô của nước Đại Lý xưa, tọa lạc nơi “lưng tựa Thương Sơn, mặt hướng Nhĩ Hải”, bên cạnh Tam Tháp Đại Lý linh thiêng.&nbsp;</p>
<p>Đoàn dùng cơm tối tại nhà hàng địa phương, về khách sạn nhận phòng nghỉ ngơi.</p>
<p>Đoàn nghỉ đêm tại khách sạn Đại Lý.</p>',
                'thanh_pho' => 'Lệ Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2025/04/04/19/quang-truong-hy-chau-co-tran-ivv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 23,
                'ten_diem_den' => 'Đại Lý - Shangrila (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại khách sạn, Đoàn khởi hành đi Shangrila, dọc đường đoàn tham quan:</p>
<p><strong>Khe Hổ Nhảy</strong>&nbsp;- Hẻm núi sâu nhất thế giới, dài hơn 15km giữa Ngọc Long và Ha Ba Tuyết Sơn, nổi tiếng với cảnh tượng hùng vĩ và dòng Kim Sa chảy siết.&nbsp;(Không gồm phí thang máy)</p>
<p><img title="" src="//cdn2.ivivu.com/2019/09/23/09/ivivu-khe-ho-nhay6.jpg" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Khe Hổ Nhảy - Nơi dòng chảy mạnh mẽ tạo nên cảnh quan thiên nhiên đầy mê hoặc.</em></p>
<p>Đoàn dùng cơm trưa, sau đó tiếp tục di chuyển tham quan:</p>
<p><strong>Bạch Tháp</strong> (tham quan bên ngoài) - Còn gọi là Hòa Hợp Tháp trong Tháp, một trong những tháp trắng lớn và linh thiêng của Phật giáo Tây Tạng, tọa lạc gần lối vào thành phố Shangri-La và được xem là biểu tượng tâm linh của vùng đất này.</p>
<p><strong>Check-in cờ Lungta Shangri-La</strong> - Rừng cờ cầu nguyện khổng lồ với sắc màu rực rỡ, in kinh chú trên những cột gỗ cao giữa núi trời. “Lungta” trong tiếng Tạng nghĩa là “ngựa gió”, biểu tượng của may mắn và bình an.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/11/21/17/co-lungta-le-giang-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Cờ Lungta Shangri-La.</em></p>
<p><strong>Thành cổ DuKeZong</strong> (Thành cổ Ánh Trăng) - Nơi tập trung sinh sống lâu đời của người Tạng có tuổi đời trên 1.300 năm được bảo tồn tốt nhất ở Trung Quốc.</p>
<p>Đoàn dùng bữa tối. Nghỉ đêm tại Shangri-La.</p>',
                'thanh_pho' => 'Đại Lý',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2024/02/16/17/thanh-co-dai-ly-4-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 24,
                'ten_diem_den' => 'Shangrila - Lệ Giang (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 4',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại khách sạn, Đoàn tham quan:</p>
<p><strong>Đền Songzanlin (Tùng Tán Lâm)&nbsp;</strong>- Tu viện Phật giáo Mật Tông Tây Tạng lớn nhất Vân Nam, cao 3.300m, được Đạt Lai Lạt Ma thứ 5 xây dựng, bản thu nhỏ của Cung điện Potala.</p>
<p><img title="" src="//cdn2.ivivu.com/2019/09/23/10/ivivu-songzanlinsi6.jpg" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đền Songzanlin - Viên ngọc kiến trúc của Shangrila.</em></p>
<p>Đoàn dùng cơm trưa món tại nhà hàng địa phương, sau đó tiếp tục hành trình về Lệ Giang và tham quan:</p>
<p><strong>Công viên Hắc Long Đàm&nbsp;</strong>- Tọa lạc chân núi Voi gần Lệ Giang, nổi bật với vẻ đẹp tự nhiên, nước từ núi Tuyết Ngọc Long, tạo khung cảnh sơn thuỷ hữu tình, ngắm núi tuyết qua mặt hồ yên bình.&nbsp;</p>
<p><img title="" src="//cdn2.ivivu.com/2024/12/03/16/hac-long-dam-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Công viên Hắc Long Đàm - Hòa mình vào thiên nhiên với cảnh quan nên thơ.</em></p>
<p>Đoàn dùng bữa tối tự túc,&nbsp;về khách sạn nhận phòng nghỉ ngơi hoặc tham gia thưởng thức show “Lệ Giang Thiên Cổ Tình” (tự phí).</p>',
                'thanh_pho' => 'Shangrila',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2019/09/23/10/ivivu-songzanlinsi6-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 25,
                'ten_diem_den' => 'Lệ Giang (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 5',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại khách sạn. Đoàn khởi hành tham quan khu phong cảnh Núi Tuyết:</p>
<p><strong>Núi Tuyết Ngọc Long</strong>&nbsp;- Quanh năm tuyết phủ trắng bao phủ một khu vực rộng lớn giống như con rồng lớn nên được gọi là “Ngọc Long”.&nbsp; Đoàn đi cáp treo lớn lên núi với độ cao 4.506m và chụp ảnh lưu niệm (bao gồm cáp treo).</p>
<p>Trường hợp cáp lên đỉnh núi Ngọc Long sửa chữa, thời tiết xấu hoặc mùa cao điểm không thể đi cáp lớn lên núi 4.506m, đoàn chuyển sang đi cáp Vân Sam Bình tới độ cao 3.200m.</p>
<p><em><img title="" src="//cdn2.ivivu.com/2024/03/21/17/nui-tuyet-ngoc-long-le-giang-ivv.gif" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></em></p>
<p><em>Núi Tuyết Ngọc Long - Một biểu tượng của vẻ đẹp thiên nhiên kỳ vĩ.</em></p>
<p>Tặng show biểu diễn<strong>&nbsp;Ấn Tượng Lệ Giang </strong>(Nếu Show không diễn được vì lý do thời tiết, không hoàn tiền).</p>
<p><img title="" src="//cdn2.ivivu.com/2023/05/25/11/ivivu-show-an-tuong-le-giang.jpg" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Show diễn Ấn Tượng Lệ Giang - Một bức tranh sống động.</em></p>
<p>Đoàn dùng&nbsp;bữa trưa tại nhà hàng địa phương.</p>
<p>Đoàn tiếp tục tham quan: <strong>Sông Bạch Thuỷ Hà</strong>, <strong>Lam Nguyệt Cóc</strong> (không gồm phí đi xe điện).</p>
<p>Đoàn di chuyển đến <strong>Ngọc Thủy Trại</strong> - Tại đây du khách có cơ hội chiêm ngưỡng nét<br>đẹp văn hóa Đông Ba hơn 1000 năm lịch sử của dân tộc Nạp Tây.</p>
<p>Bữa tối đoàn dùng cơm tối và tự do tham quan:</p>
<p><strong>Thành Cổ Lệ Giang</strong>&nbsp;- Di sản văn hóa thế giới UNESCO từ 1997, hơn 800 năm tuổi, được mệnh danh Venice của Phương Đông với suối quanh nhà, liễu rủ và cầu xinh.</p>
<p>Đoàn nghỉ đêm tại khách sạn Lệ Giang.</p>',
                'thanh_pho' => 'Lệ Giang',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2024/03/21/17/nui-tuyet-ngoc-long-le-giang-ivv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 26,
                'ten_diem_den' => 'Lệ Giang - HCM (Ăn Sáng)',
                'thoi_gian' => 'Ngày 6',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại khách sạn và làm thủ tục trả phòng.</p>
<p>Đến giờ hẹn, HDV đưa đoàn ra sân bây Lệ Giang đáp chuyến<strong> DR5051 10:40 - 13:05&nbsp;</strong>về lại Việt Nam.</p>
<p>Về đến sân bay Tân Sơn Nhất. Kết thúc chương trình, chia tay và hẹn gặp lại.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2025/02/26/15/dai-ly-ivv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //tour 7
            [
                'id' => 27,
                'ten_diem_den' => 'HCM - Singapore (Ăn Trưa Nhẹ, Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>Trưởng Đoàn đón Quý khách tại điểm hẹn, làm thủ tục khởi hành đi Singapore. Tới&nbsp;sân bay quốc tế Changi, làm thủ tục nhập cảnh.</p>
<p>Xe và hướng dẫn đưa đoàn ăn trưa, sau đó đoàn bắt đầu tham quan:</p>
<p><strong>Tòa nhà Quốc Hội </strong>(Parliament House) (tham quan bên ngoài).</p>
<p><strong>Công viên Sư Tử biển</strong> -&nbsp;Biểu tượng của đất nước Singapore.</p>
<p><img title="" src="//cdn2.ivivu.com/2017/05/10/17/ivivu-cong-vien-su-tu-bien-merlion-park-.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Công viên sư tử biển (Merlion Park).</em></p>
<p><strong>Nhà hát Victoria -&nbsp;</strong>Nhà hát cổ kính nhất Singapore. Nơi đây là tâm điểm cho nghệ thuật biểu diễn của đảo quốc sư tử ngay từ thời thuộc địa.</p>
<p><strong>Nhà hát Esplanade</strong> nổi tiếng với biểu tượng “trái sầu riêng”.</p>
<p><img title="" src="//cdn2.ivivu.com/2022/03/28/17/ivivu-nha-hat-trai-sau-rieng-singapore.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Nhà hát Esplanade, biểu tượng văn hóa của Singapore.</em></p>
<p><strong>Faber Mount</strong> - Đỉnh núi của đảo quốc Sư tử, nơi đây quý khách được ngắm nhìn toàn cảnh Singapore từ trên cao.</p>
<p>Đoàn dùng bữa tối. Nhận phòng nghỉ ngơi, tự do vui chơi hoặc tham gia chương trình <strong>Singapore By Night</strong>&nbsp;(Chi phí tự túc)</p>
<p>- Khám phá cuộc sống trong lòng đất của người dân Singapore bằng <strong>Tàu điện ngầm MRT</strong>.</p>
<p>- Trải nghiệm Du thuyền trên dòng sông Singapore ngắm cảnh <strong>vịnh Marina Bay</strong> về đêm.</p>
<p><img title="" src="//cdn2.ivivu.com/2017/03/28/09/ivivu-tour-singapore-3n2d-sentosa-sea-aquarium-garden-by-the-bay-marina-barrage-anh-dai-dien-1.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Vịnh&nbsp;Marina Bay:&nbsp;quần thể kiến trúc tạo nên bức tranh tuyệt mỹ</em></p>
<p>- Xem show nhạc nước đặc sắc tại Trung tâm thương mại Marina By Sand.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2022/03/28/17/ivivu-jewel-changi-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 28,
                'ten_diem_den' => 'City Tour Singapore (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Đoàn dùng bữa sáng tại khách sạn. Sau đó, xe đưa đoàn tham quan:</p>
<p><strong>Kỳ quan Gardens by the Bay</strong>&nbsp;- Một công viên tự nhiên bao gồm ba khu vườn ở ven sông: Vườn Vịnh Nam, Vườn Vịnh Đông và Vườn Vịnh Trung tâm, trong đó Vườn Vịnh Nam với những cây nhân tạo (Qúy khách chụp ảnh bên ngoài).</p>
<p><img title="" src="//cdn2.ivivu.com/2024/07/09/17/gardens-by-the-bay-singapore-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Gardens by the Bay: Kỳ quan kiến trúc xanh tại Singapore.</em></p>
<p><strong>Marina Barrage</strong> - Hồ nhân tạo giữa trung tâm Singapore với lưu vực 10.000 ha - kiệt tác cải tạo thiên nhiên, nơi tổ chức các sự kiện thể thao dưới nước và trưng bày nghệ thuật độc đáo.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/06/11/11/marina-barrage-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Marina Barrage.</em></p>
<p>Tham quan cửa hàng&nbsp;kim cương, đá quý và cửa hàng dầu gió, Collagen dưỡng da - Các sản phẩm truyền thống nổi tiếng của Singapore. Singapore.</p>
<p>Đoàn dùng bữa trưa <strong>Buffet BBQ</strong> hấp dẫn. Chuyến tham quan tiếp tục với <strong>đảo Sentosa</strong>, nổi tiếng với cơ hội chụp hình tại cổng <strong>Universal Studios</strong>.</p>
<p><strong><img title="" src="//cdn2.ivivu.com/2022/04/12/10/ivivu-universal-studios.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></strong></p>
<p><em>Universal Studios Singapore, một công viên giải trí hàng đầu ở Sentosa.</em></p>
<p><strong>Trải nghiệm tàu điện đến Vivo City</strong>. Tự do mua sắm tại trung tâm thương mại sầm uất và khám phá các món ăn đặc sắc của đất nước sạch đẹp này.</p>
<p>Quý khách dùng bữa tối tại nhà hàng. Tự do khám phá Singapore về đêm.</p>',
                'thanh_pho' => 'Singapore',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2024/07/09/17/gardens-by-the-bay-sing-ivv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 29,
                'ten_diem_den' => 'Singapore - HCM (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<p>Đoàn dùng bữa sáng tại khách sạn làm thủ tục trả phòng, khởi hành tham quan:</p>
<p><strong>Chùa Răng Phật</strong> -&nbsp;Nằm trong khu Chinatown, ngôi chùa linh thiêng lưu giữ xá lợi - chiếc răng nanh được cho là của Đức Phật, thu hút đông đảo Phật tử và du khách viếng thăm.</p>
<p><img title="" src="//cdn2.ivivu.com/2023/10/27/16/ivivu-chua-rang-phat-singapore-5.gif" alt="" width="710" height="399" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Chùa răng Phật.</em></p>
<p><strong>Haji Lane</strong> - Những con đường dài, hẹp ẩn sau khu Kampong Glam, với những nhà hàng và cửa hàng mang phong cách hiện đại và các cửa hàng thời trang độc đáo, chắc chắn sẽ làm bạn say mê từ cái nhìn đầu tiên.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/11/13/11/haji-lane-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Haji Lane.</em></p>
<p>Đoàn dùng bữa trưa tại nhà hàng địa phương.</p>
<p>Sau đó đoàn di chuyển đến sân bay,&nbsp;tham quan <strong>Kỳ quan Jewel Changi</strong> - Thác nước trung tâm sân bay Changi.</p>
<p>Đến giờ hẹn, HDV hỗ trợ đoàn làm thủ tục&nbsp;về Việt Nam. Kết thúc chương trình, chia tay và hẹn gặp lại Quý khách trên những chương trình tiếp theo.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2023/10/27/16/ivivu-chua-rang-phat-singapore-5-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // tour 8
            [
                'id' => 30,
                'ten_diem_den' => 'HCM - Siem Reap (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>Khoảng 04h30: HDV đón đoàn tại điểm hẹn Bưu Điện TP.HCM, khởi hành đến Trảng Bàng, dùng điểm tâm sáng và làm thủ tục xuất cảnh Việt Nam, nhập cảnh Campuchia và tiếp tục đến Siem Reap.</p>
<p>Quý khách dùng cơm trưa tại tỉnh Kampong Cham,&nbsp;sau đó tiếp tục đi Siem Reap.</p>
<p>Đến Siem Reap, Quý khách dùng bữa tối và nhận khách sạn nghỉ ngơi. Tự do về đêm.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2022/03/29/16/ivivu-quan-the-den-angkor-wat-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 31,
                'ten_diem_den' => 'Siem Reap - Đền Angkor Wat (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Quý khách dùng điểm tâm tại khách sạn, khởi hành tham quan:</p>
<p><strong>Đền Angkor Wat</strong> - Biểu tượng vĩ đại của Campuchia với kiến trúc Khmer tráng lệ, được xem là một trong những kỳ quan tôn giáo lớn nhất thế giới.</p>
<p><img title="" src="//cdn2.ivivu.com/2022/03/29/16/ivivu-quan-the-den-angkor-wat.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đền Angkor Wat.</em></p>
<p>Quý khách&nbsp;dùng bữa trưa, về khách sạn nghỉ ngơi.</p>
<p>Buổi chiều, đoàn trải nghiệm xe Tuk Tuk tham quan:</p>
<p><strong>Đền Bayon</strong> - <strong>Angkor Thom</strong> nổi bật với những gương mặt đá khổng lồ đầy huyền bí.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/04/06/14/den-bayon-angkor-thom-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đền Bayon.</em></p>
<p><strong>Đền Ta Prohm</strong> - Ngôi đền rêu phong được ôm trọn bởi rễ cây cổ thụ độc đáo.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/04/06/14/den-ta-prohm-campuchia-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đền Ta Prohm.</em></p>
<p>Quý khách dùng bữa tối<strong> buffet và xem múa Apsara truyền thống</strong> quyến rũ.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/07/24/17/mua-apsara-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Múa Apsara truyền thống.</em></p>
<p>Sau đó, Quý khách tự do dạo chợ đêm Siem Reap, thưởng thức ẩm thực địa phương hoặc trải nghiệm massage thư giãn (chi phí tự túc).</p>',
                'thanh_pho' => 'Siem Reap',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2026/04/06/14/den-bayon-angkor-thom-ivv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 32,
                'ten_diem_den' => 'Siem Reap - Phnom Penh (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<p>Quý khách dùng điểm tâm tại khách sạn, làm thủ tục trả phòng và khởi hành về thủ đô Phnom Penh. Trên đường đoàn tham quan:</p>
<p><strong>Chợ Côn Trùng</strong> - Điểm dừng chân độc đáo với các món ăn đặc sản địa phương như dế, nhện chiên giòn.</p>
<p><strong>Cầu cổ Kompong Kdei</strong> - Cây cầu đá cổ hơn 1.000 năm tuổi mang dấu ấn kiến trúc Angkor.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/04/06/14/cau-co-kompong-kdei-campuchia-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Cầu cổ Kompong Kdei.</em></p>
<p>Đoàn dùng bữa trưa<strong> buffet lẩu băng chuyền Kaka Suki Soup</strong>. Tiếp tục khởi hành tham quan thủ đô Phnom Penh:</p>
<p><strong>Cung Điện Hoàng Gia và Chùa Vàng Bạc</strong><em> -</em> Quần thể kiến trúc lộng lẫy, biểu tượng hoàng gia Campuchia.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/04/06/14/cung-dien-hoang-gia-campuchia-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>&nbsp;Cung Điện Hoàng Gia<strong>.</strong></em></p>
<p><strong>Đài Độc Lập</strong> - Công trình ghi dấu lịch sử và niềm tự hào dân tộc.</p>
<p><strong>Du thuyền sông Bốn Mặt</strong> - Ngắm hoàng hôn Phnom Penh lãng mạn bên dòng Mekong.</p>
<p><strong>Casino NagaWorld</strong> - Tổ hợp giải trí và mua sắm nổi tiếng của thủ đô.</p>
<p>Quý khách dùng bữa tối tại nhà hàng địa phương, sau đó tự do khám phá Phnom Penh về đêm.</p>',
                'thanh_pho' => 'Phnom Penh',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2022/03/29/16/ivivu-dai-tuong-niem-viet-campuchia-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 33,
                'ten_diem_den' => 'Phnom Penh - HCM (Ăn Sáng, Trưa)',
                'thoi_gian' => 'Ngày 4',
                'mo_ta' => '<p>Quý khách dùng điểm tâm tại khách sạn, trả phòng. Sau đó tham quan:</p>
<p><strong>Chợ Lớn Mới Phnom Penh</strong> (Phsar Thmey) - Khu chợ trung tâm nổi bật với kiến trúc mái vòm độc đáo, nơi bày bán đa dạng đặc sản, quà lưu niệm và hàng hóa địa phương.</p>
<p><img title="" src="//cdn2.ivivu.com/2014/12/03/17/trung-tam-mua-sam-o-phnom-penh-campuchia.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Chợ Lớn Mới Phnom Penh (Phsar Thmey).</em></p>
<p>Quý khách dùng <strong>bữa trưa buffet</strong> tại nhà hàng Tonle Basac II, sau đó khởi hành về cửa khẩu Bavet.</p>
<p>Đến cửa khẩu Bavet, HDV hỗ trợ đoàn làm thủ tục xuất cảnh Campuchia và nhập cảnh Việt Nam.</p>
<p>Tiếp tục hành trình về TP.HCM, đến điểm đón ban đầu, kết thúc chương trình tour Campuchia, chia tay và hẹn gặp lại Quý khách trên các chương trình tiếp theo.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2026/04/06/14/den-bayon-angkor-thom-ivv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //tour 9
            [
                'id' => 34,
                'ten_diem_den' => 'HCM - Phuket (Ăn Chiều Nhẹ, Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>Khoảng 13h30: Quý khách có mặt tại ga đi quốc tế sân bay Tân Sơn Nhất, Trưởng đoàn hướng dẫn làm thủ thục chuyến&nbsp;<strong>VN621 16:00 - 17:50</strong> đến Phuket.&nbsp;Quý khách dùng bữa chiều nhẹ trên máy bay.</p>
<p>Đoàn tới sân bay Phuket, chào đón Quý khách đến với vương quốc của nụ cười Thái Lan.</p>
<p>Xe đưa đoàn đi ăn tối tại nhà hàng địa phương. Sau đó về khách sạn nghỉ ngơi tự do khám phá Phuket về đêm.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2019/11/01/11/ivivu-chalong-120x76.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 35,
                'ten_diem_den' => 'Khám Phá Đảo Phi Phi (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại khách sạn. Xe và HDV sẽ đưa đoàn di chuyển đến bến tàu đi tham quan đảo Phi Phi.</p>
<p>Đến đ<strong>ảo Phi Phi,</strong> Quý khách tự do tắm biển, thư giãn và tận hưởng vẻ đẹp thiên nhiên của Phi Phi.</p>
<p>Tàu chạy về bãi biển Ton Sai để ăn trưa và nghỉ ngơi.</p>
<p>Buổi chiều, đoàn tham quan<strong> vịnh Maya</strong>&nbsp;- Bãi biển nổi tiếng với dải cát trắng mịn nằm giữa những vách đá cao hùng vĩ và làn nước xanh ngọc tuyệt đẹp, từng là bối cảnh phim The Beach.</p>
<p><img title="" src="//cdn2.ivivu.com/2022/05/20/17/ivivu-maya-bay2.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Toàn cảnh vịnh Maya.</em></p>
<p>Tiếp tục hành trình, tàu đưa Quý khách khám phá quần <strong>đảo Khai -</strong>&nbsp;Trải nghiệm lặn ngắm rặng san hô và môi trường sống dưới biển cực kỳ sinh động cùng các loài cá độc đáo (gồm lặn ngắm san hô cơ bản).</p>
<p><img title="" src="//cdn2.ivivu.com/2026/03/11/14/dao-khai-phuket.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Quan cảnh đảo Khai, Phuket.</em></p>
<p>Về lại bến tàu, Xe đưa đoàn tham quan và chụp hình tại <strong>Prom Thep Cape View Point</strong> là điểm cực Nam của Phuket. Là điểm ngắm hoàng hôn cực đẹp tại Phuket.</p>
<p><img title="" src="//cdn2.ivivu.com/2017/12/29/17/ivivu-laem-promthep-view-point.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Prom Thep Cape View Point.</em></p>
<p>Đoàn ăn tối tại nhà hàng Thái. Về lại khách sạn, tự do khám phá khu phố Patong về đêm.</p>',
                'thanh_pho' => 'Phuket',
                'tinh_trang' => 1,
                'hinh_anh' => '	https://cdn2.ivivu.com/2022/04/19/11/ivivu-dao-phi-phi-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 36,
                'ten_diem_den' => 'City Tour Phuket (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<p>Quý khách dùng bữa sáng tại khách sạn, sau đó tham quan:</p>
<p>Tham quan dọc bờ <strong>biển Karon Beach</strong>.</p>
<p><strong>Chùa Hoàng Gia Kathu&nbsp;</strong>- Ngôi chùa linh thiêng nổi tiếng tại Phuket, cầu bình an và may mắn cho gia đình. Tiếp tục trải nghiệm xe goòng khám phá hang động tại trung tâm trang sức vàng bạc đá quý lớn của Thái Lan.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/06/26/17/kathu-phuket-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Chùa Hoàng Gia Kathu.</em></p>
<p>Quý khách dùng bữa tại nhà hàng địa phương.</p>
<p>Ghé <strong>cửa hàng bánh kẹo địa phương</strong> “The Pornthip Sea Store” để mua quà lưu niệm, bánh kẹo, dầu Thailand, …</p>
<p>Quý khách dạo<strong>&nbsp;phố cổ Phuket</strong> với những tòa nhà mang kiến trúc Bồ Đào Nha cổ kính, tự do chụp ảnh và mua sắm quà lưu niệm.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/02/27/15/pho-co-phuket-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Phố cổ Phuket.</em></p>
<p>Đoàn tiếp tục mua sắm tại <strong>khu miễn thuế King Power</strong> và <strong>trung tâm thương mại Central Festival Phuket</strong> với nhiều thương hiệu nổi tiếng.</p>
<p>Quý khách thưởng thức<strong>&nbsp;BBQ hải sản</strong>. Sau đó tự do khám phá phố đêm Patong Walking Street sôi động.</p>
<p><strong>Ngoài ra, Quý khách có thể đổi chương trình tham quan Vịnh Phang Nga</strong>&nbsp;(phụ thu khoảng 75 USD/khách):</p>
<p>08h00: Xe đưa đoàn đến bến cảng, đi cano khám phá Vịnh Phang Nga - Check-in 5 hòn đảo nổi tiếng trong quần thể hơn 300 đảo đá vôi kỳ vĩ.</p>
<p><strong>Đảo James Bond</strong>&nbsp;- Bối cảnh bộ phim Điệp Viên 007 nổi tiếng.</p>
<p><strong>Đảo Koh Hong</strong>&nbsp;- Trải nghiệm chèo thuyền kayak khám phá hang động và vịnh kín tuyệt đẹp.</p>
<p><strong>Đảo Koh Panyee</strong>&nbsp;- Làng nổi Hồi giáo độc đáo, dùng buffet trưa và tìm hiểu đời sống người dân địa phương.</p>
<p><strong>Đảo Koh Pannak</strong>&nbsp;- Khám phá hang động và “khu vườn địa đàng” ẩn mình giữa biển.</p>
<p><strong>Đảo Naga</strong> - Tự do tắm biển, thư giãn trên bãi cát trắng và tham gia các trò chơi biển (chi phí tự túc thêm).</p>
<p>16h00: Trở về Phuket, đoàn dùng bữa tối BBQ thịt nướng và hải sản địa phương.</p>
<p><img title="" src="//cdn2.ivivu.com/2018/10/22/14/ivivu-vinh-phang-nga.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Vịnh phang Nga.</em></p>',
                'thanh_pho' => 'Phuket',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2026/03/11/14/dao-khai-phuket-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 37,
                'ten_diem_den' => 'Phuket - HCM (Ăn Sáng)',
                'thoi_gian' => 'Ngày 4',
                'mo_ta' => '<p>Đoàn dùng bữa sáng tại khách sạn, sau đó làm thủ tục trả phòng.</p>
<p><strong>Đền Chalong</strong> - Ngôi đền là một biểu tượng Phật giáo không thể thiếu khi đến với Phuket. Tại đây có bày bán các sợi dây cầu may được chính các vị sư trong chùa làm phép để mang lại sự bình an cho gia chủ.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/03/19/17/wat-chalong-0.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đền Chalong.</em></p>
<p>Quý khách tự do&nbsp;<strong>mua sắm tại các cửa hàng khu biển Patong</strong>&nbsp;gần khách sạn.</p>
<p>Đến giờ, Xe và HDV đón đoàn ra sân bay làm thủ tục đáp chuyến bay&nbsp;<strong>VN620 18:45 - 20:45&nbsp;</strong>về lại Việt Nam.</p>
<p>Đoàn về tới TP.HCM, chia tay Quý khách. Hẹn gặp lại Quý khách trong những chuyến đi tiếp theo.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => '	https://cdn2.ivivu.com/2026/03/11/11/phuket-bien-laem-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //tour 10
            [
                'id' => 38,
                'ten_diem_den' => 'HCM - Tokyo (Nghỉ Đêm Trên Máy Bay)',
                'thoi_gian' => 'Đêm 1',
                'mo_ta' => '<p>Khoảng 20h20: Qúy khách tập trung tại Ga quốc tế Tân Sơn Nhất. Hướng dẫn viên sẽ đón Quý khách tại sân bay quốc tế Tân Sơn Nhất - Ga đi Quốc tế, làm thủ tục đáp chuyến bay đi Narita&nbsp;<strong>VJ822 SGN NRT (23h55 - 07h55)</strong></p>
<p>Quý khách nghỉ đêm trên máy bay.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2019/12/17/10/ivivu-tokyo-skytree-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 39,
                'ten_diem_den' => 'Narita - Vịnh Odaiba - Hoàng Cung (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 1',
                'mo_ta' => '<p>Sáng: Đoàn làm thủ tục nhập cảnh. Xe đón đoàn và ăn sáng nhanh trên xe. Xe đưa đoàn đi tham quan</p>
<p><strong>Vịnh Odaiba</strong>: Hòn đảo nhân tạo khá lớn của Nhật Bản với chức năng ban đầu là phòng thủ, sau đó dần mở rộng thành cảng biển. Đến nay, đảo Odaiba đã có sự phát triển vượt bậc thành các khu thương mại, giải trí thu hút nhiều khách du lịch, check in bên cạnh bức tượng Nữ thần Tự Do - món quà là tình cảm của nước Pháp giành cho Nhật Bản.</p>
<p><img title="" src="//cdn2.ivivu.com/2023/02/06/14/ivivu-odaiba.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Vịnh Odaiba.</em></p>
<p>Chiêm ngưỡng bên ngoài <strong>Hoàng Cung Nhật Bản</strong>: Nơi ở của Thiên hoàng Nhật Bản với kiến trúc xa hoa, tráng lệ. Nằm trong một khuôn viên rộng lớn lên đến 7,41 km2, được bao quanh bởi hào nước và các bức tường đá dày.&nbsp;</p>
<p><img title="" src="//cdn2.ivivu.com/2025/11/13/11/ivivu-hoang-cung-nhat-ban.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Hoàng Cung Nhật Bản.</em></p>
<p>Trưa: Đoàn dùng bữa trưa với món thịt bò Wagyu hấp dẫn. Sau đó khởi hành tham quan thủ đô Tokyo - nơi được mệnh danh là “trái tim của Nhật Bản, tham quan:</p>
<p><strong>Đền Asakusa Kannon</strong>: Là ngôi đền cổ xưa nhất không những của Asakusa, mà là của cả thành phố Tokyo. Đây là ngôi chùa cổ thờ Phật Quan Âm linh thiêng, được người dân Nhật thường xuyên tới để cầu nguyện.&nbsp;</p>
<p><img title="" src="//cdn2.ivivu.com/2017/05/15/17/ivivu-senso-ji-temple-asakusa-kannon.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Đền Asakusa Kannon.</em></p>
<p>Chụp hình bên ngoài <strong>Tháp truyền hình Tokyo Skytree</strong>: Nơi được xem là niềm tự hào của Tokyo nói riêng hay Nhật Bản nói chung với chiều cao 634m.</p>
<p><img title="" src="//cdn2.ivivu.com/2025/03/27/18/ivv-tokyo-skytree-nhat.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Tháp truyền hình Tokyo Skytree.</em></p>
<p>Qúy khách dạo chơi <strong>mua sắm tại Akihabara.</strong></p>
<p>Tối: Đoàn ăn tối tại nhà hàng địa phương</p>
<p>Nghỉ đêm tại Tokyo. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>',
                'thanh_pho' => 'Tokyo',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2025/10/31/15/sens-ji-asakusa-ivvv-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 40,
                'ten_diem_den' => 'Núi Phú Sĩ - Trải Nghiệm Mặc Yukata (Ăn Sáng, Trưa, Tối)',
                'thoi_gian' => 'Ngày 2',
                'mo_ta' => '<p>Sáng: Đoàn dùng điểm tâm. Làm thủ tục trả phòng. Đoàn di chuyển đến khu vực Yamanashi</p>
<p><strong> Núi Phú Sĩ</strong>: Ngọn núi với độ cao 3.776m trên mực nước biển và là ngọn núi cao thứ 7 trên thế giới. Đây là 1 trong 3 ngọn núi “thiêng” của Nhật Bản và là biểu tượng nổi tiếng của đất nước Nhật. Đoàn sẽ lên tham quan trạm dừng số 5 nếu thời tiết cho phép.</p>
<p><img title="" src="//cdn2.ivivu.com/2024/07/17/18/nui-phu-si-bieu-tuong-cua-nhat-ban-ivv.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Núi Phú Sĩ.</em></p>
<p>Trưa: Đoàn dùng bữa trưa. Sau đó tiếp tục tham quan</p>
<p>Đi thuyền và thưởng thức trà trên <strong>Hồ Yamanakako</strong> (Thiên nga hồ): Hành trình kéo dài khoảng 25 phút vòng quanh hồ, du khách có thể thư giãn ngắm nhìn phong cảnh tuyệt đẹp của hồ Yamanaka và núi Phú Sĩ hùng vĩ trong khi vừa được thưởng thức trà matcha nổi tiếng Nhật Bản trên tàu.</p>
<p><strong>Làng cổ Oshino Hakkai:&nbsp;</strong>Ngôi làng nổi tiếng bởi có 8 hồ nước đặc biệt. Các hồ có cấu tạo phần đáy chủ yếu là nham thạch do quá trình kiến tạo địa chất và được nuôi dưỡng nhờ nguồn nước băng tuyết tan chảy từ đỉnh núi Phú Sĩ.&nbsp;</p>
<p><img title="" src="//cdn2.ivivu.com/2017/11/17/14/ivivu-lang-co-oshino-hakkai.jpg" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Làng cổ Oshino Hakkai.</em></p>
<p><strong>Công viên Oishi Park</strong>: Là một trong những điểm đến nổi bật tại Nhật Bản, đặc biệt được yêu thích bởi vẻ đẹp tự nhiên tuyệt mỹ và khung cảnh hùng vĩ của núi Phú Sĩ ở phía xa, công viên là một địa điểm lý tưởng cho những ai yêu thiên nhiên và muốn tận hưởng không khí trong lành giữa khung cảnh thanh bình.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/03/11/14/ivv-oishi-lavender.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Công viên Oishi Park.</em></p>
<p>Đoàn tiếp tục trải nghiệm mặc Yakuta và tắm Onsen mang phong cách Nhật Bản giúp tăng sự thư giãn và thoải mái.</p>
<p>Tối: Đoàn ăn tối tại nhà hàng</p>
<p>Nghỉ đêm tại Yamanashi.</p>',
                'thanh_pho' => 'Yamanashi',
                'tinh_trang' => 1,
                'hinh_anh' => '	https://cdn2.ivivu.com/2026/03/11/14/ivv-oishi-lavender-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 41,
                'ten_diem_den' => 'Yamanashi - Tokyo Disneyland (Ăn Sáng, Tối)',
                'thoi_gian' => 'Ngày 3',
                'mo_ta' => '<p>Sáng: Đoàn dùng điểm tâm. Trả phòng khách sạn, đoàn khởi Hành đi Tokyo Disneyland.</p>
<p><strong>Lựa chọn 1:&nbsp;Tokyo Disneyland</strong></p>
<p>Tham quan<strong> Tokyo Disneyland</strong>: Với diện tích rộng lớn đến 465.000m2 cùng hàng loạt trò chơi hấp dẫn, Tokyo Disneyland đã trở thành điểm đến mơ ước của nhiều du khách. Đặc biệt là những người yêu thích sự kỳ diệu, phiêu lưu và yêu thích những nhân vật hoạt hình, những nàng công chúa cổ tích trong thế giới Disney World (Vé vào cổng và bữa trưa quý khách tự túc).</p>
<p><img title="" src="//cdn2.ivivu.com/2026/04/10/11/ivv-tokyo-disneyland.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Tokyo Disneyland.</em></p>
<p><strong>Lựa chọn 2: Tự do mua sắm tại trung tâm thương mại Ikspiari</strong></p>
<p><strong>Trung tâm mua sắm&nbsp;Ikspiari</strong>:&nbsp;Nơi đây quy tụ hơn 100 cửa hàng, nhà hàng, quán cà phê, quán bar và rạp chiếu phim Cinema Ikspiari, với nhiều khu mua sắm theo chủ đề, đa dạng thời trang, phụ kiện, đồ gia dụng và ẩm thực.</p>
<p><img title="" src="//cdn2.ivivu.com/2026/04/10/11/ivv-ikspiari.gif" alt="" loading="lazy" decoding="async" fetchpriority="low"></p>
<p><em>Trung tâm mua sắm Ikspiari.</em></p>
<p>Tối: Đoàn dùng bữa tối tại nhà hàng địa phương</p>
<p>Nghỉ đêm tại Narita.</p>',
                'thanh_pho' => 'Yamanashi',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2026/04/10/11/ivv-tokyo-disneyland-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 42,
                'ten_diem_den' => 'Narita - HCM (Ăn Sáng, Trưa Trên Máy Bay)',
                'thoi_gian' => 'Ngày 4',
                'mo_ta' => '<p>Sáng: Ăn sáng tại khách sạn, làm thủ tục trả phòng. Xe đưa đoàn ra sân bay làm thủ tục về<strong> Việt Nam</strong> trên chuyến bay&nbsp;<strong>VJ823 NRTSGN (08h55 - 12h55)</strong></p>
<p>Đáp <strong>sân bay Tân Sơn Nhất</strong>, trưởng đoàn chia tay và hẹn gặp lại quý khách trong những hành trình sau.</p>',
                'thanh_pho' => 'TP.HCM',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://cdn2.ivivu.com/2025/05/09/14/ivv-nhat-tokyo-narita-120x76.gif',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ];

        DB::table('diem_dens')->truncate();
        DB::table('diem_dens')->delete();
        DB::table('diem_dens')->insert($diemDens);
    }
}
