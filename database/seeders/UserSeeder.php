<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Data Dummy User role: Dosen
        User::create([
            'name' => fake()->name() . ', S.Kom., M.Kom.,',
            'email' => 'dosen@sijaka.com',
            'password' => Hash::make('123456'),
            'role' => 'dosen',
        ]);

        // Buat Data Dummy User role: Kepegawaian
        User::create([
            'name' => fake()->name() . ', S.Kom., M.Kom.,',
            'email' => 'kepegawaian@sijaka.com',
            'password' => Hash::make('123456'),
            'role' => 'kepegawaian',
        ]);

        // Buat Data Dummy User role: Comite
        User::create([
            'name' => fake()->name() . ', S.Kom., M.Kom.,',
            'email' => 'comite@sijaka.com',
            'password' => Hash::make('123456'),
            'role' => 'comite',
        ]);

        // Buat Data Dummy User role: Senat
        User::create([
            'name' => fake()->name() . ', S.Kom., M.Kom.,',
            'email' => 'senat@sijaka.com',
            'password' => Hash::make('123456'),
            'role' => 'senat',
        ]);

        // Buat Data Dummy User role: SuperAdmin
        User::create([
            'name' => fake()->name() . ', S.Kom., M.Kom.,',
            'email' => 'superadmin@sijaka.com',
            'password' => Hash::make('123456'),
            'role' => 'superadmin',
        ]);
    }
}
