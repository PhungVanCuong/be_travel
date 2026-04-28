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
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('ho_va_ten')->nullable();
            $table->string('password');
            $table->string('so_dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->integer('tinh_trang')->default(1)->nullable()->comment('0: chưa kích hoạt, 1: đã kích hoạt');
            $table->string('avatar')->nullable();
            $table->integer('id_chuc_vu')->nullable();
            $table->integer('is_master')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
