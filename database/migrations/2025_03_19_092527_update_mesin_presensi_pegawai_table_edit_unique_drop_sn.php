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
            $table->dropUnique('pegawai_id_sn_pin_unique');
            $table->dropColumn('sn');
            $table->unique(['pegawai_id', 'mesin_id', 'pin'], 'pegawai_id_mesin_id_pin_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mesin_presensi_pegawai', function (Blueprint $table) {
            $table->string('sn', 32)->nullable();
            $table->unique(['pegawai_id', 'sn', 'pin'], 'pegawai_id_sn_pin_unique');
        });
    }
};
