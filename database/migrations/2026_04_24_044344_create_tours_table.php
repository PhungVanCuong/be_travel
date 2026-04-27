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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tour')->nullable();
            $table->string('mo_ta')->nullable();
            $table->decimal('gia', 10, 2)->nullable();
            $table->date('ngay_bat_dau')->nullable();
            $table->date('ngay_ket_thuc')->nullable();
            $table->integer('so_nguoi_toi_da')->nullable();
            $table->string('diem_don')->nullable();
            $table->string('diem_tra')->nullable();
            $table->integer('tinh_trang')->default(1)->comment('0: chưa kích hoạt, 1: đã kích hoạt');
            $table->string('hinh_anh', 1000)->nullable(); // Thêm cột hinh_anh
            $table->integer('id_quoc_gia')->nullable(); // Thêm cột id_quoc_gia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
