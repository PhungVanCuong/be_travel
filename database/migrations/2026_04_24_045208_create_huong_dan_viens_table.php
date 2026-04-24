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
        // use HasApiTokens, HasFactory, Notifiable;
    // protected $table = 'huong_dan_viens';
    // protected $fillable = [
    //     'email',
    //     'ho_va_ten',
    //     'password',
    //     'ngon_ngu',
    //     'so_dien_thoai',
    //     'is_active',
    //     'is_block',
    //     'hash_reset',
    //     'hash_active',
    // ];
        Schema::create('huong_dan_viens', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('ho_va_ten');
            $table->string('password');
            $table->string('ngon_ngu')->nullable();
            $table->string('so_dien_thoai')->nullable();
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
        Schema::dropIfExists('huong_dan_viens');
    }
};
