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
        Schema::create('v_n_pays', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khach_hang')->nullable();
            $table->integer('id_hoa_don')->nullable();
            $table->text('link_data')->nullable();
            $table->integer('tinh_trang')->default(0)->nullable()->comment('0: Chưa xử lý, 1: Thành công, 2: Thất bại');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_n_pays');
    }
};
