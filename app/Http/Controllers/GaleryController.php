<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    // Display a listing of the galery
    public function index()
    {
        $galeries = Galery::all();
        return view('galery.index', compact('galeries'));

        return response()->json(Galery::all());
    }

    // Show the form for creating a new galery
    public function create()
    {
        $posts = Post::all();
        $nextPosition = Galery::max('position') + 1;
        
        return view('galery.create', compact('posts', 'nextPosition'));
    }

    // Store a newly created galery in storage
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer|min:1',
            'status' => 'required|in:draft,public',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('galleries', 'public');

        // If inserting at an existing position, shift other items down
        if (Galery::where('position', '>=', $request->position)->exists()) {
            Galery::where('position', '>=', $request->position)
                  ->increment('position');
        }

        Galery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
            'image' => $imagePath
        ]);

        return redirect()->route('galery.index')
                        ->with('success', 'Galeri berhasil ditambahkan!');
    }

    // Show the form for editing the specified galery
    public function edit(Galery $galery)
    {
        // Ambil semua post untuk dropdown
        $posts = Post::all(['id', 'judul']);
        
        // Kirim data galery dan posts ke view
        return view('galery.edit', compact('galery', 'posts'));
    }

// Mengupdate galeri yang sudah ada
public function update(Request $request, Galery $galery)
{
    $request->validate([
        'post_id' => 'required|exists:posts,id',
        'position' => 'required|integer|min:1',
        'status' => 'required|in:draft,public',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $oldPosition = $galery->position;
    $newPosition = $request->position;

    // Handle position reordering
    if ($oldPosition != $newPosition) {
        if ($oldPosition < $newPosition) {
            Galery::whereBetween('position', [$oldPosition + 1, $newPosition])
                  ->decrement('position');
        } else {
            Galery::whereBetween('position', [$newPosition, $oldPosition - 1])
                  ->increment('position');
        }
    }

    // Handle image upload if new image is provided
    if ($request->hasFile('image')) {
        // Delete old image
        if ($galery->image) {
            Storage::disk('public')->delete($galery->image);
        }
        $imagePath = $request->file('image')->store('galleries', 'public');
        $galery->image = $imagePath;
    }

    $galery->update([
        'post_id' => $request->post_id,
        'position' => $newPosition,
        'status' => $request->status
    ]);

    return redirect()->route('galery.index')
                    ->with('success', 'Galeri berhasil diperbarui!');
}

    // Remove the specified galery from storage
    public function destroy(Galery $galery)
    {
        // Delete the image file
        if ($galery->image) {
            Storage::disk('public')->delete($galery->image);
        }

        // Reorder remaining items
        Galery::where('position', '>', $galery->position)
              ->decrement('position');

        $galery->delete();

        return redirect()->route('galery.index')
                        ->with('success', 'Galeri berhasil dihapus!');
    }
}
