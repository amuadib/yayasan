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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('niy', 10)
                ->nullable();
            $table->date('tmt')
                ->nullable();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('tempat_lahir')
                ->nullable();
            $table->date('tanggal_lahir')
                ->nullable();
            $table->string('nik')
                ->nullable();
            $table->string('alamat')
                ->nullable();
            $table->string('no_hp')
                ->nullable();
            $table->string('gelar_depan')
                ->nullable();
            $table->string('gelar_belakang')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
