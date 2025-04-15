<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SkJabatan extends Model
{
    use HasUuids;

    protected $fillable = [
        'pengajuan_id',
        'uploaded_by',
        'sk',
    ];

    public function getUser(): BelongsTo {
        return $this->belongsTo(User::class, 'uploaded_by', 'id');
    }

    public function getPengajuan(): BelongsTo {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'id');
    }
}
