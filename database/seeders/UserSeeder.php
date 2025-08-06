<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@siakad.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        // Dosen
        User::updateOrCreate(
            ['email' => 'dosen@siakad.com'],
            [
                'name' => 'Dosen Satu',
                'password' => Hash::make('password'),
                'role' => 'dosen'
            ]
        );

        // Mahasiswa (akun login)
        $mahasiswaUser = User::updateOrCreate(
            ['email' => 'mahasiswa@siakad.com'],
            [
                'name' => 'Mahasiswa Satu',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa'
            ]
        );

        // Data mahasiswa di tabel mahasiswas
        Mahasiswa::updateOrCreate(
            ['email' => $mahasiswaUser->email],
            [
                'nim' => '20250001',
                'nama' => $mahasiswaUser->name,
                'password' => Hash::make('password')
            ]
        );
    }
}