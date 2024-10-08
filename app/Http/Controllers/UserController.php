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

    public function index()
    {
        $users = $this->userModel->paginate(5);
        return view('list_user', [
            'title' => 'List User',
            'users' => $users,
        ]);
    }

    public function create()
    {
        $kelas = $this->kelasModel::all();
        return view('create_user', [
            'kelas' => $kelas,
            'title' => 'Create User',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = 'upload/img/' . $foto->getClientOriginalName();
            $foto->move(public_path('upload/img'), $fotoPath);
        }

        $this->userModel->create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas_id'],
            'foto' => $fotoPath,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function profile($nama = "", $kelas = "", $npm = "")
    {
        return view('profile', [
            'title' => 'Profile',
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ]);
    }

    public function show($id)
    {
        $user = $this->userModel->findOrFail($id);
        return view('profile', [
            'title' => 'Profile',
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel::all();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->userModel->findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->nama = $validatedData['nama'];
        $user->npm = $validatedData['npm'];
        $user->kelas_id = $validatedData['kelas_id'];

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $user->foto = 'uploads/' . $fileName;
        }

        $user->save();
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
