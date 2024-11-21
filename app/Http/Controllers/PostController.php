<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['kategori', 'petugas'])
            ->latest()
            ->get();
        return view('posts.index', compact('posts'));
    }
    
    public function create()
    {
        $kategoris = Kategori::all();
        $petugas = Petugas::all();
    
        return view('posts.create', compact('kategoris', 'petugas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'isi' => 'required',
            'status' => 'required|in:draft,public'
        ]);

        // Pastikan user sudah login sebelum mengakses id
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        Post::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'petugas_id' => auth()->id(), // Gunakan auth()->id() sebagai alternatif
            'status' => $request->status
        ]);

        return redirect()->route('posts.index')
                        ->with('success', 'Post berhasil ditambahkan!');
    }

    public function show(Post $post)
    {
        $post->load(['kategori', 'petugas']);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $kategoris = Kategori::all();
        $petugas = Petugas::all();
        return view('posts.edit', compact('post', 'kategoris', 'petugas'));
    }

    public function update(Request $request, Post $post)
    {
        // Debug untuk melihat data yang diterima
        \Log::info('Update request data:', $request->all());
        
        try {
            // Validasi input
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'kategori_id' => 'required|integer',
                'isi' => 'required|string',
                'status' => 'required|in:draft,published'
            ]);

            // Update menggunakan metode update()
            $post->update([
                'judul' => $validated['judul'],
                'kategori_id' => $validated['kategori_id'],
                'isi' => $validated['isi'],
                'status' => $validated['status']
            ]);

            // Debug untuk konfirmasi update berhasil
            \Log::info('Post updated successfully:', $post->toArray());

            return redirect()
                ->route('posts.index')
                ->with('success', 'Post berhasil diperbarui!');
            
        } catch (\Exception $e) {
            // Log error lengkap
            \Log::error('Error updating post: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy(Post $post)
    {
        // Hapus foto jika ada
        if ($post->foto) {
            Storage::delete('public/posts/' . $post->foto);
        }

        $post->delete();
        
        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dihapus');
    }
}
