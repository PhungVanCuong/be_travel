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
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten')->nullable();
            $table->string('email')->unique();
            $table->string('so_dien_thoai')->nullable();
            $table->string('password');
            $table->string('cccd')->unique()->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('avatar')->nullable();
            $table->string('hash_reset')->nullable();
            $table->string('hash_active')->nullable();
            $table->integer('is_active')->default(0)->comment('0: chưa kích hoạt, 1: đã kích hoạt');
            $table->integer('is_block')->default(0)->comment('0: chưa bị khóa, 1: đã bị khóa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hangs');
    }
};
