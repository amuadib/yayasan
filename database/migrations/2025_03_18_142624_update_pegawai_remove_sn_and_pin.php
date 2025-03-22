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
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropColumn(['fingerspot_sn', 'fingerspot_pegawai_pin']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->string('fingerspot_sn')
                ->nullable();
            $table->string('fingerspot_pegawai_pin')
                ->nullable();
        });
    }
};
