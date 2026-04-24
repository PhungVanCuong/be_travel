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
        // 1. Dọn dẹp dữ liệu cũ và tắt kiểm tra khóa ngoại
        Schema::disableForeignKeyConstraints();
        DB::table('danh_gias')->truncate();
        Schema::enableForeignKeyConstraints();

        $noiDungMau = [
            'Tour tổ chức rất chuyên nghiệp, hướng dẫn viên cực kỳ nhiệt tình và chu đáo.',
            'Cảnh quan tuyệt đẹp, thức ăn rất ngon và hợp khẩu vị. Sẽ ủng hộ công ty tiếp.',
            'Lịch trình hợp lý, không bị mệt, rất phù hợp cho gia đình có người lớn tuổi đi cùng.',
            'Dịch vụ tốt, xe đưa đón đúng giờ, giường nằm thoải mái.',
            'Một chuyến đi đầy ý nghĩa. Cảm ơn đội ngũ điều hành tour.',
            'Giá cả quá hợp lý so với chất lượng nhận được. Khách sạn view rất đẹp.',
            'Thanh toán qua VNPay trên web rất mượt mà và tiện lợi, không cần tiền mặt.',
            'Rất thích cách làm việc của bạn hướng dẫn viên, cực kỳ vui tính và am hiểu văn hóa.',
            'Lúc đầu mình hỏi Chatbot AI trên web tư vấn rất nhanh và chính xác nên mới quyết định chốt tour này.',
            'Trải nghiệm tuyệt vời, lịch trình đi được nhiều điểm hot, có nhiều thời gian chụp ảnh.'
        ];

        // 2. Lấy danh sách ID Tour và ID Khách hàng thực tế từ Database
        $tourIds = DB::table('tours')->pluck('id')->toArray();
        $khachHangIds = DB::table('khach_hangs')->pluck('id')->toArray();

        $noiDungIndex = 0;

        if (empty($tourIds)) {
            $this->command->error('Lỗi: Không tìm thấy tour nào trong database!');
            return;
        }

        if (empty($khachHangIds)) {
            $this->command->error('Lỗi: Không tìm thấy khách hàng nào để tạo đánh giá!');
            return;
        }

        foreach ($tourIds as $tourId) {
            // Xáo trộn danh sách ID khách hàng cho mỗi tour
            shuffle($khachHangIds);

            // Xác định số lượng đánh giá cho tour này (từ 3-5, nhưng không quá tổng số khách hàng)
            $limit = min(count($khachHangIds), rand(3, 5));

            for ($i = 0; $i < $limit; $i++) {
                // Đảm bảo không bị lỗi index nếu danh sách nội dung mẫu hết
                if ($noiDungIndex >= count($noiDungMau)) {
                    $noiDungIndex = 0;
                }

                // Lấy ID khách hàng duy nhất từ danh sách đã xáo trộn
                $idKhachHang = $khachHangIds[$i];

                // Tính toán số sao ngẫu nhiên (ưu tiên tour chất lượng cao)
                $soSao = (rand(1, 10) <= 8) ? rand(4, 5) : rand(1, 3);

                DB::table('danh_gias')->insert([
                    'id_khach_hang' => $idKhachHang, // Duy nhất cho mỗi tour nhờ shuffle
                    'id_tour'       => $tourId,
                    'sao_danh_gia'  => $soSao,
                    'noi_dung'      => $noiDungMau[$noiDungIndex], // Không bao giờ null
                    'tinh_trang'    => 1,
                    // Random thời gian đánh giá trong những tháng gần đây (đầu năm 2026)
                    'created_at'    => Carbon::create(2026, rand(1, 4), rand(1, 28), rand(8, 20)),
                    'updated_at'    => Carbon::now(),
                ]);

                $noiDungIndex++;
            }
        }
        $this->command->info('Đã tạo dữ liệu mẫu đánh giá thành công! Mỗi khách hàng đánh giá mỗi tour tối đa 1 lần.');
    }
}