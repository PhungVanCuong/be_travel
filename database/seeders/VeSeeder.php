<?php

namespace Database\Seeders;

use App\Models\HoaDon;
use App\Models\Ve;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class VeSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('ves')->truncate();
        Schema::enableForeignKeyConstraints();

        $hoaDons = HoaDon::all();

        if ($hoaDons->isEmpty()) {
            $this->command->info('Không có hóa đơn nào trong database. Vui lòng chạy HoaDonSeeder trước!');
            return;
        }

        $ves = [];

        foreach ($hoaDons as $hoaDon) {
            $soNguoi = $hoaDon->so_luong_nguoi;
            $giaVe = $soNguoi > 0 ? round($hoaDon->tong_tien / $soNguoi) : 0;

            // ĐỒNG BỘ: Tình trạng vé phải Y HỆT tình trạng Hóa Đơn
            $tinhTrangVe = $hoaDon->trang_thai;

            for ($i = 0; $i < $soNguoi; $i++) {

                // ĐỒNG BỘ: Chỉ khách có hóa đơn Đã Thanh Toán (2) mới có quyền được Check-in (Xác suất 80% là đã đi)
                $isCheckIn = ($tinhTrangVe == '2' && rand(1, 100) <= 80) ? 1 : 0;

                $ves[] = [
                    'ma_ve'         => 'VE-' . strtoupper(Str::random(8)),
                    'gia_ve'        => $giaVe,
                    'id_khach_hang' => $hoaDon->id_khach_hang,
                    'id_hoa_don'    => $hoaDon->id,
                    'tinh_trang'    => (string) $tinhTrangVe,
                    'is_check_in'   => $isCheckIn,
                    'created_at'    => $hoaDon->ngay_tao,
                    'updated_at'    => Carbon::now(),
                ];
            }
        }

        foreach (array_chunk($ves, 100) as $chunk) {
            DB::table('ves')->insert($chunk);
        }

        $this->command->info('Đã tự động tạo Vé đồng bộ 100% với Hóa Đơn thành công!');
    }
}
