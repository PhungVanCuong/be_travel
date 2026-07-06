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

        // Lấy hóa đơn ĐÃ THANH TOÁN (Trạng thái = 2)
        $hoaDonThanhCong = DB::table('hoa_dons')
            ->where('trang_thai', '2')
            ->orderBy('id')
            ->get();

        $danhGiasToInsert = [];
        $danhGiaCounter = 0;
        $processed = []; // Để đảm bảo 1 KH chỉ đánh giá 1 Tour đúng 1 lần

        foreach ($hoaDonThanhCong as $hd) {
            $key = $hd->id_tour . '_' . $hd->id_khach_hang;
            if (isset($processed[$key])) {
                continue;
            }
            $processed[$key] = true;
            $danhGiaCounter++;

            // Quyết định ai để lại đánh giá (Bỏ qua 30% khách hàng không thèm đánh giá theo thuật toán cố định)
            if ($danhGiaCounter % 3 == 0) continue;

            // Quyết định đánh giá tốt (4-5 sao) hay xấu (2-3 sao)
            $isGoodReview = ($danhGiaCounter % 6) != 0; // 5 tốt, 1 xấu
            $soSao = $isGoodReview ? (4 + ($danhGiaCounter % 2)) : (2 + ($danhGiaCounter % 2));

            $noiDung = $isGoodReview
                ? $noiDungTot[$danhGiaCounter % count($noiDungTot)]
                : $noiDungXau[$danhGiaCounter % count($noiDungXau)];

            // Ngày đánh giá: Cố định sau ngày tạo hóa đơn từ 2-5 ngày
            $ngayDanhGia = Carbon::parse($hd->ngay_tao)->addDays(($danhGiaCounter % 4) + 2);

            $danhGiasToInsert[] = [
                'id_khach_hang' => $hd->id_khach_hang,
                'id_tour'       => $hd->id_tour,
                'sao_danh_gia'  => $soSao,
                'noi_dung'      => $noiDung,
                'tinh_trang'    => 1,
                'created_at'    => $ngayDanhGia,
                'updated_at'    => clone $ngayDanhGia,
            ];
        }

        foreach (array_chunk($danhGiasToInsert, 50) as $chunk) {
            DB::table('danh_gias')->insert($chunk);
        }

        $this->command->info('Đã tạo Đánh Giá cố định thành công!');
    }
}
