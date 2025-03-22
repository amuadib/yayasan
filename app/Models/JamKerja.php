<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JamKerja extends Model
{
    protected $table = "jam_kerja";

    protected function casts(): array
    {
        return [
            'jam_kerja' => 'array',
        ];
    }
    public function pegawai(): BelongsToMany
    {
        return $this->belongsToMany(Pegawai::class, 'jam_kerja_pegawai')
            ->orderBy('nama');
    }
}
