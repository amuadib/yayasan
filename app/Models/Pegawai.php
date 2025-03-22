<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pegawai extends Model
{
    protected $table = "pegawai";

    public function mesin(): HasMany
    {
        return $this->hasMany(MesinPresensiPegawai::class, 'pegawai_id', 'id');
    }

    public function jamKerjas(): BelongsToMany
    {
        return $this->belongsToMany(JamKerja::class, 'jam_kerja_pegawai');
    }
}
