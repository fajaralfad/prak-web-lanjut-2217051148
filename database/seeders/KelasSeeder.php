<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        // Data kelas yang akan dimasukkan
        $data = [
            'A',
            'B',
            'C',
            'D',
            'E',
        ];

        // Memasukkan data kelas satu per satu ke dalam tabel
        foreach ($data as $kelas) {
            Kelas::create([
                'nama_kelas' => $kelas,
            ]);
        }
    }
}
