<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Keahlian - SMK Negeri 4 Bogor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <nav class="bg-blue-600 text-white py-4">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between">
                <a href="/" class="text-xl font-bold">SMK Negeri 4 Bogor</a>
                <a href="/" class="hover:text-blue-200 transition">Kembali</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2023 SMK Negeri 4 Bogor. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 