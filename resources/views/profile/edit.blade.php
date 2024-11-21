@extends('layouts.dashboard')

@section('title', 'Edit Profile')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-br from-indigo-50/30 via-white to-indigo-50/30 py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 flex items-center justify-center gap-3">
                <span class="text-indigo-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </span>
                Edit Profile
            </h1>
            <p class="mt-2 text-gray-600">Silakan edit informasi profile di bawah ini</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6">
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
                    <div class="flex">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <p class="ml-3 text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
            <div class="p-6 space-y-6">
                <form action="{{ route('profile.update', $profile->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Title Input -->
                    <div class="space-y-2">
                        <label for="judul" class="block text-sm font-semibold text-gray-900">
                            Judul <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="judul" 
                               id="judul" 
                               value="{{ old('judul', $profile->judul) }}"
                               class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                               required
                               placeholder="Masukkan judul profile">
                    </div>

                    <!-- Content Input -->
                    <div class="space-y-2">
                        <label for="isi" class="block text-sm font-semibold text-gray-900">
                            Isi Profile <span class="text-rose-500">*</span>
                        </label>
                        <textarea name="isi" 
                                  id="isi" 
                                  rows="6" 
                                  class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                                  required
                                  placeholder="Tulis isi profile di sini...">{{ old('isi', $profile->isi) }}</textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 flex flex-col sm:flex-row gap-3 border-t border-gray-100">
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
                            Simpan Perubahan
                        </button>
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
