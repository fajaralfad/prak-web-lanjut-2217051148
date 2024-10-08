<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    
    <!-- Link to Google Fonts for Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Link to Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'primary': '#4B5563',
                        'secondary': '#FBBF24',
                        'accent': '#3B82F6',
                        'light': '#F9FAFB',
                        'hover': '#D1FAE5',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header with Breadcrumb -->
    <header class="bg-primary text-white">
        <div class="container mx-auto px-6 py-4"> <!-- Ubah padding top agar lebih kecil -->
            <h1 class="text-3xl font-bold">{{ $title }}</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mt-3 mx-auto px-6 py-4"> <!-- Ubah padding agar lebih kecil -->
        @yield('content')
    </main>

    <!-- JavaScript for confirmation on delete -->
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
</body>
</html>
