<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            if (!Schema::hasColumn('khach_hangs', 'facebook_id')) {
                $table->string('facebook_id')->nullable()->after('google_id')->index();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('khach_hangs', function (Blueprint $table) {
            if (Schema::hasColumn('khach_hangs', 'facebook_id')) {
                $table->dropColumn('facebook_id');
            }
        });
    }
};
