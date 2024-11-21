@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-16 animate-gradient-bg">
    <!-- Header dengan animasi fade-in -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12"
         x-data="{ show: false }"
         x-init="setTimeout(() => show = true, 100)"
         x-show="show"
         x-transition:enter="transition ease-out duration-700"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500 animate-text-gradient mb-4">Program Keahlian</h1>
            <p class="text-lg text-gray-600 animate-fade-in">Temukan jurusan yang sesuai dengan minat dan bakatmu</p>
        </div>
    </div>

    <!-- Jurusan Grid dengan animasi yang sama -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8"
             x-data="{ show: false }"
             x-init="setTimeout(() => show = true, 300)">
            
            <!-- Cards tetap sama, hanya menambahkan classes untuk animasi -->
            @foreach(['PPLG', 'TFLM', 'TJKT', 'TKR'] as $index => $jurusan)
            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 transform hover:scale-105 hover:shadow-xl animate-card"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 transform translate-y-8"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:enter-delay="{{ ($index + 1) * 100 }}"
                 style="animation-delay: {{ $index * 150 }}ms">
                <!-- Content tetap sama -->
                <div class="aspect-w-16 aspect-h-9 overflow-hidden group">
                    <img src="{{ asset('assets/'.strtolower($jurusan).'.png') }}" 
                         alt="{{ $jurusan }}" 
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500 hover:animate-pulse">
                </div>
                <div class="p-6 relative overflow-hidden">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-indigo-600 transition-colors animate-slide-in">{{ $jurusan }}</h3>
                    <p class="text-gray-600 text-sm mb-4 animate-slide-in-delayed">
                        {{ $descriptions[$jurusan] ?? 'Deskripsi program keahlian' }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Tambahkan styles tanpa mengubah template -->
<style>
    /* Background gradient animation */
    @keyframes gradient-bg {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Text gradient animation */
    @keyframes text-gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Card hover animation */
    @keyframes card-float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Slide in animation */
    @keyframes slide-in {
        from { transform: translateX(-20px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    /* Apply animations */
    .animate-gradient-bg {
        background: linear-gradient(-45deg, #f3f4f6, #e5e7eb, #f3f4f6, #dbeafe);
        background-size: 400% 400%;
        animation: gradient-bg 15s ease infinite;
    }

    .animate-text-gradient {
        background-size: 200% auto;
        animation: text-gradient 4s linear infinite;
    }

    .animate-card:hover {
        animation: card-float 3s ease-in-out infinite;
    }

    .animate-slide-in {
        animation: slide-in 0.6s ease-out forwards;
    }

    .animate-slide-in-delayed {
        animation: slide-in 0.6s ease-out 0.2s forwards;
        opacity: 0;
    }

    /* Hover effects enhancement */
    .group:hover img {
        transform: scale(1.1) rotate(2deg);
    }

    .group:hover .animate-slide-in {
        color: #4f46e5;
        transform: translateX(5px);
    }

    /* Smooth transitions */
    * {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
</style>

@push('scripts')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
@endsection 