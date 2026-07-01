<?php

namespace Database\Seeders;

use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class HoaDonSeeder extends Seeder
{
    public function run(): void
    {
        $connection = DB::getDefaultConnection();

        Schema::disableForeignKeyConstraints();
        DB::connection($connection)->table('hoa_dons')->truncate();
        Schema::enableForeignKeyConstraints();

        $khachHangs = KhachHang::on($connection)->get();
        $tours = Tour::on($connection)->get();

        if ($khachHangs->isEmpty() || $tours->isEmpty()) {
            $this->command->info('Vui lòng chạy KhachHangSeeder và TourSeeder trước khi chạy HoaDonSeeder!');
            return;
        }

        $phuongThucThanhToan = ['vnpay', 'chuyển khoản', 'tiền mặt'];

        $hoaDonsToInsert = [];

        // Tăng số lượng hóa đơn lên 150 để có nhiều dữ liệu cho Vé và Đánh giá
        for ($i = 0; $i < 150; $i++) {
            $khachHang = $khachHangs->random();
            $tour = $tours->random();

            $soLuongNguoi = rand(1, min(6, $tour->so_nguoi_toi_da ?? 10));
            $tongTien = $soLuongNguoi * $tour->gia;

            $phuongThuc = $phuongThucThanhToan[array_rand($phuongThucThanhToan)];

            // Logic trạng thái hợp lý
            if ($phuongThuc == 'vnpay') {
                $tyLe = rand(1, 100);
                if ($tyLe <= 75) {
                    $trangThaiHienTai = 2; // 75% VNPay thành công (Đã thanh toán)
                } elseif ($tyLe <= 90) {
                    $trangThaiHienTai = 1; // 15% Chưa thanh toán (Treo)
                } else {
                    $trangThaiHienTai = 0; // 10% Đã hủy
                }
            } else {
                // Tiền mặt / Chuyển khoản (Ưu tiên đã thanh toán để test)
                $trangThaiHienTai = (rand(1, 100) <= 60) ? 2 : (rand(1, 100) <= 50 ? 1 : 0);
            }

            $ghiChu = "Người đặt: " . $khachHang->ho_va_ten . ". Bao gồm " . $soLuongNguoi . " người lớn.";
            // Ngày đặt tour phải TRƯỚC ngày bắt đầu của Tour đó
            $ngayBatDauTour = Carbon::parse($tour->ngay_bat_dau);
            $ngayTao = $ngayBatDauTour->copy()->subDays(rand(5, 30))->subHours(rand(1, 23));

            $maHoaDon = 'HD' . $ngayTao->format('ymd') . strtoupper(Str::random(4));

            $hoaDonsToInsert[] = [
                'id_khach_hang' => $khachHang->id,
                'id_tour' => $tour->id,
                'ma_hoa_don' => $maHoaDon,
                'so_luong_nguoi' => $soLuongNguoi,
                'tong_tien' => $tongTien,
                'phuong_thuc_thanh_toan' => $phuongThuc,
                'trang_thai' => (string) $trangThaiHienTai,
                'ghi_chu_danh_sach_nguoi_di' => $ghiChu,
                'ngay_tao' => $ngayTao,
                'created_at' => $ngayTao,
                'updated_at' => $ngayTao,
            ];
        }

        // Insert số lượng lớn
        foreach (array_chunk($hoaDonsToInsert, 50) as $chunk) {
            HoaDon::on($connection)->insert($chunk);
        }

        $this->command->info('Đã tạo 150 Hóa Đơn thành công!');
    }
}
