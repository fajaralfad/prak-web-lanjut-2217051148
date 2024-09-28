<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas; // Import model Kelas
use App\Models\UserModel; // Pastikan model UserModel diimpor

class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];

        return view('profile', $data);
    }

    public function create()
    {
        // Mengambil semua data kelas dari database
        $kelas = Kelas::all();

        // Menyertakan data kelas ke dalam view create_user
        return view('create_user', ['kelas' => $kelas]);
    }

    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:255',
        'kelas_id' => 'required|exists:kelas,id', // Memastikan kelas_id valid
    ]);

    // Menyimpan data pengguna
    $user = UserModel::create($validatedData);
    $user->load('kelas'); // Memuat relasi kelas

    return view('profile', [
        'nama' => $user->nama,
        'npm' => $user->npm,
        'kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan', // Mengatasi kelas tidak ditemukan
    ]);
}


}
