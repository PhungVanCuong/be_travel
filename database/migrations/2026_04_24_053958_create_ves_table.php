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
        Schema::create('ves', function (Blueprint $table) {
            $table->id();
            $table->string('ma_ve')->unique(); // mã vé duy nhất
            $table->integer('gia_ve');
            $table->integer('id_khach_hang');
            $table->integer('id_hoa_don');
            $table->string('tinh_trang')->default(1); // 1: Chua thanh toan; 2: Da thanh toan, 0: Da huy
            $table->boolean('is_check_in')->default(0)->comment('0: Chưa check-in, 1: Đã check-in');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ves');
    }
};
