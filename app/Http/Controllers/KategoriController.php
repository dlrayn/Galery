<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Display a listing of categories
    public function index()
    {
        $kategories = Kategori::all();
        return view('kategori.index', compact('kategories'));

        return response()->json(Kategori::all());
    }    

    // Show the form for creating a new category
    public function create()
    {
        return view('kategori.create');
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Show the form for editing an existing category
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    // Update the specified category in the database
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    // Delete the specified category from the database
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $posts = Post::where('kategori_id', $id)
                     ->with('petugas')
                     ->orderBy('created_at', 'desc')
                     ->paginate(9);
        $galeries = Galery::where('kategori_id', $id)
                          ->with('fotos')
                          ->get();

        return view('show', compact('kategori', 'posts', 'galeries'));
    }
}
