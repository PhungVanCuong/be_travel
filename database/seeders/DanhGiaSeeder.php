<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DanhGiaSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('danh_gias')->truncate();
        Schema::enableForeignKeyConstraints();

        // 20 Nội dung tốt để không bị trùng lặp
        $noiDungTot = [
            'Tour tổ chức rất chuyên nghiệp, hướng dẫn viên cực kỳ nhiệt tình và chu đáo.',
            'Cảnh quan tuyệt đẹp, thức ăn rất ngon và hợp khẩu vị. Sẽ ủng hộ công ty tiếp.',
            'Lịch trình hợp lý, không bị mệt, rất phù hợp cho gia đình có người lớn tuổi đi cùng.',
            'Dịch vụ tốt, xe đưa đón đúng giờ, giường nằm thoải mái.',
            'Một chuyến đi đầy ý nghĩa. Cảm ơn đội ngũ điều hành tour của Ixtal.',
            'Thanh toán qua VNPay trên web rất mượt mà và tiện lợi, check-in mã vé QR cũng siêu nhanh.',
            'Rất thích cách làm việc của bạn hướng dẫn viên, cực kỳ vui tính và am hiểu văn hóa địa phương.',
            'Lúc đầu mình hỏi Chatbot AI trên web tư vấn rất nhanh nên mới quyết định chốt tour này. Rất đáng tiền!',
            'Khách sạn 4 sao sạch sẽ, tiện nghi. Buffet sáng có nhiều món ngon, phong phú.',
            'Giá tour quá hời so với chất lượng dịch vụ nhận được. 10 điểm không có nhưng!',
            'Tour đi rất vui, quen được nhiều bạn mới. Lịch trình linh hoạt không gò bó thời gian.',
            'Công ty làm ăn uy tín, thông tin tour trên web mô tả sao thì đi thực tế y hệt vậy.',
            'Xe di chuyển êm ái, bác tài lái xe cẩn thận an toàn. Cảm thấy rất an tâm.',
            'Rất ấn tượng với khâu tổ chức ăn uống, nhà hàng nào cũng ngon và sạch sẽ.',
            'Mọi thứ đều hoàn hảo từ lúc đặt vé online đến lúc kết thúc chuyến đi.',
            'Tour nước ngoài thủ tục làm visa nhanh gọn lẹ, HDV chăm sóc đoàn rất kỹ.',
            'Gia đình mình có em bé nhỏ nhưng đi tour này rất nhàn, HDV hỗ trợ nhiệt tình.',
            'Chụp được hàng ngàn bức ảnh sống ảo tuyệt đẹp. Cảm ơn Ixtal Tour!',
            'Hướng dẫn viên thuyết minh lịch sử rất hay, cuốn hút, nghe không bị chán.',
            'Quy trình làm việc chuyên nghiệp, nhân viên hỗ trợ đổi vé rất nhanh nhẹn dễ thương.'
        ];

        $noiDungXau = [
            'Thời tiết hôm đi không được đẹp lắm nên chụp ảnh hơi buồn.',
            'Đồ ăn có 1 bữa không hợp khẩu vị của gia đình mình, còn lại thì ổn.',
            'Xe di chuyển hơi xóc, hy vọng công ty cải thiện phương tiện tốt hơn.',
            'Thời gian tự do mua sắm hơi ít, chưa kịp mua quà đã phải lên xe.',
            'Khách sạn hơi xa trung tâm nên tối muốn đi dạo phải bắt taxi.',
            'Lịch trình ngày thứ 2 hơi dày đặc làm mình cảm thấy hơi mệt mỏi.',
        ];

        // Lấy hóa đơn ĐÃ THANH TOÁN (Trạng thái = 2)
        $hoaDonThanhCong = DB::table('hoa_dons')
            ->where('trang_thai', '2')
            ->orderBy('id')
            ->get();

        $danhGiasToInsert = [];
        $danhGiaCounter = 0;

        foreach ($hoaDonThanhCong as $hd) {
            $danhGiaCounter++;

            // Thuật toán xác định tỉ lệ 70% Tốt (5 sao) và 30% Xấu/Trung bình (2-4 sao)
            // Lấy dư của 10. Nếu 0 đến 6 (7 trường hợp) -> Tốt. Nếu 7,8,9 (3 trường hợp) -> Xấu
            $mod10 = $danhGiaCounter % 10;

            if ($mod10 < 7) {
                // 70% Đánh giá 5 Sao
                $soSao = 5;
                $noiDung = $noiDungTot[$danhGiaCounter % count($noiDungTot)];
            } else {
                // 30% Đánh giá 2, 3, 4 sao
                $soSao = [4, 3, 2][$mod10 - 7];
                $noiDung = $noiDungXau[$danhGiaCounter % count($noiDungXau)];
            }

            // Ngày đánh giá: Cách ngày đặt (ngay_tao) từ 5 đến 10 ngày
            $daysToAdd = 5 + ($danhGiaCounter % 6); // Kết quả sẽ là 5, 6, 7, 8, 9 hoặc 10
            $ngayDanhGia = Carbon::parse($hd->ngay_tao)->addDays($daysToAdd);

            $danhGiasToInsert[] = [
                'id_khach_hang' => $hd->id_khach_hang,
                'id_tour'       => $hd->id_tour,
                'sao_danh_gia'  => $soSao,
                'noi_dung'      => $noiDung,
                'tinh_trang'    => 1, // 1: Hiển thị
                'created_at'    => $ngayDanhGia,
                'updated_at'    => clone $ngayDanhGia,
            ];
        }

        foreach (array_chunk($danhGiasToInsert, 50) as $chunk) {
            DB::table('danh_gias')->insert($chunk);
        }

        $this->command->info('Đã tạo Đánh Giá hoàn chỉnh (70% 5 sao, đánh giá sau 5-10 ngày) thành công!');
    }
}
