<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormPengajuan extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'rumpun',
        'usul',
    ];

    public function getFormPengajuanDetails(): HasMany {
        return $this->hasMany(FormPengajuanDetail::class, 'form_pengajuan_id', 'id');
    }

    public function getPengajuans(): HasMany {
        return $this->hasMany(Pengajuan::class, 'form_pengajuan_id', 'id');
    }
}
