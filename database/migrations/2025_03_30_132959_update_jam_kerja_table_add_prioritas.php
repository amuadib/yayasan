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
        Schema::table('jam_kerja', function (Blueprint $table) {
            $table->enum('prioritas', ['y', 'n'])
                ->default('n');
            $table->date('tgl_mulai_prioritas')
                ->nullable();
            $table->date('tgl_selesai_prioritas')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jam_kerja', function (Blueprint $table) {
            $table->dropColumn(['prioritas', 'tgl_mulai_prioritas', 'tgl_selesai_prioritas']);
        });
    }
};
