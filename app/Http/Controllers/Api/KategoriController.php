<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'status' => 'success',
            'data' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255'
        ]);

        $kategori = Kategori::create([
            'judul' => $request->judul
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Kategori created successfully',
            'data' => $kategori
        ], 201);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        
        if (!$kategori) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kategori not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kategori not found'
            ], 404);
        }

        $request->validate([
            'judul' => 'required|string|max:255'
        ]);

        $kategori->update([
            'judul' => $request->judul
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Kategori updated successfully',
            'data' => $kategori
        ]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kategori not found'
            ], 404);
        }

        $kategori->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Kategori deleted successfully'
        ]);
    }
}
