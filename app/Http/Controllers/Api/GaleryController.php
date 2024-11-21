<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\GaleryResource;

class GaleryController extends Controller
{
    public function index()
    {
        try {
            $galeries = Galery::with(['post' => function($query) {
                $query->select('id', 'judul', 'kategori_id', 'isi', 'petugas_id', 'status');
            }])->get();
            
            return response()->json([
                'status' => 'success',
                'data' => GaleryResource::collection($galeries)
            ]);
        } catch (\Exception $e) {
            \Log::error('Galery Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|in:draft,public,arsip',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('galery', 'public');

        $galery = Galery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
            'image_path' => $imagePath
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Galery item created successfully',
            'data' => $galery->load('post')
        ], 201);
    }

    public function show($id)
    {
        $galery = Galery::with('post')->find($id);
        
        if (!$galery) {
            return response()->json([
                'status' => 'error',
                'message' => 'Galery item not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $galery
        ]);
    }

    public function update(Request $request, $id)
    {
        $galery = Galery::find($id);

        if (!$galery) {
            return response()->json([
                'status' => 'error',
                'message' => 'Galery item not found'
            ], 404);
        }

        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|in:draft,public,arsip',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($galery->image_path) {
                Storage::disk('public')->delete($galery->image_path);
            }
            $imagePath = $request->file('image')->store('galery', 'public');
            $galery->image_path = $imagePath;
        }

        $galery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Galery item updated successfully',
            'data' => $galery->load('post')
        ]);
    }

    public function destroy($id)
    {
        $galery = Galery::find($id);

        if (!$galery) {
            return response()->json([
                'status' => 'error',
                'message' => 'Galery item not found'
            ], 404);
        }

        if ($galery->image_path) {
            Storage::disk('public')->delete($galery->image_path);
        }

        $galery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Galery item deleted successfully'
        ]);
    }
}
