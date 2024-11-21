<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::orderBy('id', 'asc')->get();
        return view('foto.index', compact('fotos'));
    }

    public function create()
    {
        $galeries = Galery::all();
        return view('foto.create', compact('galeries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'galery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required'
        ]);

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                $path = $file->storeAs('fotos', $filename, 'public');

                Foto::create([
                    'galery_id' => $request->galery_id,
                    'file' => $path,
                    'judul' => $request->judul
                ]);

                return redirect()
                    ->route('foto.index')
                    ->with('success', 'Foto berhasil ditambahkan!');
            }

            return back()->with('error', 'File tidak ditemukan!');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Foto $foto)
    {
        $galeries = Galery::all();
        return view('foto.edit', compact('foto', 'galeries'));
    }

    public function update(Request $request, Foto $foto)
    {
        $request->validate([
            'galery_id' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required'
        ]);

        try {
            $data = [
                'galery_id' => $request->galery_id,
                'judul' => $request->judul
            ];

            if ($request->hasFile('file')) {
                if ($foto->file && Storage::disk('public')->exists($foto->file)) {
                    Storage::disk('public')->delete($foto->file);
                }

                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('fotos', $filename, 'public');
                $data['file'] = $path;
            }

            $foto->update($data);

            return redirect()
                ->route('foto.index')
                ->with('success', 'Foto berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Foto $foto)
    {
        try {
            if ($foto->file && Storage::disk('public')->exists($foto->file)) {
                Storage::disk('public')->delete($foto->file);
            }

            $foto->delete();

            return redirect()
                ->route('foto.index')
                ->with('success', 'Foto berhasil dihapus!');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
