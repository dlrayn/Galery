@extends('layouts.dashboard')

@section('title', 'Tambah Post')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
            <span class="text-indigo-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </span>
            Tambah Post Baru
        </h1>
        <p class="mt-2 text-gray-600">Buat post baru untuk konten website Anda.</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                        <div class="flex">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                            </svg>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Terdapat beberapa kesalahan:</h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Judul Input -->
                <div class="space-y-2">
                    <label for="judul" class="block text-sm font-semibold text-gray-900">
                        Judul <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="judul" 
                           id="judul" 
                           class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                           placeholder="Masukkan judul post"
                           required>
                </div>

                <!-- Kategori Selection -->
                <div class="space-y-2">
                    <label for="kategori_id" class="block text-sm font-semibold text-gray-900">
                        Kategori <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="kategori_id" 
                                id="kategori_id" 
                                class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                                required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->judul }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
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
                              placeholder="Tulis isi post di sini..."
                              required></textarea>
                </div>

                <!-- Petugas Input (Hidden) -->
                @auth
                    <input type="hidden" name="petugas_id" value="{{ auth()->id() }}">
                @endauth
                
                <!-- Status Selection -->
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-semibold text-gray-900">
                        Status <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="status" 
                                id="status" 
                                class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                                required>
                            <option value="draft">Draft</option>
                            <option value="public">Public</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('posts.index') }}" 
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
                        Simpan Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
