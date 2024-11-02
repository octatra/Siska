<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'), // Password terenkripsi
                'role' => 'Admin',
                'tahun_angkatan' => 'Admin',
            ],
            // [
            //     'name' => 'Mahasiswa User',
            //     'email' => 'mahasiswa@example.com',
            //     'password' => Hash::make('admin123'),
            //     'role' => 'Mahasiswa',
            //     'program_studi' => 'Akutansi',
            //     'tahun_angkatan' => '2022',
            // ],
            // [
            //     'name' => 'Alumni User',
            //     'email' => 'alumni@example.com',
            //     'password' => Hash::make('admin123'),
            //     'role' => 'Alumni',
            //     'program_studi' => 'Akutansi',
            //     'tahun_angkatan' => '2002',
            // ],
        ];

        // Masukkan data pengguna ke dalam tabel `users`
        foreach ($users as $user) {
            User::create($user);
        }

        // php artisan db:seed --class=UserSeeder
    }
}
