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
        Schema::create('chuc_vus', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chuc_vu')->nullable(); // Admin, Sale, Booking...
            $table->integer('tinh_trang')->default(1)->nullable(); // 1: hoạt động, 0: ẩn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuc_vus');
    }
};
