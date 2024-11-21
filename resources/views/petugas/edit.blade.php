@extends('layouts.dashboard')

@section('title', 'Edit Petugas')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-br from-indigo-50/30 via-white to-indigo-50/30 py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 flex items-center justify-center gap-3">
                <span class="text-indigo-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </span>
                Edit Petugas
            </h1>
            <p class="mt-2 text-gray-600">Silakan edit informasi petugas di bawah ini</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6">
                <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-rose-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="text-sm font-medium text-rose-800">Terdapat beberapa kesalahan:</h3>
                    </div>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-rose-700">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Main Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
            <div class="p-6 space-y-6">
                <form action="{{ route('petugas.update', $petugas->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Username Input -->
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-semibold text-gray-900">
                            Username <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="username" 
                                   id="username" 
                                   value="{{ old('username', $petugas->username) }}"
                                   class="block w-full pl-10 rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                                   required
                                   placeholder="Masukkan username">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-gray-900">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="block w-full pl-10 rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                                   placeholder="Masukkan password baru">
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengubah password</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 flex flex-col sm:flex-row gap-3 border-t border-gray-100">
                        <a href="{{ route('petugas.index') }}" 
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
