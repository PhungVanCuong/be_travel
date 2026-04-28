<?php

namespace Database\Seeders;

use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HoaDonSeeder extends Seeder
{
    public function run(): void
    {
        $connection = DB::getDefaultConnection();

        DB::connection($connection)->table('hoa_dons')->truncate();

        $khachHangs = KhachHang::on($connection)->get();
        $tours = Tour::on($connection)->get();

        if ($khachHangs->isEmpty() || $tours->isEmpty()) {
            $this->command->info('Vui lòng chạy KhachHangSeeder và TourSeeder trước khi chạy HoaDonSeeder!');
            return;
        }

        $phuongThucThanhToan = ['vnpay', 'cash', 'chuyển khoản'];

        // Bao gồm cả 3 trạng thái: 1 (Chưa TT), 2 (Đã TT), 0 (Đã hủy)
        $trangThaiChung = [HoaDon::CHUA_THANH_TOAN, HoaDon::DA_THANH_TOAN, HoaDon::DA_HUY];

        for ($i = 0; $i < 50; $i++) {
            $khachHang = $khachHangs->random();
            $tour = $tours->random();

            $soLuongNguoi = rand(1, min(10, $tour->so_nguoi_toi_da ?? 10));
            $tongTien = $soLuongNguoi * $tour->gia;

            $phuongThuc = $phuongThucThanhToan[array_rand($phuongThucThanhToan)];

            // Lựa chọn trạng thái có tính toán thực tế
            if ($phuongThuc == 'vnpay') {
                $tyLe = rand(1, 100);
                if ($tyLe <= 70) {
                    $trangThaiHienTai = HoaDon::DA_THANH_TOAN; // 70% VNPay thành công
                } elseif ($tyLe <= 90) {
                    $trangThaiHienTai = HoaDon::CHUA_THANH_TOAN; // 20% treo/đang chờ
                } else {
                    $trangThaiHienTai = HoaDon::DA_HUY; // 10% hủy giao dịch
                }
            } else {
                // Tiền mặt thì random đều 3 trạng thái
                $trangThaiHienTai = $trangThaiChung[array_rand($trangThaiChung)];
            }

            $ghiChu = "Người đặt: " . $khachHang->ho_va_ten . ". Bao gồm " . $soLuongNguoi . " người lớn.";
            $ngayTao = Carbon::today()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            // Tạo mã hóa đơn ngẫu nhiên, ví dụ: HD2405ABCD
            $maHoaDon = 'HD' . $ngayTao->format('ymd') . strtoupper(Str::random(4));

            HoaDon::on($connection)->create([
                'id_khach_hang' => $khachHang->id,
                'id_tour' => $tour->id,
                'ma_hoa_don' => $maHoaDon, // Bổ sung ma_hoa_don
                'so_luong_nguoi' => $soLuongNguoi,
                'tong_tien' => $tongTien,
                'phuong_thuc_thanh_toan' => $phuongThuc,
                'trang_thai' => (string) $trangThaiHienTai,
                'ghi_chu_danh_sach_nguoi_di' => $ghiChu,
                'ngay_tao' => $ngayTao,
                'created_at' => $ngayTao,
                'updated_at' => $ngayTao,
            ]);
        }
    }
}
