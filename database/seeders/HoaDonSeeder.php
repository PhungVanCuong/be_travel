<?php

namespace Database\Seeders;

use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HoaDonSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('hoa_dons')->truncate();
        Schema::enableForeignKeyConstraints();

        // CHỈ lấy những khách hàng đã kích hoạt (is_active = 1). Bao gồm cả khách bị block (is_block=1) để giữ lại lịch sử cũ
        $khachHangs = KhachHang::where('is_active', 1)->orderBy('id')->get();
        $tours = Tour::orderBy('id')->get();

        if ($khachHangs->isEmpty() || $tours->isEmpty()) {
            return;
        }

        $phuongThucThanhToan = ['vnpay', 'chuyển khoản', 'tiền mặt'];
        $hoaDonsToInsert = [];

        // Chạy vòng lặp 150 lần để tạo 150 hóa đơn CỐ ĐỊNH
        for ($i = 0; $i < 150; $i++) {
            // Lựa chọn KH và Tour theo thuật toán cố định (Modulo)
            $khachHang = $khachHangs[$i % count($khachHangs)];
            $tour = $tours[($i * 7) % count($tours)];

            // Số lượng người từ 1 đến 6
            $soLuongNguoi = ($i % 6) + 1;
            $tongTien = $soLuongNguoi * $tour->gia;

            $phuongThuc = $phuongThucThanhToan[$i % 3];

            // Cố định trạng thái:
            // Nếu $i chia hết cho 10 -> Hủy (0)
            // Nếu $i chia hết cho 7 -> Chờ thanh toán (1)
            // Còn lại -> Đã thanh toán (2)
            if ($i % 10 == 0) {
                $trangThai = 0;
            } elseif ($i % 7 == 0) {
                $trangThai = 1;
            } else {
                $trangThai = 2;
            }

            $ghiChu = "Người đặt: " . $khachHang->ho_va_ten . ". Bao gồm " . $soLuongNguoi . " người lớn.";

            // Ngày đặt tour: Tính lùi lại từ ngày bắt đầu của tour (10 đến 40 ngày)
            $ngayBatDauTour = Carbon::parse($tour->ngay_bat_dau);
            $ngayTao = $ngayBatDauTour->copy()->subDays(($i % 30) + 10)->subHours($i % 24);

            // Mã hóa đơn cố định
            $maHoaDon = 'HD' . $ngayTao->format('ymd') . strtoupper(substr(md5($i), 0, 4));

            $hoaDonsToInsert[] = [
                'id_khach_hang' => $khachHang->id,
                'id_tour' => $tour->id,
                'ma_hoa_don' => $maHoaDon,
                'so_luong_nguoi' => $soLuongNguoi,
                'tong_tien' => $tongTien,
                'phuong_thuc_thanh_toan' => $phuongThuc,
                'trang_thai' => (string) $trangThai,
                'ghi_chu_danh_sach_nguoi_di' => $ghiChu,
                'ngay_tao' => $ngayTao,
                'created_at' => $ngayTao,
                'updated_at' => $ngayTao,
            ];
        }

        foreach (array_chunk($hoaDonsToInsert, 50) as $chunk) {
            DB::table('hoa_dons')->insert($chunk);
        }

        $this->command->info('Đã tạo 150 Hóa Đơn cố định thành công!');
    }
}
