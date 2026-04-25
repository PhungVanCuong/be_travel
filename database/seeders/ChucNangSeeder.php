<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    public function run(): void
    {
        $chucNang = [
            [
                'id' => 1,
                'ten_chuc_nang' => 'Quản lý tour',
                'mo_ta' => 'Xem danh sách, thêm, sửa, xóa và cập nhật trạng thái tour du lịch',
            ],
            [
                'id' => 2,
                'ten_chuc_nang' => 'Quản lý khách hàng',
                'mo_ta' => 'Xem, tìm kiếm và cập nhật thông tin khách hàng',
            ],
            [
                'id' => 3,
                'ten_chuc_nang' => 'Quản lý nhân viên',
                'mo_ta' => 'Xem, tìm kiếm và cập nhật thông tin nhân viên',
            ],
            [
                'id' => 4,
                'ten_chuc_nang' => 'Báo cáo thống kê',
                'mo_ta' => 'Xem thống kê doanh thu, số lượng tour và lượng khách hàng',
            ],
            [
                'id' => 5,
                'ten_chuc_nang' => 'Quản lý đánh giá',
                'mo_ta' => 'Xem chi tiết và quản lý các đánh giá tour từ khách hàng',
            ],
            [
                'id' => 6,
                'ten_chuc_nang' => 'Phân quyền',
                'mo_ta' => 'Cấp quyền và thay đổi chức vụ cho các tài khoản',
            ],
            [
                'id' => 7,
                'ten_chuc_nang' => 'Quản lý hóa đơn',
                'mo_ta' => 'Theo dõi, kiểm tra và cập nhật trạng thái thanh toán hóa đơn VNPay',
            ],
            [
                'id' => 8,
                'ten_chuc_nang' => 'Quản lý vé',
                'mo_ta' => 'Xem danh sách, tìm kiếm, cập nhật trạng thái và check-in vé',
            ],
            [
                'id' => 9,
                'ten_chuc_nang' => 'Quản lý Chatbot AI',
                'mo_ta' => 'Quản lý kịch bản, câu hỏi thường gặp (FAQ) và dữ liệu cho Chatbot',
            ],
            [
                'id' => 10,
                'ten_chuc_nang' => 'Quản lý địa điểm',
                'mo_ta' => 'Quản lý các khu vực, điểm đến du lịch trong hệ thống',
            ],
            [
                'id' => 11,
                'ten_chuc_nang' => 'Quản lý bài viết',
                'mo_ta' => 'Quản lý tin tức, khuyến mãi và cẩm nang du lịch',
            ],
            [
                'id' => 12,
                'ten_chuc_nang' => 'Quản lý lịch trình tour',
                'mo_ta' => 'Dành cho HDV: Xem chi tiết lịch trình và số lượng khách của tour',
            ],
            [
                'id' => 13,
                'ten_chuc_nang' => 'Quản lý Phương tiện',
                'mo_ta' => 'Quản lý các phương tiện vận chuyển như xe bus, tàu, máy bay trong hệ thống',
            ],
            [
                'id' => 14,
                'ten_chuc_nang' => 'Quản lý Hướng dẫn viên',
                'mo_ta' => 'Quản lý thông tin và hoạt động của các Hướng dẫn viên trong hệ thống',
            ],
            [
                'id' => 15,
                'ten_chuc_nang' => 'Quản lý Slide',
                'mo_ta' => 'Quản lý các hình ảnh, nội dung hiển thị trên trang chủ và các trang con của website',
            ],
            [
                'id' => 16,
                'ten_chuc_nang' => 'Quản lý hệ thống',
                'mo_ta' => 'Quản lý các chức năng và cài đặt của hệ thống',
            ],
        ];

        DB::table('chuc_nangs')->truncate();
        DB::table('chuc_nangs')->delete();
        DB::table('chuc_nangs')->insert($chucNang);
    }
}
