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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($users as $user)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- User Photo -->
                <div class="h-48 bg-blue-600">
                    @if($user->foto)
                        <img src="{{ $user['foto'] ? asset($user['foto']) : asset('images/default.png') }}" 
                             alt="{{ $user['nama'] }}'s Photo" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="material-icons text-white text-6xl">person</i>
                        </div>
                    @endif
                </div>
                
                <!-- User Info -->
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $user->nama }}</h3>
                    <div class="space-y-2 text-gray-600">
                        <p class="flex items-center">
                            <span class="font-medium">NPM:</span>
                            <span class="ml-2">{{ $user->npm }}</span>
                        </p>
                        <p class="flex items-center">
                            <span class="font-medium">Kelas:</span>
                            <span class="ml-2">{{ $user->kelas ? $user->kelas->nama_kelas : 'Tidak ada kelas' }}</span>
                        </p>
                        <p class="flex items-center">
                            <span class="font-medium">Jurusan:</span>
                            <span class="ml-2">{{ $user->jurusan ?? 'Belum diisi' }}</span>
                        </p>
                        <p class="flex items-center">
                            <span class="font-medium">Semester:</span>
                            <span class="ml-2">{{ $user->semester ?? 'Belum diisi' }}</span>
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('users.show', $user->id) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition duration-200">
                            <i class="material-icons">visibility</i>
                            <span>Detail Profile</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Section -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>

<!-- Delete Confirmation Script -->
<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this user? This action cannot be undone.');
}
</script>
@endsection
