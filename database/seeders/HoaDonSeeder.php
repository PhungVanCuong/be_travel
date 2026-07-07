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

        // CHỈ lấy những khách hàng đã kích hoạt (is_active = 1)
        $khachHangs = KhachHang::where('is_active', 1)->orderBy('id')->get();
        $tours = Tour::orderBy('id')->get();

        if ($khachHangs->isEmpty() || $tours->count() < 5) {
            $this->command->error('Cần ít nhất 5 tour và 1 khách hàng hoạt động để chạy Seeder này!');
            return;
        }

        $phuongThucThanhToan = ['vnpay', 'chuyển khoản', 'tiền mặt'];
        $hoaDonsToInsert = [];

        // Mẫu trạng thái cố định cho 5 hóa đơn của mỗi khách hàng
        // 2 (Đã thanh toán), 2 (Đã thanh toán), 1 (Chờ xác nhận), 1 (Chờ xác nhận), 0 (Đã hủy)
        $mauTrangThai = [2, 2, 1, 1, 0];

        foreach ($khachHangs as $uIndex => $khachHang) {

            for ($i = 0; $i < 5; $i++) {
                // Đảm bảo 5 tour khác nhau cho cùng 1 khách hàng
                $tourIndex = ($uIndex + $i) % count($tours);
                $tour = $tours[$tourIndex];

                $trangThai = $mauTrangThai[$i];

                // Số lượng người từ 1 đến 5 (cố định theo toán học)
                $soLuongNguoi = (($uIndex + $i) % 5) + 1;
                $tongTien = $soLuongNguoi * $tour->gia;

                // Chọn phương thức thanh toán
                $phuongThuc = $phuongThucThanhToan[($uIndex + $i) % 3];

                $ghiChu = "Người đặt: " . $khachHang->ho_va_ten . ". Bao gồm " . $soLuongNguoi . " khách.";

                // Ngày đặt tour: Lùi lại trước ngày bắt đầu tour từ 15 đến 40 ngày
                $ngayBatDauTour = Carbon::parse($tour->ngay_bat_dau);
                $ngayTao = $ngayBatDauTour->copy()->subDays((($uIndex * 5 + $i) % 25) + 15)->subHours(($uIndex + $i) % 24);

                // Mã hóa đơn cố định, duy nhất
                $maHoaDon = 'HD' . $ngayTao->format('ymd') . strtoupper(substr(md5($khachHang->id . '_' . $tour->id . '_' . $i), 0, 5));

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
        }

        foreach (array_chunk($hoaDonsToInsert, 50) as $chunk) {
            DB::table('hoa_dons')->insert($chunk);
        }

        $this->command->info('Đã tạo thành công! Mỗi khách hàng có đúng 5 hóa đơn (2 Thành công, 2 Chờ, 1 Hủy) với 5 tour khác nhau.');
    }
}
