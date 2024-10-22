
@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-3">
            <i class="material-icons text-2xl text-accent">group</i>
            <h2 class="text-2xl font-bold text-gray-800">User List</h2>
        </div>
        <a href="{{ url('/user/create') }}" class="bg-accent hover:bg-accent/90 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition duration-200">
            <i class="material-icons">add</i>
            <span>Add User</span>
        </a>
    </div>

    <!-- Card Grid Section -->
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <!-- User Photo -->
                    <img class="card-img-top" src="{{ $user['foto'] ? asset($user['foto']) : asset('images/default.png') }}" alt="{{ $user['nama'] }}'s Photo" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <!-- User Info -->
                        <h5 class="card-title">{{ $user['nama'] }}</h5>
                        <p class="card-text">NPM: {{ $user['npm'] }}</p>
                        <p class="card-text">Kelas: {{ $user->kelas ? $user->kelas->nama_kelas : 'Tidak ada kelas' }}</p>
                        <p class="card-text">Jurusan: {{ $user['jurusan'] }}</p>
                        <p class="card-text">Semester: {{ $user['semester'] }}</p>

                        <!-- Detail Button -->
                        <a href="{{ route('users.show', $user['id']) }}" class="btn btn-primary">
                            Detail Profile
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Section -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection