<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Mahasiswa</title>

    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Tambahkan Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
        }
        .card-hover:hover {
            transform: translateY(-10px) rotate(2deg);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .icon-hover:hover {
            color: #3b82f6;
            transform: scale(1.1);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="flex items-center justify-center">

    <!-- Main Profile Card -->
    <div class="bg-white shadow-lg rounded-2xl p-6 w-80 text-center card-hover transform transition-all duration-500 relative overflow-hidden">
        
        <!-- Background Pattern -->
        <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-t-2xl"></div>

        <!-- Foto Profil -->
        <div class="relative mb-4">
            <img src="https://i.postimg.cc/0j4hXJtB/IMG-2154.jpg" alt="Foto Profil" class="w-24 h-24 rounded-full mx-auto border-4 border-white shadow-lg object-cover z-10 relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-24 bg-gradient-to-r from-pink-500 to-yellow-500 rounded-full filter blur-md opacity-60"></div>
        </div>

        <!-- Informasi Mahasiswa -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Profil Mahasiswa</h1>

        <!-- Data Mahasiswa dengan Ikon -->
        <div class="text-left text-base font-medium space-y-2 mb-4">
            <p class="flex items-center text-gray-700">
                <i class="fas fa-user-graduate mr-2 text-blue-500"></i>{{ $nama }}
            </p>
            <p class="flex items-center text-gray-700">
                <i class="fas fa-chalkboard-teacher mr-2 text-green-500"></i>{{ $kelas }}
            </p>
            <p class="flex items-center text-gray-700">
                <i class="fas fa-id-card mr-2 text-purple-500"></i>{{ $npm }}
            </p>
        </div>

        <!-- Skill Bars -->
        <div class="mb-4">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">Skills</h3>
            <div class="space-y-1">
                <div class="flex items-center">
                    <span class="text-sm w-20 text-right mr-2">HTML</span>
                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: 90%"></div>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="text-sm w-20 text-right mr-2">CSS</span>
                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="text-sm w-20 text-right mr-2">JavaScript</span>
                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media Icons -->
        <div class="flex justify-center space-x-3">
            <a href="#" class="text-gray-400 hover:text-blue-500 icon-hover"><i class="fab fa-linkedin text-xl"></i></a>
            <a href="#" class="text-gray-400 hover:text-blue-400 icon-hover"><i class="fab fa-twitter text-xl"></i></a>
            <a href="#" class="text-gray-400 hover:text-red-500 icon-hover"><i class="fab fa-instagram text-xl"></i></a>
            <a href="#" class="text-gray-400 hover:text-gray-700 icon-hover"><i class="fab fa-github text-xl"></i></a>
        </div>
    </div>

</body>
</html>
