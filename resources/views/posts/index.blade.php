@extends('layouts.dashboard')

@section('title', 'Daftar Posts')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span class="text-indigo-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </span>
                    Daftar Posts
                </h1>
                <p class="mt-2 text-sm text-gray-600">
                    Kelola semua post dalam sistem
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('posts.create') }}" 
                   class="inline-flex items-center px-4 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Post
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6">
                <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-4">
                    <div class="flex">
                        <svg class="h-5 w-5 text-emerald-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="w-16 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    ID
                                </th>
                                <th scope="col" class="w-48 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Judul
                                </th>
                                <th scope="col" class="w-40 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Kategori
                                </th>
                                <th scope="col" class="w-64 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Isi
                                </th>
                                <th scope="col" class="w-28 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="w-32 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Tanggal
                                </th>
                                <th scope="col" class="w-28 px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($posts->sortBy('created_at') as $index => $post)
                            <tr class="hover:bg-gray-50 transition-all duration-200">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    {{ $post->id }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    <div class="line-clamp-2">{{ $post->judul }}</div>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    {{ $post->kategori->judul ?? 'Tidak ada kategori' }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                    <div class="line-clamp-2">{{ $post->isi }}</div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $post->status === 'public' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    {{ $post->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('posts.edit', $post->id) }}" 
                                           class="p-1.5 bg-amber-500 text-white rounded-md hover:bg-amber-600 transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')"
                                                    class="p-1.5 bg-rose-600 text-white rounded-md hover:bg-rose-700 transition-all duration-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
