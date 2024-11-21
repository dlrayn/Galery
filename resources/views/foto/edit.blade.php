@extends('layouts.dashboard')

@section('title', 'Edit Foto')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-br from-indigo-50/30 via-white to-indigo-50/30 py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 flex items-center justify-center gap-3">
                <span class="text-indigo-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </span>
                Edit Foto
            </h1>
            <p class="mt-2 text-gray-600">Silakan edit informasi foto di bawah ini</p>
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
                <form action="{{ route('foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Gallery Selection -->
                    <div class="space-y-2">
                        <label for="galery_id" class="block text-sm font-semibold text-gray-900">
                            Pilih Galeri <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="galery_id" 
                                    id="galery_id" 
                                    class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                                    required>
                                <option value="" disabled>Pilih Galeri</option>
                                @foreach($galeries as $galery)
                                    <option value="{{ $galery->id }}" {{ $foto->galery_id == $galery->id ? 'selected' : '' }}>
                                        {{ $galery->id }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div class="space-y-2">
                        <label for="file" class="block text-sm font-semibold text-gray-900">
                            Upload Foto Baru <span class="text-rose-500">*</span>
                        </label>
                        
                        <!-- Preview Foto Saat Ini -->
                        @if($foto->file)
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-700 mb-2">Foto Saat Ini:</p>
                            <div class="relative group w-48 h-48">
                                <img src="{{ asset('storage/' . $foto->file) }}" 
                                     alt="Current photo" 
                                     class="w-full h-full object-cover rounded-lg border-2 border-gray-200">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-200 rounded-lg"></div>
                            </div>
                        </div>
                        @endif

                        <!-- Upload New Photo -->
                        <label for="file" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-400 transition-colors duration-200 bg-white cursor-pointer group">
                            <div class="space-y-2 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-indigo-500 transition-colors duration-200" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <div class="flex justify-center text-sm text-gray-600">
                                    <span class="relative font-medium text-indigo-600 hover:text-indigo-500">
                                        <span>Upload file baru</span>
                                        <input id="file" name="file" type="file" class="sr-only" accept="image/*">
                                    </span>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF sampai 10MB</p>
                            </div>
                        </label>

                        <!-- File Name Display -->
                        <div class="mt-2">
                            <p class="text-sm text-gray-500" id="file-name"></p>
                        </div>
                    </div>

                    <!-- Title Input -->
                    <div class="space-y-2">
                        <label for="judul" class="block text-sm font-semibold text-gray-900">
                            Judul Foto <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="judul" 
                               id="judul" 
                               value="{{ old('judul', $foto->judul) }}"
                               class="block w-full rounded-lg border-2 border-gray-200 bg-white px-4 py-3.5 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 hover:border-gray-300"
                               required
                               placeholder="Masukkan judul foto">
                        <p class="mt-1 text-sm text-gray-500">Masukkan judul yang mendeskripsikan foto Anda</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 flex flex-col sm:flex-row gap-3 border-t border-gray-100">
                        <a href="{{ route('foto.index') }}" 
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

@push('scripts')
<script>
    // Preview file name when selected
    document.getElementById('file').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        document.getElementById('file-name').textContent = fileName ? `File terpilih: ${fileName}` : '';
    });
</script>
@endpush
