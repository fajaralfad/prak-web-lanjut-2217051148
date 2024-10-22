<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk mengisi tabel user dengan satu data termasuk foto
        DB::table('user')->insert([
            'nama' => 'Muhammad Fajar Alfad',
            'npm' => '2217051148',
            'kelas_id' => 1, // ID kelas yang sesuai (misal: 1 untuk kelas C)
            'jurusan' => 'Informatika',
            'semester' => 5,
            'foto' => 'upload/img/SIA.jpg', // Path ke file foto
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user')->insert([
            'nama' => 'Trio Sakti Ardika',
            'npm' => '2217051049',
            'kelas_id' => 3, // ID kelas yang sesuai (misal: 1 untuk kelas C)
            'jurusan' => 'Informatika',
            'semester' => 5,
            'foto' => 'upload/img/terminal.jpg', // Path ke file foto
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user')->insert([
            'nama' => 'Muhammad Rifqi Febrianto',
            'npm' => '2217051147',
            'kelas_id' => 2, // ID kelas yang sesuai (misal: 1 untuk kelas C)
            'jurusan' => 'Informatika',
            'semester' => 5,
            'foto' => 'upload/img/champ.jpg', // Path ke file foto
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }




}
