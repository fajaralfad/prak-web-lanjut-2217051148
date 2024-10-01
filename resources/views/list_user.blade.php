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

    <!-- Search and Filter Section -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0">
        <div class="relative w-full sm:w-64">
            <i class="material-icons absolute left-3 top-3 text-gray-400">search</i>
            <input type="text" placeholder="Search users..." class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent">
        </div>
        <div class="text-sm text-gray-600">
            Showing <span class="font-semibold">{{ count($users) }}</span> users
        </div>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NPM</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th> <!-- Kolom Detail -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $user['id'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= $user['nama'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                <?= $user['npm'] ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                <?= $user['nama_kelas'] ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <a href="{{ url('/user/edit/' . $user->id) }}" class="text-indigo-600 hover:text-indigo-900 flex items-center space-x-1">
                                    <i class="material-icons">edit</i>
                                    <span>Edit</span>
                                </a>
                                <a href="{{ url('/user/delete/' . $user->id) }}" 
                                   onclick="return confirmDelete();"
                                   class="text-red-600 hover:text-red-900 flex items-center space-x-1">
                                    <i class="material-icons">delete</i>
                                    <span>Delete</span>
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('users.show', $user['id']) }}" class="bg-blue-500 hover:bg-yellow-600 text-white px-2 py-2 rounded-lg flex items-center space-x-1 transition duration-200">
                            <i class="material-icons">info</i>
                            <span>Detail</span>
                            </a> <!-- Link Detail -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Section -->
    <div class="mt-4">
        {{ $users->links() }} <!-- Default Laravel pagination links -->
    </div>
</div>

<!-- Delete Confirmation Modal -->
<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this user? This action cannot be undone.');
}
</script>
@endsection
