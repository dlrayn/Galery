@extends('layouts.dashboard')

@section('content')
  @php
      $petugas = Auth::user();
  @endphp

  @if($petugas)
    <!-- Main container with gradient background -->
    <section class="bg-gradient-to-br from-gray-50 to-indigo-50 p-8 rounded-xl shadow-2xl mt-6 relative">

    <!-- Redesigned logout button -->
    <div class="absolute top-4 right-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white py-2 px-6 rounded-full hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </button>
        </form>
    </div>

    <!-- Welcome message with animation -->
    <div class="flex justify-start mb-8 animate-fade-in">
        <div class="text-xl font-semibold text-gray-700">
            Selamat datang, <span class="text-indigo-600 font-bold">{{ $petugas->username }}</span>
        </div>
    </div>

    <h2 class="text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600 mb-12 text-center">Dashboard Overview</h2>

    <!-- Main statistics cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <!-- Statistics cards with hover effects -->
        <a href="{{ route('profile.index') }}" class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-gray-800">Total Profile</h3>
                <i class="fas fa-user-circle text-indigo-500 text-2xl"></i>
            </div>
            <p class="text-4xl font-extrabold text-indigo-600 mt-4">{{ \App\Models\Profile::count() }}</p>
        </a>

        <!-- Card Foto Petugas -->
        <a href="{{ route('petugas.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
          <h3 class="text-2xl font-bold text-gray-800">Total Petugas</h3>
          <p class="text-4xl font-extrabold text-indigo-600 mt-4">{{ \App\Models\Petugas::count() }}</p>
        </a>
        
        <a href="{{ route('kategori.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
          <h3 class="text-2xl font-bold text-gray-800">Total Kategori</h3>
          <p class="text-4xl font-extrabold text-indigo-600 mt-4">{{ \App\Models\Kategori::count() }}</p>
        </a>
    </div>

    <!-- Quick action buttons with gradient -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('profile.create') }}" class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white py-4 px-6 rounded-xl font-semibold text-center hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Profile Baru
        </a>
        <a href="{{ route('petugas.create') }}" class="bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold text-center">Tambah Petugas Baru</a>
        <a href="{{ route('kategori.create') }}" class="bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold text-center">Tambah Kategori Baru</a>
    </div>

    <!-- Secondary statistics cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-12">
        <a href="{{ route('posts.index') }}" class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-gray-800">Total Post</h3>
                <i class="fas fa-newspaper text-indigo-500 text-2xl"></i>
            </div>
            <p class="text-4xl font-extrabold text-indigo-600 mt-4">{{ \App\Models\Post::count() }}</p>
        </a>

        <!-- Card Galeri -->
        <a href="{{ route('galery.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
          <h3 class="text-2xl font-bold text-gray-800">Total Galery</h3>
          <p class="text-4xl font-extrabold text-indigo-600 mt-4">{{ \App\Models\Galery::count() }}</p>
        </a>

        <!-- Card Foto Galeri -->
        <a href="{{ route('foto.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
          <h3 class="text-2xl font-bold text-gray-800">Total Foto</h3>
          <p class="text-4xl font-extrabold text-indigo-600 mt-4">{{ \App\Models\Foto::count() }}</p>
        </a>
    </div>

    <!-- Secondary action buttons -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        <a href="{{ route('posts.create') }}" class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white py-4 px-6 rounded-xl font-semibold text-center hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Post Baru
        </a>
        <a href="{{ route('galery.create') }}" class="bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold text-center">Tambah Galery Baru</a>
        <a href="{{ route('foto.create') }}" class="bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold text-center">Tambah Foto Baru</a>
    </div>

    </section>
  @endif
@endsection
