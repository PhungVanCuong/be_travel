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
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de')->nullable();
            $table->string('mo_ta_ngan')->nullable();
            $table->text('noi_dung')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->string('tag')->nullable();
            $table->integer('tinh_trang')->default(1)->nullable(); // 1: hoạt động, 0: không hoạt động
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_viets');
    }
};
