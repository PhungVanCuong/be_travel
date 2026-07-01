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

        $noiDungTot = [
            'Tour tổ chức rất chuyên nghiệp, hướng dẫn viên cực kỳ nhiệt tình và chu đáo.',
            'Cảnh quan tuyệt đẹp, thức ăn rất ngon và hợp khẩu vị. Sẽ ủng hộ công ty tiếp.',
            'Lịch trình hợp lý, không bị mệt, rất phù hợp cho gia đình có người lớn tuổi đi cùng.',
            'Dịch vụ tốt, xe đưa đón đúng giờ, giường nằm thoải mái.',
            'Một chuyến đi đầy ý nghĩa. Cảm ơn đội ngũ điều hành tour.',
            'Thanh toán qua VNPay trên web rất mượt mà và tiện lợi, check-in mã vé QR cũng siêu nhanh.',
            'Rất thích cách làm việc của bạn hướng dẫn viên, cực kỳ vui tính và am hiểu văn hóa.',
            'Lúc đầu mình hỏi Chatbot AI trên web tư vấn rất nhanh nên mới quyết định chốt tour này. Rất đáng tiền!',
        ];

        $noiDungXau = [
            'Thời tiết hôm đi không được đẹp lắm nên chụp ảnh hơi buồn.',
            'Đồ ăn có 1 bữa không hợp khẩu vị của gia đình mình, còn lại thì ổn.',
            'Xe di chuyển hơi xóc, hy vọng công ty cải thiện phương tiện tốt hơn.'
        ];

        // 1. ĐỒNG BỘ: Chỉ lấy những đơn hàng ĐÃ THANH TOÁN (trang_thai = 2)
        $hoaDonThanhCong = DB::table('hoa_dons')
            ->where('trang_thai', '2')
            ->select('id_tour', 'id_khach_hang', 'ngay_tao')
            ->get();

        if ($hoaDonThanhCong->isEmpty()) {
            $this->command->error('Lỗi: Không tìm thấy khách hàng nào đã thanh toán thành công để đánh giá!');
            return;
        }

        // 2. Nhóm khách hàng theo từng tour (Group by id_tour)
        $khachHangTheoTour = [];
        foreach ($hoaDonThanhCong as $hd) {
            // Dùng ID khách làm key để loại bỏ trường hợp 1 khách mua 1 tour 2 lần (chỉ cho đánh giá 1 lần)
            $khachHangTheoTour[$hd->id_tour][$hd->id_khach_hang] = clone $hd;
        }

        $danhGiasToInsert = [];

        foreach ($khachHangTheoTour as $tourId => $danhSachKhachHang) {
            // Lấy danh sách khách hàng thực sự đã đi tour này
            $khachHangs = array_values($danhSachKhachHang);

            // Xáo trộn để random người đánh giá
            shuffle($khachHangs);

            // Tối đa 60% số người trong đoàn sẽ để lại đánh giá (để nhìn thực tế)
            $soLuongDanhGia = max(1, ceil(count($khachHangs) * 0.6));

            for ($i = 0; $i < $soLuongDanhGia; $i++) {
                if(!isset($khachHangs[$i])) break;

                $hd = $khachHangs[$i];
                $idKhachHang = $hd->id_khach_hang;

                // Tỉ lệ: 85% review tốt (4-5 sao), 15% review bình thường (2-3 sao)
                $isGoodReview = (rand(1, 100) <= 85);
                $soSao = $isGoodReview ? rand(4, 5) : rand(2, 3);

                $noiDung = $isGoodReview
                    ? $noiDungTot[array_rand($noiDungTot)]
                    : $noiDungXau[array_rand($noiDungXau)];

                // Ngày đánh giá: Phải sau ngày tạo hóa đơn từ 2 đến 10 ngày
                $ngayDanhGia = Carbon::parse($hd->ngay_tao)->addDays(rand(2, 10));

                $danhGiasToInsert[] = [
                    'id_khach_hang' => $idKhachHang,
                    'id_tour'       => $tourId,
                    'sao_danh_gia'  => $soSao,
                    'noi_dung'      => $noiDung,
                    'tinh_trang'    => 1,
                    'created_at'    => $ngayDanhGia,
                    'updated_at'    => clone $ngayDanhGia,
                ];
            }
        }

        foreach (array_chunk($danhGiasToInsert, 50) as $chunk) {
            DB::table('danh_gias')->insert($chunk);
        }

        $this->command->info('Đã tạo Đánh Giá thành công! CHỈ áp dụng cho các khách hàng ĐÃ THANH TOÁN.');
    }
}
