<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormPengajuanDetail extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'form_pengajuan_id',
        'key',
        'title',
        'description',
        'detail',
    ];

    public function getFormPengajuan(): BelongsTo {
        return $this->belongsTo(FormPengajuan::class, 'form_pengajuan_id', 'id');
    }
}
