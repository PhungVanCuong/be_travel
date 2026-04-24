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
        Schema::create('diem_dens', function (Blueprint $table) {
            $table->id();
            $table->string('ten_diem_den')->nullable();
            $table->text('mo_ta')->nullable();
            $table->string('thanh_pho')->nullable();
            $table->integer('tinh_trang')->default(1); // 1: hoạt động, 0: ẩn
            $table->string('hinh_anh')->nullable(); // lưu path ảnh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diem_dens');
    }
};
