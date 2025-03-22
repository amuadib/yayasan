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
        Schema::table('mesin_presensi', function (Blueprint $table) {
            $table->integer('nomor_mesin')
                ->nullable();
            $table->string('kode_aktivasi')
                ->nullable();
            $table->string('kode_aktivasi_easy_link_sdk')
                ->nullable();
            $table->string('port', 6)
                ->nullable();
            $table->string('password')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mesin_presensi', function (Blueprint $table) {
            $table->dropColumn(['nomor_mesin', 'kode_aktivasi', 'kode_aktivasi_easy_link_sdk', 'port', 'password']);
        });
    }
};
