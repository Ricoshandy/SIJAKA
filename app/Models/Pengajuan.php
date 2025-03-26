<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    use HasUuids;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'form_pengajuan_id',
        'user_id',
    ];


    public function getUser(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getFormPengajuan(): BelongsTo {
        return $this->belongsTo(FormPengajuan::class, 'form_pengajuan_id', 'id');
    }
}
