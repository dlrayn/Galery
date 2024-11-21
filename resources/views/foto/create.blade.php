@extends('layouts.dashboard')

@section('title', 'Tambah Foto')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-br from-indigo-50/30 via-white to-indigo-50/30 py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 flex items-center justify-center gap-3">
                <span class="text-indigo-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </span>
                Tambah Foto Baru
            </h1>
            <p class="mt-2 text-center text-gray-600">
                Silakan lengkapi informasi foto di bawah ini
            </p>
        </div>

        <!-- Main Form -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
            <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-gray-100">
                @csrf
                
                <!-- Gallery Selection -->
                <div class="p-6 space-y-2">
                    <label for="galery_id" class="block text-sm font-semibold text-gray-900">
                        Pilih Galeri <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="galery_id" 
                                id="galery_id" 
                                class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300 appearance-none"
                                required>
                            <option value="" disabled selected>Pilih Galeri</option>
                            @foreach($galeries as $galery)
                                <option value="{{ $galery->id }}" class="py-2">{{ $galery->id }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- File Upload -->
                <div class="p-6 bg-gray-50/50 space-y-2">
                    <label for="file" class="block text-sm font-semibold text-gray-900">
                        Upload Foto <span class="text-rose-500">*</span>
                    </label>
                    <label for="file" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-400 transition-colors duration-200 bg-white cursor-pointer group">
                        <div class="space-y-2 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-indigo-500 transition-colors duration-200" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex justify-center text-sm text-gray-600">
                                <span class="relative font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload file</span>
                                    <input id="file" name="file" type="file" class="sr-only" required>
                                </span>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF sampai 10MB
                            </p>
                        </div>
                    </label>
                </div>

                <!-- Title Input -->
                <div class="p-6 space-y-2">
                    <label for="judul" class="block text-sm font-semibold text-gray-900">
                        Judul Foto <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="judul" 
                           id="judul" 
                           class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                           required
                           placeholder="Masukkan judul foto">
                    <p class="mt-1 text-sm text-gray-500">Masukkan judul yang mendeskripsikan foto Anda</p>
                </div>

                <!-- Action Buttons -->
                <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3">
                    <a href="{{ route('foto.index') }}" 
                       class="inline-flex items-center px-6 py-3.5 border-2 border-gray-200 rounded-lg text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-6 py-3.5 border border-transparent rounded-lg text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm hover:shadow transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
