@extends('layouts.dashboard')

@section('title', 'Edit Post')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-br from-indigo-50/30 via-white to-indigo-50/30 py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 flex items-center justify-center gap-3">
                <span class="text-indigo-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </span>
                Edit Post
            </h1>
            <p class="mt-2 text-gray-600">Silakan edit informasi post di bawah ini</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
            <div class="p-6 space-y-6">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
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

                    <!-- Title Input -->
                    <div class="space-y-2">
                        <label for="judul" class="block text-sm font-semibold text-gray-900">
                            Judul <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="judul" 
                               id="judul" 
                               value="{{ old('judul', $post->judul) }}"
                               class="block w-full rounded-lg border-2 @error('judul') border-red-300 @else border-gray-200 @enderror bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                               required>
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category Selection -->
                    <div class="space-y-2">
                        <label for="kategori_id" class="block text-sm font-semibold text-gray-900">
                            Kategori <span class="text-rose-500">*</span>
                        </label>
                        <select name="kategori_id" 
                                id="kategori_id" 
                                class="block w-full rounded-lg border-2 @error('kategori_id') border-red-300 @else border-gray-200 @enderror bg-white px-4 py-3.5 text-gray-900"
                                required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_id', $post->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->judul }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content Input -->
                    <div class="space-y-2">
                        <label for="isi" class="block text-sm font-semibold text-gray-900">
                            Isi Post <span class="text-rose-500">*</span>
                        </label>
                        <textarea name="isi" 
                                  id="isi" 
                                  rows="6" 
                                  class="block w-full rounded-lg border-2 @error('isi') border-red-300 @else border-gray-200 @enderror bg-white px-4 py-3.5 text-gray-900"
                                  required>{{ old('isi', $post->isi) }}</textarea>
                        @error('isi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Selection -->
                    <div class="space-y-2">
                        <label for="status" class="block text-sm font-semibold text-gray-900">
                            Status <span class="text-rose-500">*</span>
                        </label>
                        <select name="status" 
                                id="status" 
                                class="block w-full rounded-lg border-2 @error('status') border-red-300 @else border-gray-200 @enderror bg-white px-4 py-3.5 text-gray-900"
                                required>
                            <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $post->status) === 'public' ? 'selected' : '' }}>Public</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 flex flex-col sm:flex-row gap-3">
                        <button type="submit" 
                                class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Perubahan
                        </button>
                        
                        <a href="{{ route('posts.index') }}" 
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 border-2 border-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all duration-200">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Help Text -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">
                Butuh bantuan? <a href="#" class="text-indigo-600 hover:text-indigo-500">Hubungi support</a>
            </p>
        </div>
    </div>
</div>
@endsection
