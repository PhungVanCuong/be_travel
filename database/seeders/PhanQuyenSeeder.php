<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeder extends Seeder
{
    public function run(): void
    {
        $phanQuyen = [
            // ====================================================
            // 1. Admin / Giám đốc (ID=1) - Có TẤT CẢ 16 quyền
            // ====================================================
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 1],  // Quản lý tour
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 2],  // Quản lý khách hàng
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 3],  // Quản lý nhân viên
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 4],  // Báo cáo thống kê
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 5],  // Quản lý đánh giá
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 6],  // Phân quyền
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 7],  // Quản lý hóa đơn
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 8],  // Quản lý vé
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 9],  // Quản lý Chatbot AI
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 10], // Quản lý địa điểm
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 11], // Quản lý bài viết
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 12], // Quản lý lịch trình tour
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 13], // Quản lý Phương tiện
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 14], // Quản lý Hướng dẫn viên
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 15], // Quản lý Slide
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 16], // Quản lý hệ thống

            // ====================================================
            // 2. Quản lý điều hành tour (ID=2)
            // ====================================================
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 1],  // Quản lý tour
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 2],  // Quản lý khách hàng
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 4],  // Báo cáo thống kê
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 5],  // Quản lý đánh giá
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 8],  // Quản lý vé
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 10], // Quản lý địa điểm
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 12], // Quản lý lịch trình tour
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 13], // Quản lý Phương tiện
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 14], // Quản lý Hướng dẫn viên

            // ====================================================
            // 3. Kế toán VNPay (ID=3)
            // ====================================================
            ['id_chuc_vu' => 3, 'id_chuc_nang' => 2],  // Quản lý khách hàng (đối chiếu)
            ['id_chuc_vu' => 3, 'id_chuc_nang' => 4],  // Báo cáo thống kê (doanh thu)
            ['id_chuc_vu' => 3, 'id_chuc_nang' => 7],  // Quản lý hóa đơn (VNPay)
            ['id_chuc_vu' => 3, 'id_chuc_nang' => 8],  // Quản lý vé

            // ====================================================
            // 4. Nhân viên CSKH (ID=4)
            // ====================================================
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 1],  // Quản lý tour (Xem tư vấn)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 2],  // Quản lý khách hàng
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 5],  // Quản lý đánh giá (Xử lý khiếu nại)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 8],  // Quản lý vé (Hỗ trợ đặt/hủy)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 9],  // Quản lý Chatbot AI (Cập nhật FAQ)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 11], // Quản lý bài viết (Đăng tin)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 12], // Quản lý lịch trình tour

            // ====================================================
            // 5. Hướng dẫn viên (ID=5)
            // ====================================================
            ['id_chuc_vu' => 5, 'id_chuc_nang' => 2],  // Quản lý khách hàng (Xem khách trong đoàn)
            ['id_chuc_vu' => 5, 'id_chuc_nang' => 8],  // Quản lý vé (Check-in mã vé QR)
            ['id_chuc_vu' => 5, 'id_chuc_nang' => 12], // Quản lý lịch trình tour

            // ====================================================
            // 6. Kỹ thuật hệ thống AI (ID=6)
            // ====================================================
            ['id_chuc_vu' => 6, 'id_chuc_nang' => 3],  // Quản lý nhân viên (Cấp/Tạo tài khoản kỹ thuật)
            ['id_chuc_vu' => 6, 'id_chuc_nang' => 9],  // Quản lý Chatbot AI (Train model, fix bug)
            ['id_chuc_vu' => 6, 'id_chuc_nang' => 15], // Quản lý Slide
            ['id_chuc_vu' => 6, 'id_chuc_nang' => 16], // Quản lý hệ thống
        ];

        DB::table('phan_quyens')->truncate();
        DB::table('phan_quyens')->delete();
        DB::table('phan_quyens')->insert($phanQuyen);
    }
}
