<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quoc_gias', function (Blueprint $table) {
            $table->id();
            $table->string('ten_quoc_gia')->unique(); // Tên quốc gia không được trùng
            $table->integer('tinh_trang')->default(1)->comment('1: Kích hoạt, 0: Đã khóa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quoc_gias');
    }
};
