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
        Schema::table('mesin_presensi_pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('mesin_id')
                ->nullable();
            $table->foreign('mesin_id')
                ->references('id')
                ->on('mesin_presensi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mesin_presensi_pegawai', function (Blueprint $table) {
            $table->dropForeign('mesin_id_foreign');
            $table->dropColumn('mesin_id');
        });
    }
};
