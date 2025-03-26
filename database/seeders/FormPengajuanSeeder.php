<?php

namespace Database\Seeders;

use App\Models\FormPengajuan;
use Illuminate\Database\Seeder;

class FormPengajuanSeeder extends Seeder
{
    public function run(): void
    {
        FormPengajuan::create([
            'rumpun' => 'UMUM',
            'usul' => 'ASISTEN_AHLI'
        ]);
        FormPengajuan::create([
            'rumpun' => 'UMUM',
            'usul' => 'LEKTOR'
        ]);
        FormPengajuan::create([
            'rumpun' => 'UMUM',
            'usul' => 'LEKTOR_KEPALA'
        ]);
        FormPengajuan::create([
            'rumpun' => 'UMUM',
            'usul' => 'GURU_BESAR'
        ]);

        FormPengajuan::create([
            'rumpun' => 'AGAMA',
            'usul' => 'ASISTEN_AHLI'
        ]);
        FormPengajuan::create([
            'rumpun' => 'AGAMA',
            'usul' => 'LEKTOR'
        ]);
        FormPengajuan::create([
            'rumpun' => 'AGAMA',
            'usul' => 'LEKTOR_KEPALA'
        ]);
        FormPengajuan::create([
            'rumpun' => 'AGAMA',
            'usul' => 'GURU_BESAR'
        ]);
    }
}
