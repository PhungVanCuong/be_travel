<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lien_he', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_khach_hang')->nullable()->comment('Lưu ID nếu khách đã đăng nhập');
            $table->string('ho_ten', 100);
            $table->string('email', 100);
            $table->string('so_dien_thoai', 15)->nullable();
            $table->text('noi_dung');
            $table->tinyInteger('trang_thai')->default(0)->comment('0: Chưa xử lý, 1: Đã xử lý');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lien_he');
    }
};
