@extends('layouts.dashboard')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
            <span class="text-indigo-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            </span>
            Tambah Kategori Baru
        </h1>
        <p class="mt-2 text-gray-600">Buat kategori baru untuk mengorganisir konten Anda.</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ route('kategori.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Judul Input -->
                <div class="space-y-2">
                    <label for="judul" class="block text-sm font-semibold text-gray-900">
                        Judul Kategori <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="judul" 
                           id="judul" 
                           class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                           placeholder="Masukkan judul kategori"
                           required>
                    <p class="mt-1 text-sm text-gray-500">Gunakan judul yang singkat dan jelas</p>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('kategori.index') }}" 
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
                        Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
