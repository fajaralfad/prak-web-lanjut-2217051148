<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade
use Carbon\Carbon; // Import Carbon for handling timestamps

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('user')->insert([
            [
                'nama' => 'Fajar',
                'npm' => '2217051148',
                'kelas_id' => 3, 
                'foto' => 'terminal.jpg',
                'jurusan' => 'Teknik Informatika',
                'semester' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Andi',
                'npm' => '2217051149',
                'kelas_id' => 1, 
                'foto' => 'champ.jpg',
                'jurusan' => 'Sistem Informasi',
                'semester' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Budi',
                'npm' => '2217051150',
                'kelas_id' => 2, 
                'foto' => 'SIA.jpg',
                'jurusan' => 'Teknik Komputer',
                'semester' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
