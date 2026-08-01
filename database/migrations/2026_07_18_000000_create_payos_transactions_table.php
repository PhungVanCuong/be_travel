<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payos_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hoa_don')->index();
            $table->unsignedBigInteger('order_code')->unique();
            $table->string('payment_link_id')->nullable()->unique();
            $table->unsignedBigInteger('amount');
            $table->string('status', 30)->default('CREATING')->index();
            $table->text('checkout_url')->nullable();
            $table->text('qr_code')->nullable();
            $table->string('reference')->nullable();
            $table->text('error_message')->nullable();
            $table->json('response_payload')->nullable();
            $table->json('webhook_payload')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->foreign('id_hoa_don')
                ->references('id')
                ->on('hoa_dons')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payos_transactions');
    }
};
