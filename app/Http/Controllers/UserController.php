<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserModel $userModel;
    protected Kelas $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    /**
     * Display a listing of users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Paginate users directly from the model
        $users = $this->userModel->paginate(5);

        return view('list_user', [
            'title' => 'List User',
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Fetch all classes to populate the dropdown in the create user form
        $kelas = $this->kelasModel::all();

        return view('create_user', [
            'kelas' => $kelas,
            'title' => 'Create User',
        ]);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'semester' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if a photo is provided
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Store file using Laravel's storage mechanism
            $fotoPath = $foto->storeAs('public/upload/img', $foto->getClientOriginalName());
            // Store only the file name in the database
            $fotoPath = 'upload/img/' . $foto->getClientOriginalName();
        }

        // Create a new user record
        $this->userModel->create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas_id'],
            'semester' => $validatedData['semester'],
            'jurusan' => $validatedData['jurusan'],
            'foto' => $fotoPath, // Can be null if no photo was uploaded
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the user profile.
     *
     * @param string $nama
     * @param string $kelas
     * @param string $npm
     * @return \Illuminate\View\View
     */
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        return view('profile', [
            'title' => 'Profile', // Include title for consistency
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ]);
    }

    /**
     * Display the user detail.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Retrieve the user based on ID
        $user = $this->userModel->findOrFail($id); // Ensure to handle cases where the user may not exist

        return view('profile', [
            'title' => 'Profile',
            'user' => $user,
        ]);
    }
}
