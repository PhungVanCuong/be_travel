<?php

namespace Database\Seeders;

use App\Models\HoaDon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VeSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('ves')->truncate();
        Schema::enableForeignKeyConstraints();

        $hoaDons = HoaDon::orderBy('id')->get();

        if ($hoaDons->isEmpty()) {
            return;
        }

        $ves = [];
        $veCounter = 0;

        foreach ($hoaDons as $hoaDon) {
            $soNguoi = $hoaDon->so_luong_nguoi;
            $giaVe = $soNguoi > 0 ? round($hoaDon->tong_tien / $soNguoi) : 0;
            $tinhTrangVe = $hoaDon->trang_thai; // Tình trạng vé đồng bộ với hóa đơn

            for ($i = 0; $i < $soNguoi; $i++) {
                $veCounter++;

                // Chỉ vé đã thanh toán (2) mới được check-in (Tỉ lệ 80% được checkin)
                $isCheckIn = ($tinhTrangVe == '2' && ($veCounter % 5) != 0) ? 1 : 0;

                // Mã vé cố định
                $maVe = 'VE-' . strtoupper(substr(md5('ve_' . $veCounter), 0, 8));

                $ves[] = [
                    'ma_ve'         => $maVe,
                    'gia_ve'        => $giaVe,
                    'id_khach_hang' => $hoaDon->id_khach_hang,
                    'id_hoa_don'    => $hoaDon->id,
                    'tinh_trang'    => (string) $tinhTrangVe,
                    'is_check_in'   => $isCheckIn,
                    'created_at'    => $hoaDon->ngay_tao,
                    'updated_at'    => Carbon::parse($hoaDon->ngay_tao)->addHours(2),
                ];
            }
        }

        foreach (array_chunk($ves, 100) as $chunk) {
            DB::table('ves')->insert($chunk);
        }

        $this->command->info('Đã tự động tạo Vé đồng bộ hoàn toàn với Hóa Đơn thành công!');
    }
}
