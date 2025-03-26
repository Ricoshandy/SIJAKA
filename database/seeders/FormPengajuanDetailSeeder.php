<?php

namespace Database\Seeders;

use Database\Seeders\FormPengajuanDetail\Agama\FormAsistenAhliAgamaSeeder;
use Database\Seeders\FormPengajuanDetail\Agama\FormGuruBesarAgamaSeeder;
use Database\Seeders\FormPengajuanDetail\Agama\FormLektorAgamaSeeder;
use Database\Seeders\FormPengajuanDetail\Agama\FormLektorKepalaAgamaSeeder;
use Database\Seeders\FormPengajuanDetail\Umum\FormAsistenAhliSeeder;
use Database\Seeders\FormPengajuanDetail\Umum\FormGuruBesarSeeder;
use Database\Seeders\FormPengajuanDetail\Umum\FormLektorKepalaSeeder;
use Database\Seeders\FormPengajuanDetail\Umum\FormLektorSeeder;
use Illuminate\Database\Seeder;

class FormPengajuanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            FormAsistenAhliSeeder::class,
            FormLektorSeeder::class,
            FormLektorKepalaSeeder::class,
            FormGuruBesarSeeder::class,

            FormAsistenAhliAgamaSeeder::class,
            FormLektorAgamaSeeder::class,
            FormLektorKepalaAgamaSeeder::class,
            FormGuruBesarAgamaSeeder::class
        ]);
    }
}
