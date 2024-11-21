<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::with('galery')->get();
        return response()->json([
            'status' => 'success',
            'data' => $fotos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'judul' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        $filePath = $request->file('file')->store('fotos', 'public');

        $foto = Foto::create([
            'galery_id' => $request->galery_id,
            'judul' => $request->judul,
            'file' => $filePath
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Foto created successfully',
            'data' => $foto->load('galery')
        ], 201);
    }

    public function show($id)
    {
        $foto = Foto::with('galery')->find($id);
        
        if (!$foto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Foto not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $foto
        ]);
    }

    public function update(Request $request, $id)
    {
        $foto = Foto::find($id);

        if (!$foto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Foto not found'
            ], 404);
        }

        $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'judul' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload if new file is provided
        if ($request->hasFile('file')) {
            // Delete old file
            if ($foto->file) {
                Storage::disk('public')->delete($foto->file);
            }
            $filePath = $request->file('file')->store('fotos', 'public');
            $foto->file = $filePath;
        }

        $foto->update([
            'galery_id' => $request->galery_id,
            'judul' => $request->judul
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Foto updated successfully',
            'data' => $foto->load('galery')
        ]);
    }

    public function destroy($id)
    {
        $foto = Foto::find($id);

        if (!$foto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Foto not found'
            ], 404);
        }

        // Delete file from storage
        if ($foto->file) {
            Storage::disk('public')->delete($foto->file);
        }

        $foto->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Foto deleted successfully'
        ]);
    }
}
