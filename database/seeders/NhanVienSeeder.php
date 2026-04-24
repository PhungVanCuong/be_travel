<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NhanVienSeeder extends Seeder
{
    public function run(): void
    {
        $nhanVien = [
            [
                'email' => 'admin123@gmail.com',
                'ho_va_ten' => 'Giám Đốc Admin',
                'password' => bcrypt('123456'), // Nên mã hóa password để login được
                'so_dien_thoai' => '0901234567',
                'dia_chi' => '123 Nguyễn Văn Linh, Hải Châu, TP. Đà Nẵng',
                'ngay_sinh' => '1985-01-15',
                'tinh_trang' => 1,
                'id_chuc_vu' => 1,
                'is_master' => 1, // Admin có toàn quyền hệ thống
            ],
            [
                'email' => 'dieuhanhtour@vietnamtravel.com',
                'ho_va_ten' => 'Trần Xuân Điều Hành',
                'password' => bcrypt('123456'),
                'so_dien_thoai' => '0901234587',
                'dia_chi' => '456 Lê Duẩn, Thanh Khê, TP. Đà Nẵng',
                'ngay_sinh' => '1990-05-20',
                'tinh_trang' => 1,
                'id_chuc_vu' => 2,
                'is_master' => 0, // Quản lý thiết kế và lên lịch Tour
            ],
            [
                'email' => 'ketoan.vnpay@vietnamtravel.com',
                'ho_va_ten' => 'Lê Huỳnh Kế Toán',
                'password' => bcrypt('123456'),
                'so_dien_thoai' => '0909000003',
                'dia_chi' => '789 Trần Hưng Đạo, Sơn Trà, TP. Đà Nẵng',
                'ngay_sinh' => '1993-06-15',
                'tinh_trang' => 1,
                'id_chuc_vu' => 3,
                'is_master' => 0, // Kế toán kiểm tra giao dịch, đối soát VNPay
            ],
            [
                'email' => 'cskh@vietnamtravel.com',
                'ho_va_ten' => 'Phan Trung Tư Vấn',
                'password' => bcrypt('123456'),
                'so_dien_thoai' => '0909000004',
                'dia_chi' => '321 Hai Bà Trưng, Q.1, TP.HCM',
                'ngay_sinh' => '1995-09-10',
                'tinh_trang' => 1,
                'id_chuc_vu' => 4,
                'is_master' => 0, // Nhân viên CSKH, trực chat, hỗ trợ Chatbot AI
            ],
            [
                'email' => 'huongdanvien@vietnamtravel.com',
                'ho_va_ten' => 'Hoàng Kim Hướng Dẫn',
                'password' => bcrypt('123456'),
                'so_dien_thoai' => '0909000005',
                'dia_chi' => '654 Nguyễn Trãi, Q.5, TP.HCM',
                'ngay_sinh' => '1998-11-25',
                'tinh_trang' => 1,
                'id_chuc_vu' => 5,
                'is_master' => 0, // Hướng dẫn viên dẫn đoàn
            ],
            [
                'email' => 'kythuat.ai@vietnamtravel.com',
                'ho_va_ten' => 'Kỹ Thuật Hệ Thống',
                'password' => bcrypt('123456'),
                'so_dien_thoai' => '0909000006',
                'dia_chi' => '999 Tôn Đức Thắng, Liên Chiểu, TP. Đà Nẵng',
                'ngay_sinh' => '1999-12-01',
                'tinh_trang' => 1,
                'id_chuc_vu' => 6,
                'is_master' => 0, // Kỹ thuật viên bảo trì Web và model AI
            ]
        ];

        // Xóa dữ liệu cũ và reset ID tự tăng (nếu có foreign key có thể cần disable constraints trước)
        DB::table('nhan_viens')->truncate();

        // Xóa dữ liệu cũ nhưng không reset ID (nếu muốn giữ ID cũ, có thể bỏ truncate và chỉ dùng delete)
        DB::table('nhan_viens')->delete();

        // Chèn dữ liệu mới
        DB::table('nhan_viens')->insert($nhanVien);
    }
}
