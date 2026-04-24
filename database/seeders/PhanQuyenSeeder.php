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
            // 1. Admin / Giám đốc (ID=1) - Có TẤT CẢ 12 quyền
            // ====================================================
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 1],  // Quản lý tour
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 2],  // Quản lý khách hàng
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 3],  // Quản lý nhân viên
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 4],  // Thống kê báo cáo
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 5],  // Quản lý đánh giá
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 6],  // Phân quyền
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 7],  // Quản lý hóa đơn
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 8],  // Quản lý vé
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 9],  // Quản lý Chatbot AI
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 10], // Quản lý địa điểm
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 11], // Quản lý bài viết
            ['id_chuc_vu' => 1, 'id_chuc_nang' => 12], // Xem thông tin tour

            // ====================================================
            // 2. Quản lý điều hành tour (ID=2)
            // ====================================================
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 1],  // Quản lý tour
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 2],  // Quản lý khách hàng
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 4],  // Thống kê báo cáo
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 5],  // Quản lý đánh giá
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 8],  // Quản lý vé
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 10], // Quản lý địa điểm
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 11], // Quản lý bài viết
            ['id_chuc_vu' => 2, 'id_chuc_nang' => 12], // Xem thông tin tour

            // ====================================================
            // 3. Kế toán VNPay (ID=3)
            // ====================================================
            ['id_chuc_vu' => 3, 'id_chuc_nang' => 2],  // Quản lý khách hàng (đối chiếu thông tin)
            ['id_chuc_vu' => 3, 'id_chuc_nang' => 4],  // Thống kê báo cáo (doanh thu)
            ['id_chuc_vu' => 3, 'id_chuc_nang' => 7],  // Quản lý hóa đơn
            ['id_chuc_vu' => 3, 'id_chuc_nang' => 8],  // Quản lý vé

            // ====================================================
            // 4. Nhân viên CSKH (ID=4)
            // ====================================================
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 1],  // Quản lý tour (Xem để tư vấn)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 2],  // Quản lý khách hàng
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 5],  // Quản lý đánh giá (Xử lý khiếu nại)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 8],  // Quản lý vé (Hỗ trợ đặt/hủy)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 9],  // Quản lý Chatbot AI (Cập nhật FAQ)
            ['id_chuc_vu' => 4, 'id_chuc_nang' => 12], // Xem thông tin tour

            // ====================================================
            // 5. Hướng dẫn viên (ID=5)
            // ====================================================
            ['id_chuc_vu' => 5, 'id_chuc_nang' => 2],  // Quản lý khách hàng (Xem khách trong đoàn)
            ['id_chuc_vu' => 5, 'id_chuc_nang' => 8],  // Quản lý vé (Check-in mã vé QR)
            ['id_chuc_vu' => 5, 'id_chuc_nang' => 12], // Xem thông tin tour (Xem lịch trình)

            // ====================================================
            // 6. Kỹ thuật hệ thống AI (ID=6)
            // ====================================================
            ['id_chuc_vu' => 6, 'id_chuc_nang' => 9],  // Quản lý Chatbot AI (Train model, fix bug)
            ['id_chuc_vu' => 6, 'id_chuc_nang' => 11], // Quản lý bài viết (Đăng bài kỹ thuật, hướng dẫn)
        ];

        DB::table('phan_quyens')->truncate();
        DB::table('phan_quyens')->delete();
        DB::table('phan_quyens')->insert($phanQuyen);
    }
}