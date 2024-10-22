<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data kelas yang akan dimasukkan
        $data = [
            ['id' => 1, 'nama_kelas' => 'A'],
            ['id' => 2, 'nama_kelas' => 'B'],
            ['id' => 3, 'nama_kelas' => 'C'],
            ['id' => 4, 'nama_kelas' => 'D'],
            ['id' => 5, 'nama_kelas' => 'E'],
        ];

        // Memasukkan data kelas satu per satu ke dalam tabel
        foreach ($data as $kelas) {
            Kelas::create([
                'id' => $kelas['id'], // Menyertakan ID
                'nama_kelas' => $kelas['nama_kelas'],
            ]);
        }

        // Optional: Uncomment below for batch insert
        /*
        Kelas::insert($data);
        */
    }
}
