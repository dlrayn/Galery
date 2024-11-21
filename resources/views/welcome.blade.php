<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SMK Negeri 4 Bogor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .navbar {
            background-color: #007bff;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            height: 64px;
        }
        
        .navbar.shrink {
            background-color: rgba(0, 105, 217, 0.95);
            backdrop-filter: blur(5px);
        }

        .hero {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('assets/lapang.jpeg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            padding-top: 64px;
            margin-top: 0;
        }

        footer {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
        }

        .card, .gallery-item {
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .card:hover, .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .aspect-w-1 {
            position: relative;
            padding-bottom: 75%;
        }

        .aspect-w-1 img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .grid > div {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .grid > div:nth-child(1) { animation-delay: 0.1s; }
        .grid > div:nth-child(2) { animation-delay: 0.2s; }
        .grid > div:nth-child(3) { animation-delay: 0.3s; }

        @media (max-width: 768px) {
            .desktop-menu {
                display: none;
            }
            .mobile-menu {
                display: block;
            }
            .hero {
                margin-top: 64px;
                height: 400px;
            }
        }

        #mobile-menu {
            position: absolute;
            top: 64px;
            left: 0;
            right: 0;
            background-color: #007bff;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .modal-container {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 50;
            overflow-y: auto;
            background-color: rgba(0,0,0,0.75);
        }

        .modal-container.show {
            display: block;
        }

        .prose {
            max-width: 65ch;
        }

        .aspect-w-16 {
            position: relative;
            padding-bottom: 56.25%;
        }

        .aspect-w-16 > img,
        .aspect-w-16 > iframe {
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            object-fit: cover;
        }

        .modal-content {
            max-height: calc(100vh - 4rem);
            margin: 2rem auto;
            overflow-y: auto;
        }

        .modal-content::-webkit-scrollbar {
            width: 8px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Animasi untuk semua elemen */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Animasi untuk hero section */
        .hero h1 {
            animation: fadeInUp 1s ease-out;
        }

        .hero p {
            animation: fadeInUp 1s ease-out 0.3s backwards;
        }

        /* Animasi untuk navbar */
        .navbar {
            animation: slideInLeft 1s ease-out;
        }

        .navbar a {
            transition: all 0.3s ease;
        }

        .navbar a:hover {
            transform: translateY(-2px);
        }

        /* Animasi untuk cards */
        .card {
            animation: scaleIn 0.5s ease-out;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Animasi untuk gambar */
        .aspect-w-1 img {
            transition: all 0.5s ease;
        }

        .aspect-w-1:hover img {
            transform: scale(1.1);
        }

        /* Animasi untuk modal */
        .modal-container {
            transition: all 0.3s ease;
        }

        .modal-container.show {
            animation: scaleIn 0.3s ease-out;
        }

        /* Animasi untuk footer */
        footer {
            animation: slideInRight 1s ease-out;
        }

        footer a {
            transition: all 0.3s ease;
        }

        footer a:hover {
            transform: translateY(-3px);
        }

        /* Animasi untuk scroll */
        .scroll-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Animasi untuk mobile menu */
        #mobile-menu {
            transition: all 0.3s ease;
        }

        #mobile-menu a {
            animation: slideInRight 0.3s ease-out backwards;
        }

        /* Hover effects enhancement */
        .hover-float:hover {
            animation: float 2s ease-in-out infinite;
        }

        /* Loading animation */
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loading {
            animation: spin 1s linear infinite;
        }

        /* Animasi Dasar */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Aplikasi Animasi ke Elemen */
        
        /* Navbar */
        .navbar {
            animation: fadeInDown 0.8s ease-out;
        }

        .navbar a {
            animation: fadeIn 0.5s ease-out;
            transition: all 0.3s ease;
        }

        .navbar a:hover {
            transform: translateY(-2px);
            color: #f0f9ff;
        }

        /* Hero Section */
        .hero {
            animation: scaleIn 1s ease-out;
        }

        .hero h1 {
            animation: fadeInUp 1s ease-out 0.3s backwards;
        }

        .hero p {
            animation: fadeInUp 1s ease-out 0.6s backwards;
        }

        /* Cards dan Konten */
        .card {
            animation: fadeInUp 0.8s ease-out backwards;
        }

        .card:nth-child(1) { animation-delay: 0.2s; }
        .card:nth-child(2) { animation-delay: 0.4s; }
        .card:nth-child(3) { animation-delay: 0.6s; }
        .card:nth-child(4) { animation-delay: 0.8s; }

        .card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Images */
        .aspect-w-1 img {
            animation: scaleIn 0.8s ease-out;
            transition: transform 0.5s ease;
        }

        .aspect-w-1:hover img {
            transform: scale(1.1);
        }

        /* Text Elements */
        h1, h2, h3, h4, h5, h6 {
            animation: fadeInLeft 0.8s ease-out backwards;
        }

        p {
            animation: fadeInRight 0.8s ease-out backwards;
        }

        /* Buttons */
        button, .btn {
            animation: fadeIn 0.5s ease-out;
            transition: all 0.3s ease;
        }

        button:hover, .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* Modal */
        .modal-container {
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            animation: scaleIn 0.5s ease-out;
        }

        /* Footer */
        footer {
            animation: fadeInUp 0.8s ease-out;
        }

        footer a {
            transition: all 0.3s ease;
        }

        footer a:hover {
            transform: translateY(-3px);
            opacity: 0.9;
        }

        /* Mobile Menu */
        #mobile-menu {
            animation: fadeInDown 0.3s ease-out;
        }

        #mobile-menu a {
            animation: fadeInRight 0.3s ease-out backwards;
        }

        /* Gallery Items */
        .gallery-item {
            animation: scaleIn 0.5s ease-out backwards;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        /* Loading States */
        .loading {
            animation: spin 1s linear infinite;
        }

        /* Scroll Animations */
        .scroll-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Hover Animations */
        .hover-float:hover {
            animation: float 2s ease-in-out infinite;
        }

        .hover-pulse:hover {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Links */
        a {
            transition: all 0.3s ease;
        }

        a:hover {
            opacity: 0.8;
        }

        /* Form Elements */
        input, textarea, select {
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus, select:focus {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Animasi untuk text hero */
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes glowText {
            0%, 100% {
                text-shadow: 0 0 30px rgba(255,255,255,0.3),
                             0 0 60px rgba(255,255,255,0.3);
            }
            50% {
                text-shadow: 0 0 30px rgba(255,255,255,0.5),
                             0 0 60px rgba(255,255,255,0.5);
            }
        }

        .hero-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            background: linear-gradient(
                300deg,
                #4287f5,  /* Biru Terang */
                #34ebe8,  /* Cyan */
                #4287f5,  /* Biru Terang */
                #6366f1   /* Indigo */
            );
            background-size: 300% 300%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: 
                slideInDown 1s ease-out,
                gradientText 8s ease infinite,
                glowText 3s ease-in-out infinite;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-title span {
            display: block;
            margin-top: 0.5em;
            background: linear-gradient(
                45deg,
                #ffffff,    /* Putih */
                #e2e8f0,    /* Slate-200 */
                #ffffff     /* Putih */
            );
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 30px rgba(255,255,255,0.5);
        }

        .hero-subtitle {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            background: linear-gradient(
                45deg,
                #60a5fa,  /* Biru Muda */
                #34ebe8,  /* Cyan */
                #60a5fa   /* Biru Muda */
            );
            background-size: 200% 200%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradientText 5s ease infinite;
            letter-spacing: 4px;
            position: relative;
            padding-bottom: 20px;
        }

        .hero-subtitle::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(
                90deg,
                transparent,
                #60a5fa,  /* Biru Muda */
                #34ebe8,  /* Cyan */
                #60a5fa,  /* Biru Muda */
                transparent
            );
            animation: gradientText 5s ease infinite;
        }

        /* Tambahkan highlight effect */
        .hero-highlight {
            position: absolute;
            top: -20%;
            left: -10%;
            right: -10%;
            bottom: -20%;
            background: radial-gradient(
                circle,
                rgba(66, 135, 245, 0.1) 0%,
                transparent 70%
            );
            filter: blur(20px);
            z-index: -1;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .hero-title {
                font-size: 2.5rem;
                letter-spacing: 0.5px;
            }
            .hero-subtitle {
                font-size: 1.2rem;
                letter-spacing: 2px;
            }
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <!-- Navbar -->
    <nav class="navbar h-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="h-12 w-auto">
                    <span class="text-white text-xl font-semibold hidden sm:block">SMK Negeri 4 Bogor</span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-4">
                    <a href="#home" class="text-white font-bold hover:bg-blue-700 p-2 rounded">Home</a>
                    <a href="#about" class="text-white font-bold hover:bg-blue-700 p-2 rounded">About</a>
                    <a href="#programs" class="text-white font-bold hover:bg-blue-700 p-2 rounded">Programs</a>
                    @if($galeries->isNotEmpty())
                        <a href="#gallery" class="text-white font-bold hover:bg-blue-700 p-2 rounded">Gallery</a>
                    @endif
                    <a href="#Navigasi" class="text-white font-bold hover:bg-blue-700 p-2 rounded">Navigasi</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button type="button" onclick="toggleMobileMenu()" class="text-white p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-blue-600">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#home" class="text-white block px-3 py-2 rounded-md hover:bg-blue-700">Home</a>
                <a href="#about" class="text-white block px-3 py-2 rounded-md hover:bg-blue-700">About</a>
                <a href="#programs" class="text-white block px-3 py-2 rounded-md hover:bg-blue-700">Programs</a>
                @if($galeries->isNotEmpty())
                    <a href="#gallery" class="text-white block px-3 py-2 rounded-md hover:bg-blue-700">Gallery</a>
                @endif
                <a href="#contact" class="text-white block px-3 py-2 rounded-md hover:bg-blue-700">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="home" class="hero flex justify-center items-center text-white text-center">
        <div class="max-w-3xl mx-auto px-4 relative">
            <div class="hero-highlight"></div>
            <h1 class="hero-title text-4xl sm:text-5xl md:text-6xl mb-6">
                Welcome to
                <span>SMK Negeri 4 Bogor</span>
            </h1>
            <p class="hero-subtitle text-xl sm:text-2xl mt-8">
                Your Future Starts Here
            </p>
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="py-16 px-6 bg-gradient-to-b from-gray-100 to-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">About Us</h2>
                <div class="w-20 h-1 bg-blue-500 mx-auto rounded-full mb-8"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Image Column -->
                <div class="relative">
                    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-xl">
                        <img src="{{ asset('assets/kepala_sekolah.jpg') }}" 
                             alt="School Image" 
                             class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-blue-500 rounded-full opacity-10"></div>
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-green-500 rounded-full opacity-10"></div>
                </div>

                <!-- Content Column -->
                <div class="space-y-6">
                    @foreach ($profiles as $profile)
                        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                            <div class="prose max-w-none">
                                <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $profile->judul }}</h3>
                                <p class="text-gray-700 leading-relaxed">
                                    {{ $profile->isi }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                    <!-- CTA Button -->
                    <div class="mt-8 text-center md:text-left">
                        <a href="{{ route('programs.detail') }}" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition duration-300 shadow-lg hover:shadow-xl">
                            <span>Info Jurusan</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-semibold mb-6 text-center">Our Programs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($kategoris as $kategori)
                    <div class="card bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $kategori->judul }}</h2>
                            
                            <!-- Preview Text -->
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($kategori->deskripsi ?? 'Klik untuk melihat detail program dan informasi terkait.', 100) }}
                            </p>

                            <!-- Tombol Lihat Semua -->
                            <div class="text-center">
                                <button onclick="openModal('modal-{{ $kategori->id }}')"
                                       class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                                    <i class="fas fa-eye mr-2"></i>
                                    Lihat Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Kategori -->
                    <div id="modal-{{ $kategori->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/95">
                        <div class="min-h-screen flex items-start justify-center pt-20 pb-8">
                            <div class="relative w-full max-w-3xl mx-auto px-4">
                                <!-- Modal Content Container -->
                                <div class="bg-gray-900 rounded-xl shadow-2xl overflow-hidden">
                                    <!-- Modal Header -->
                                    <div class="sticky top-0 z-10 bg-gray-900 px-4 py-3 border-b border-gray-800">
                                        <div class="flex justify-between items-center">
                                            <h3 class="text-lg font-bold text-white">{{ $kategori->judul }}</h3>
                                            <button onclick="closeModal('modal-{{ $kategori->id }}')" 
                                                    class="p-1.5 hover:bg-gray-800 rounded-full transition-colors">
                                                <i class="fas fa-times text-gray-400 hover:text-white"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Posts List - Scrollable Container -->
                                    <div class="p-4" style="max-height: calc(100vh - 240px); overflow-y-auto;">
                                        <div class="space-y-3 max-w-2xl mx-auto">
                                            @forelse($posts->where('kategori_id', $kategori->id) as $post)
                                                <div class="bg-gray-800 rounded-lg p-3 hover:bg-gray-750 transition duration-200 cursor-pointer"
                                                     onclick="showGalleryForPost({{ $post->id }})">
                                                    <h4 class="text-white text-sm font-semibold mb-1.5">{{ $post->judul }}</h4>
                                                    <p class="text-gray-400 text-xs leading-relaxed line-clamp-2 mb-2">
                                                        {{ $post->isi }}
                                                    </p>
                                                    <div class="flex items-center justify-between text-xs">
                                                        <span class="text-gray-500">
                                                            <i class="far fa-calendar-alt mr-1"></i>
                                                            {{ $post->created_at->format('d/m/Y') }}
                                                        </span>
                                                        <button onclick="showPostGallery({{ $post->id }})" 
                                                                class="text-blue-400 hover:text-blue-300 flex items-center">
                                                            <i class="fas fa-images mr-1"></i>
                                                            Lihat Galeri
                                                        </button>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center py-6">
                                                    <i class="fas fa-folder-open text-2xl text-gray-600 mb-2"></i>
                                                    <p class="text-gray-400 text-sm">Belum ada post dalam kategori ini.</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="sticky bottom-0 z-10 bg-gray-900 px-4 py-3 border-t border-gray-800">
                                        <div class="flex justify-end">
                                            <button onclick="closeModal('modal-{{ $kategori->id }}')"
                                                    class="px-3 py-1.5 bg-gray-800 text-white text-xs rounded-lg hover:bg-gray-700 transition duration-300 flex items-center gap-2">
                                                <i class="fas fa-times"></i>
                                                Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3">
                        <div class="text-center py-8 bg-white rounded-lg shadow">
                            <i class="fas fa-folder-open text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500">Tidak ada kategori yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    @if($galeries->isNotEmpty())
        <section id="gallery" class="py-16 px-6 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">Gallery</h2>
                    <div class="w-20 h-1 bg-blue-500 mx-auto rounded-full"></div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 auto-rows-auto">
                    @foreach ($galeries as $galery)
                        <div class="group relative overflow-hidden rounded-2xl shadow-lg transform hover:-translate-y-2 transition duration-300 cursor-pointer" 
                             onclick="openModal('gallery-modal-{{ $galery->id }}')">
                            @foreach ($fotos->where('galery_id', $galery->id)->take(1) as $foto)
                                <div class="relative aspect-w-1">
                                    <img src="{{ asset('storage/' . $foto->file) }}" 
                                         alt="{{ $foto->judul }}" 
                                         class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                    
                                    <!-- Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                                        <div class="absolute bottom-0 left-0 right-0 p-6">
                                            <h4 class="text-white text-xl font-bold transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                                                {{ $galery->judul }}
                                            </h4>
                                            <p class="text-gray-300 text-sm mt-2 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition duration-300 delay-100">
                                                Klik untuk melihat semua foto
                                            </p>
                                            <div class="flex items-center mt-4 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition duration-300 delay-200">
                                                <span class="text-white text-sm">
                                                    <i class="fas fa-images mr-2"></i>
                                                    {{ $fotos->where('galery_id', $galery->id)->count() }} Photos
                                                </span>
                                                <span class="ml-auto text-white">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Modal Gallery -->
                        <div id="gallery-modal-{{ $galery->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/95">
                            <div class="min-h-screen flex items-start justify-center pt-20 pb-8">
                                <div class="relative w-full max-w-6xl mx-auto px-4">
                                    <!-- Modal Content Container -->
                                    <div class="bg-gray-900 rounded-xl shadow-2xl overflow-hidden">
                                        <!-- Modal Header -->
                                        <div class="sticky top-0 z-10 bg-gray-900 px-4 py-3 border-b border-gray-800">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <h3 class="text-xl font-bold text-white">{{ $galery->judul }}</h3>
                                                    <p class="text-gray-400 text-xs mt-0.5">
                                                        <i class="fas fa-images mr-1"></i>
                                                        {{ $fotos->where('galery_id', $galery->id)->count() }} Photos
                                                    </p>
                                                </div>
                                                <button onclick="closeModal('gallery-modal-{{ $galery->id }}')" 
                                                        class="p-1.5 hover:bg-gray-800 rounded-full transition-colors">
                                                    <i class="fas fa-times text-gray-400 hover:text-white"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Photos Grid - Scrollable Container -->
                                        <div class="p-4" style="max-height: calc(100vh - 240px); overflow-y-auto;">
                                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                                                @foreach ($fotos->where('galery_id', $galery->id) as $foto)
                                                    <div class="group bg-gray-800 rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                                                        <div class="aspect-w-1 relative">
                                                            <img src="{{ asset('storage/' . $foto->file) }}" 
                                                                 alt="{{ $foto->judul }}" 
                                                                 class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                                                            <!-- Overlay dengan tombol di tengah -->
                                                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                                                <div class="absolute inset-0 flex flex-col items-center justify-center gap-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                                                    <a href="{{ asset('storage/' . $foto->file) }}" 
                                                                       target="_blank"
                                                                       class="flex items-center gap-2 px-4 py-2 bg-white/90 hover:bg-white text-gray-800 rounded-full text-xs font-medium transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5"
                                                                       title="Buka di tab baru">
                                                                        <i class="fas fa-external-link-alt text-blue-500"></i>
                                                                        <span>Lihat Foto</span>
                                                                    </a>
                                                                    <a href="{{ asset('storage/' . $foto->file) }}" 
                                                                       download="{{ $foto->judul }}"
                                                                       class="flex items-center gap-2 px-4 py-2 bg-white/90 hover:bg-white text-gray-800 rounded-full text-xs font-medium transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5"
                                                                       title="Download foto">
                                                                        <i class="fas fa-download text-green-500"></i>
                                                                        <span>Download Foto</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-2">
                                                            <h4 class="text-white text-xs font-medium mb-1 line-clamp-1">
                                                                {{ $foto->judul }}
                                                            </h4>
                                                            @if($foto->deskripsi)
                                                                <p class="text-gray-400 text-xs leading-relaxed line-clamp-1">
                                                                    {{ $foto->deskripsi }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="sticky bottom-0 z-10 bg-gray-900 px-4 py-3 border-t border-gray-800">
                                            <div class="flex justify-end">
                                                <button onclick="closeModal('gallery-modal-{{ $galery->id }}')"
                                                        class="px-4 py-2 bg-gray-800 text-white text-xs rounded-lg hover:bg-gray-700 transition duration-300 flex items-center gap-2">
                                                    <i class="fas fa-times"></i>
                                                    Tutup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Maps Section -->
    <section id="Navigasi" class="py-16 px-6 bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Lokasi Kami</h2>
                <div class="w-20 h-1 bg-blue-500 mx-auto rounded-full mb-8"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    SMK Negeri 4 Bogor (Nebrazka)<br>
                    Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muara sari,<br>
                    Kec. Bogor Selatan, RT.03/RW.08, Muarasari, Kec. Bogor Sel.,<br>
                    Kota Bogor, Jawa Barat 16137
                </p>
            </div>

            <!-- Grid untuk Maps dan Denah -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Google Maps -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4559427532897!2d106.82211897475766!3d-6.640733393433037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMKN%204%20Bogor!5e0!3m2!1sen!2sid!4v1710900000000!5m2!1sen!2sid"
                            width="100%" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Denah Sekolah -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ asset('assets/denah.jpeg') }}" 
                             alt="Denah SMK Negeri 4 Bogor" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 bg-white">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Denah Sekolah</h3>
                        <p class="text-gray-600 text-sm">
                            Denah lokasi dan tata letak gedung SMK Negeri 4 Bogor
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tombol Petunjuk Arah -->
            <div class="text-center">
                <a href="https://www.google.com/maps/place/SMKN+4+Bogor/@-6.6407334,106.822119,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69c8b16ee07ef5:0x14ab253dd267de49!8m2!3d-6.6407334!4d106.8246939!16s%2Fg%2F1hm2r8zh4?hl=en&entry=ttu&g_ep=EgoyMDI0MTExOC4wIKXMDSoJLDEwMjExMjMzSAFQAw%3D%3D" 
                   target="_blank" 
                   class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-directions mr-2"></i>
                    <span>Petunjuk Arah</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Social Media Icons -->
            <div class="flex justify-center space-x-6 mb-4">
                <a href="https://www.instagram.com/smkn4kotabogor?igsh=MWFsc3N2bGF5cGRkcQ==" target="_blank" class="text-white hover:text-gray-300 transition duration-300">
                    <i class="fab fa-instagram text-2xl"></i>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="https://m.facebook.com/100054636630766/" target="_blank" class="text-white hover:text-gray-300 transition duration-300">
                    <i class="fab fa-facebook text-2xl"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://youtube.com/@smknegeri4bogor905?si=wdGvEgqu1cA2ekSg" target="_blank" class="text-white hover:text-gray-300 transition duration-300">
                    <i class="fab fa-youtube text-2xl"></i>
                    <span class="sr-only">YouTube</span>
                </a>
            </div>
            <p class="text-white">&copy; 2024 RayFusion. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Navbar scroll handling dengan throttle
        let lastScroll = 0;
        const scrollThrottle = (func, limit) => {
            let inThrottle;
            return function() {
                const args = arguments;
                const context = this;
                if (!inThrottle) {
                    func.apply(context, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            }
        }

        window.addEventListener("scroll", scrollThrottle(() => {
            const navbar = document.querySelector(".navbar");
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 50) {
                navbar.classList.add("shrink");
            } else {
                navbar.classList.remove("shrink");
            }
            
            lastScroll = currentScroll;
        }, 100));

        // Perbaikan fungsi modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
            
            // Close dengan escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeModal(modalId);
            });
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('show');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Perbaikan mobile menu
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const isHidden = menu.classList.contains('hidden');
            
            menu.style.maxHeight = isHidden ? `${menu.scrollHeight}px` : '0';
            menu.classList.toggle('hidden');
        }

        // Smooth scroll dengan error handling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                // Tutup mobile menu jika terbuka
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    toggleMobileMenu();
                }

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const headerOffset = 64; // Tinggi navbar
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        function showGalleryForPost(postId) {
            // Fetch gallery data for the post using AJAX
            fetch(`/api/posts/${postId}/gallery`)
                .then(response => response.json())
                .then(data => {
                    if (data.gallery) {
                        // If there's a gallery associated with the post, open the gallery modal
                        openModal(`gallery-modal-${data.gallery.id}`);
                    } else {
                        // If no gallery is found, show an alert or message
                        alert('No gallery available for this post.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching gallery data:', error);
                    alert('Failed to load gallery content.');
                });
        }

        function showPostGallery(postId) {
            fetch(`/api/posts/${postId}/gallery`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.gallery) {
                        // Update modal title dan count
                        document.getElementById('gallery-title').textContent = data.post.judul;
                        document.getElementById('gallery-count').querySelector('span').textContent = data.gallery.fotos.length;
                        
                        // Generate HTML untuk foto-foto
                        const gridHTML = data.gallery.fotos.map(foto => `
                            <div class="group bg-gray-800 rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                                <div class="aspect-w-1 relative">
                                    <img src="${assetUrl(foto.file)}" 
                                         alt="${foto.judul}" 
                                         class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <div class="absolute inset-0 flex flex-col items-center justify-center gap-2">
                                            <a href="${assetUrl(foto.file)}" 
                                               target="_blank"
                                               class="flex items-center gap-2 px-4 py-2 bg-white/90 hover:bg-white text-gray-800 rounded-full text-xs font-medium transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5"
                                               title="Buka di tab baru">
                                                <i class="fas fa-external-link-alt text-blue-500"></i>
                                                <span>Lihat Foto</span>
                                            </a>
                                            <a href="${assetUrl(foto.file)}" 
                                               download="${foto.judul}"
                                               class="flex items-center gap-2 px-4 py-2 bg-white/90 hover:bg-white text-gray-800 rounded-full text-xs font-medium transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5"
                                               title="Download foto">
                                                <i class="fas fa-download text-green-500"></i>
                                                <span>Download Foto</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <h4 class="text-white text-xs font-medium mb-1 line-clamp-1">
                                        ${foto.judul}
                                    </h4>
                                    ${foto.deskripsi ? `
                                        <p class="text-gray-400 text-xs leading-relaxed line-clamp-1">
                                            ${foto.deskripsi}
                                        </p>
                                    ` : ''}
                                </div>
                            </div>
                        `).join('');
                        
                        // Update grid content
                        document.getElementById('gallery-grid').innerHTML = gridHTML;
                        
                        // Show modal
                        document.getElementById('post-gallery-modal').classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    } else {
                        Swal.fire({
                            title: 'Info',
                            text: 'Belum ada foto dalam galeri ini',
                            icon: 'info',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Gagal memuat galeri',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        }

        function closePostGallery() {
            document.getElementById('post-gallery-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function assetUrl(path) {
            return `/storage/${path}`;
        }

        // Close modal when clicking outside
        document.getElementById('post-gallery-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePostGallery();
            }
        });

        // Close modal with escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePostGallery();
            }
        });

        // Add scroll animation
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Add scroll-animate class to elements you want to animate
        document.querySelectorAll('.card, .aspect-w-1, h2, p').forEach(el => {
            el.classList.add('scroll-animate');
            observer.observe(el);
        });
    </script>
</body>
</html>
