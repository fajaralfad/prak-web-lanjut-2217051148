@extends('layouts.app') <!-- Menggunakan layout app.blade.php -->

@section('content') <!-- Mulai mendefinisikan bagian konten -->
<div class="flex justify-center items-center min-h-screen"> <!-- Flexbox untuk pusat -->
    <div class="max-w-sm w-full bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 duration-300">
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-4">Edit User</h1>

        <!-- Tambahkan enctype="multipart/form-data" untuk mendukung pengunggahan file -->
        <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Menggunakan PUT untuk update data -->

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
                <!-- Menggunakan old() untuk mempertahankan input sebelumnya -->
                <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 transition duration-200"/>
            </div>

            <div class="mb-4">
                <label for="npm" class="block text-sm font-medium text-gray-700">NPM:</label>
                <!-- Menggunakan old() untuk mempertahankan input sebelumnya -->
                <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 transition duration-200"/>
            </div>

            <div class="mb-4">
                <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas:</label>
                <select name="kelas_id" id="kelas_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 transition duration-200">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelas as $kelasItem)
                        <!-- Menggunakan ternary operator untuk menambahkan selected pada kelas yang dipilih -->
                        <option value="{{ $kelasItem->id }}" {{ old('kelas_id', $user->kelas_id) == $kelasItem->id ? 'selected' : '' }}>
                            {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Preview foto sebelumnya -->
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto:</label>
                <input type="file" id="foto" name="foto" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 transition duration-200"/>
                @if ($user->foto)
                    <div class="mt-2">
                        <img src="{{ asset($user->foto) }}" alt="Foto User" class="w-24 h-24 object-cover rounded-full">
                    </div>
                @endif
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 transition duration-200">Update</button>
        </form>
    </div>
</div>
@endsection <!-- Selesai mendefinisikan bagian konten -->
