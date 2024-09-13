<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        customGray: '#F5F5F5',
                        customBlue: '#0077B6',
                        customTeal: '#00B4D8',
                        customDarkTeal: '#007A8E',
                    }
                }
            }
        }
    </script>
</head>
<body class="flex justify-center items-center h-screen bg-gradient-to-r from-customBlue to-customTeal font-poppins">
   
    <div class="bg-white p-10 rounded-2xl shadow-2xl w-96 transform hover:scale-105 transition-transform duration-500">

        <div class="flex justify-center mb-8">
        <img src="https://i.postimg.cc/tRWzRP5g/IMG-2154.jpg" alt="Profile Picture" class="w-32 h-32 rounded-full border-4 border-gray-300 shadow-lg">
        </div>

        <div class="text-center space-y-6">
            <div class="bg-customDarkTeal bg-opacity-80 py-3 rounded-md hover:bg-opacity-100 transition-colors duration-300">
                <span class="font-semibold text-white">Nama</span>
                <p class="text-xl font-medium text-white"><?= $nama ?></p>
            </div>
            <div class="bg-customDarkTeal bg-opacity-80 py-3 rounded-md hover:bg-opacity-100 transition-colors duration-300">
                <span class="font-semibold text-white">Kelas</span>
                <p class="text-xl font-medium text-white"><?= $kelas ?></p>
            </div>
            <div class="bg-customDarkTeal bg-opacity-80 py-3 rounded-md hover:bg-opacity-100 transition-colors duration-300">
                <span class="font-semibold text-white">NPM</span>
                <p class="text-xl font-medium text-white"><?= $npm ?></p>
            </div>
        </div>
    </div>
</body>
</html>
