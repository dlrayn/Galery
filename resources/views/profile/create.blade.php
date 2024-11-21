@extends('layouts.dashboard')

@section('title', 'Tambah Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
            <span class="text-indigo-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </span>
            Tambah Profile Baru
        </h1>
        <p class="mt-2 text-gray-600">Tambahkan informasi profile website Anda.</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ route('profile.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Judul Input -->
                <div class="space-y-2">
                    <label for="judul" class="block text-sm font-semibold text-gray-900">
                        Judul <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="judul" 
                           id="judul" 
                           class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                           placeholder="Masukkan judul profile"
                           required>
                </div>

                <!-- Isi Textarea -->
                <div class="space-y-2">
                    <label for="isi" class="block text-sm font-semibold text-gray-900">
                        Isi <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="isi" 
                              id="isi" 
                              rows="6" 
                              class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                              placeholder="Tulis isi profile di sini..."
                              required></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('profile.index') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 border-2 border-gray-200 text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                    
                    <button type="submit" 
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 border border-transparent text-sm font-semibold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm hover:shadow transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
