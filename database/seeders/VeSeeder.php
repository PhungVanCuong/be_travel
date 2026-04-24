<?php

namespace Database\Seeders;

use App\Models\HoaDon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Xóa dữ liệu vé cũ
        DB::table('ves')->truncate();

        // 2. Lấy toàn bộ Hóa đơn đang có trong hệ thống
        $hoaDons = HoaDon::all();

        // Nếu chưa có hóa đơn nào thì dừng lại
        if ($hoaDons->isEmpty()) {
            $this->command->info('Không có hóa đơn nào trong database. Vui lòng chạy HoaDonSeeder trước!');
            return;
        }

        $ves = [];

        // 3. Duyệt qua từng Hóa đơn để tạo vé
        foreach ($hoaDons as $hoaDon) {
            $soNguoi = $hoaDon->so_luong_nguoi;

            // Tính giá của mỗi vé (Tổng tiền chia cho số người)
            $giaVe = $soNguoi > 0 ? round($hoaDon->tong_tien / $soNguoi) : 0;

            // Chuyển đổi trạng thái Hóa đơn sang Trạng thái Vé
            // Hóa đơn: đang chờ xử lý -> Vé: 1 (Chưa thanh toán)
            // Hóa đơn: đã thanh toán -> Vé: 2 (Đã thanh toán)
            // Hóa đơn: hủy -> Vé: 0 (Đã hủy)
            $tinhTrangVe = 1;
            if ($hoaDon->trang_thai === 'đã thanh toán') {
                $tinhTrangVe = 2;
            } elseif ($hoaDon->trang_thai === 'hủy') {
                $tinhTrangVe = 0;
            }

            // 4. Tạo số lượng vé bằng đúng với 'so_luong_nguoi'
            for ($i = 0; $i < $soNguoi; $i++) {

                // Giả lập: Nếu vé đã thanh toán thì có tỉ lệ 40% khách đã được Check-in
                $isCheckIn = ($tinhTrangVe == 2 && rand(1, 100) <= 40) ? 1 : 0;

                $ves[] = [
                    'ma_ve'         => 'VE-' . strtoupper(Str::random(8)), // Tạo mã vé ngẫu nhiên, VD: VE-A1B2C3D4
                    'gia_ve'        => $giaVe,
                    'id_khach_hang' => $hoaDon->id_khach_hang,
                    'id_hoa_don'    => $hoaDon->id,
                    'tinh_trang'    => $tinhTrangVe,
                    'is_check_in'   => $isCheckIn,
                    'created_at'    => $hoaDon->ngay_tao, // Lấy ngày tạo hóa đơn làm ngày xuất vé
                    'updated_at'    => Carbon::now(),
                ];
            }
        }

        // 5. Chèn toàn bộ mảng vé vào Database
        // Chia nhỏ (chunk) mỗi lần chèn 100 vé để tránh lỗi quá tải bộ nhớ nếu dữ liệu quá lớn
        foreach (array_chunk($ves, 100) as $chunk) {
            DB::table('ves')->insert($chunk);
        }

        $this->command->info('Đã tự động tạo Vé thành công dựa trên danh sách Hóa đơn!');
    }
}
