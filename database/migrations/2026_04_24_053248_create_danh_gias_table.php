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
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tour');
            $table->integer('id_khach_hang');
            $table->integer('sao_danh_gia'); // 1 -> 5
            $table->longText('noi_dung');
            $table->integer('tinh_trang')->default(1); // 1: hiển thị, 0: ẩn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gias');
    }
};
