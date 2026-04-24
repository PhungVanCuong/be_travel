<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoa_dons', function (Blueprint $table) {
        // 'id_khach_hang',
        // 'id_tour',
        // 'so_luong_nguoi',
        // 'tong_tien',
        // 'phuong_thuc_thanh_toan',
        // 'trang_thai',
        // 'ghi_chu_danh_sach_nguoi_di',
        // 'ngay_tao',
            $table->id();
            $table->integer('id_khach_hang');
            $table->integer('id_tour');
            $table->integer('so_luong_nguoi');
            $table->integer('tong_tien');
            $table->string('phuong_thuc_thanh_toan'); // vnpay, cash
            $table->string('trang_thai'); // đang chờ xử lý, đã thanh toán, hủy
            $table->text('ghi_chu_danh_sach_nguoi_di')->nullable();
            $table->dateTime('ngay_tao');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_dons');
    }
};
