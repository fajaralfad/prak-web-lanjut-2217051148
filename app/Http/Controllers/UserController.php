<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected UserModel $userModel;
    protected Kelas $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // Display the list of users with pagination
    public function index()
    {
        $users = $this->userModel->paginate(5);
        return view('list_user', [
            'title' => 'List User',
            'users' => $users,
        ]);
    }

    // Show the form for creating a new user
    public function create()
    {
        $kelas = $this->kelasModel::all();
        return view('create_user', [
            'kelas' => $kelas,
            'title' => 'Create User',
        ]);
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload and store in public/storage/foto
        $filename = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto', $filename); // Store file in 'public/storage/foto' directory
        }

        // Save user data to the database
        $this->userModel->create([
            'nama' => $validated['nama'],
            'npm' => $validated['npm'],
            'kelas_id' => $validated['kelas_id'],
            'foto' => $filename, // Save file name to the database
        ]);

        return redirect()->to('/')->with('success', 'User berhasil dibuat.');
    }

    // Display the user's profile
    public function show($id)
    {
        $user = $this->userModel->findOrFail($id);
        return view('profile', [
            'title' => 'Profile',
            'user' => $user,
        ]);
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel::all();
        return view('edit_user', [
            'user' => $user,
            'kelas' => $kelas,
            'title' => 'Edit User',
        ]);
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        $user = $this->userModel->findOrFail($id);

        // Validate input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update user data
        $user->nama = $validatedData['nama'];
        $user->npm = $validatedData['npm'];
        $user->kelas_id = $validatedData['kelas_id'];

        // Update the photo if uploaded
        if ($request->hasFile('foto')) {
            // Delete the old photo if exists
            if ($user->foto) {
                Storage::delete('public/foto/' . $user->foto);
            }

            $fileName = time() . '_' . $request->foto->getClientOriginalName();
            $request->foto->storeAs('public/foto', $fileName); // Store file in 'public/storage/foto'
            $user->foto = $fileName; // Save the new file name
        }

        $user->save();
        return redirect()->to('/')->with('success', 'User berhasil diperbarui.');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = $this->userModel->findOrFail($id);
        
        // Delete the user's photo from storage
        if ($user->foto) {
            Storage::delete('public/foto/' . $user->foto);
        }

        $user->delete();
        return redirect()->to('/')->with('success', 'User berhasil dihapus.');
    }
}
