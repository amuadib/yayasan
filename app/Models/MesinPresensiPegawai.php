<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MesinPresensiPegawai extends Model
{
    protected $table = "mesin_presensi_pegawai";
    public $timestamps = false;

    public function mesin_presensi(): BelongsTo
    {
        return $this->belongsTo(MesinPresensi::class, 'mesin_id', 'id');
    }
}
