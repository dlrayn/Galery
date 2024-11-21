<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run()
    {
        // Data untuk admin
        Petugas::create([
            'username' => 'admin1',
            'password' => Hash::make('suka28'), // Ganti dengan password yang diinginkan
        ]);

        // Data untuk petugas biasa
        Petugas::create([
            'username' => 'petugas1',
            'password' => Hash::make('petugas1'), // Ganti dengan password yang diinginkan
        ]);

        Petugas::create([
            'username' => 'petugas2',
            'password' => Hash::make('password1'), // Ganti dengan password yang diinginkan
        ]);

        Petugas::create([
            'username' => 'admin2',
            'password' => Hash::make('suka22'), // Ganti dengan password yang diinginkan
        ]);
    }
}
