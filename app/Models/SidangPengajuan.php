<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SidangPengajuan extends Model
{
    use HasUuids;

    public function getPengajuan(): BelongsTo {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'id');
    }
}
