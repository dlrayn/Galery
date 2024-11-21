@extends('layouts.dashboard')

@section('title', 'Edit Galeri')

@section('content')
<div class="max-w-4xl mx-auto">
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            <span class="text-indigo-600">✏️</span> Edit Galeri
        </h1>
    </header>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ route('galery.update', $galery->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Post Selection -->
                <div class="space-y-2">
                    <label for="post_id" class="block text-sm font-medium text-gray-900">
                        Pilih Post <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="post_id" 
                                id="post_id" 
                                class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3 pr-8 text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all appearance-none"
                                required>
                            <option value="" disabled>Pilih Post</option>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}" {{ $galery->post_id == $post->id ? 'selected' : '' }}>
                                    {{ $post->judul }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Position Input -->
                <div class="space-y-2">
                    <label for="position" class="block text-sm font-medium text-gray-900">
                        Posisi <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" 
                           name="position" 
                           id="position" 
                           value="{{ old('position', $galery->position) }}"
                           class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all"
                           placeholder="Masukkan urutan posisi"
                           required>
                </div>

                <!-- Status Selection -->
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-medium text-gray-900">
                        Status <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="status" 
                                id="status" 
                                class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3 pr-8 text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all appearance-none"
                                required>
                            <option value="draft" {{ $galery->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="public" {{ $galery->status == 'public' ? 'selected' : '' }}>Public</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-4 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('galery.index') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                    
                    <button type="submit" 
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
