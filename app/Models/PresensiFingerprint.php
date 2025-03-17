<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PresensiFingerprint extends Model
{
    protected $connection = 'fingerspot';
    protected $table = 'att_log';
    protected $primaryKey = 'scan_date';
    public $incrementing = false;

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pin', 'pegawai_pin');
    }
}
