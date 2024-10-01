<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas; // Import model Kelas
use App\Models\UserModel; // Import model UserModel

class UserController extends Controller
{
    // Menjadikan model UserModel dan Kelas sebagai properti public
    public UserModel $userModel;
    public Kelas $kelasModel;

    // Konstruktor untuk menginisialisasi properti
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // Method untuk menampilkan profil pengguna
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];

        return view('profile', $data);
    }

    // Method untuk menampilkan form create user
    public function create()
    {
        // Mengambil semua data kelas menggunakan model kelas yang diinisialisasi
        $kelas = $this->kelasModel::all();

        // Menyertakan data kelas dan judul ke dalam view create_user
        return view('create_user', [
            'kelas' => $kelas,
            'title' => 'Create User', // Menambahkan title untuk halaman
        ]);
    }

    // Method untuk menyimpan data user ke dalam database
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id', // Memastikan kelas_id valid
        ]);
    
        // Menyimpan data pengguna menggunakan model user yang diinisialisasi
        $this->userModel->create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas_id'],
        ]);
    
        // Redirect ke halaman '/user' setelah menyimpan data
        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan!');
    }
    

    // Method untuk menampilkan daftar user
    public function index()
    {
    // Ambil data user dengan pagination
    $users = $this->userModel->getUserQuery()->paginate(5); // Use the query method

    // Kirim data users dan title ke view
    $data = [
        'title' => 'List User',
        'users' => $users, // Pastikan variabel $users dikirim ke view
    ];

    return view('list_user', $data);
    }

}
