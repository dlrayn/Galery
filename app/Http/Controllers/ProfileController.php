<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Profile $profile)
    {
        return view('profile.show', compact('profile')); // Halaman detail
    }

    public function index()
    {
        $profile = Profile::all();
        return view('profile.index', compact('profile'));

        return response()->json(Profile::all());
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Profile::create($request->only(['judul', 'isi'])); 
        return redirect()->route('profile.index')->with('success', 'Profile berhasil ditambahkan.');
    }

    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }     

public function update(Request $request, Profile $profile)
{
    // Validate the input
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
    ]);

    // Update the profile with the validated data
    $profile->update([
        'judul' => $request->input('judul'),
        'isi' => $request->input('isi'),
    ]);

    // Redirect to the profile index with a success message
    return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
}

    public function destroy(Profile $profile)
    {
        $profile->delete(); // Menghapus data
        
        // Reset AUTO_INCREMENT jika tabel kosong
        if (Profile::count() === 0) {
            \DB::statement('ALTER TABLE profile AUTO_INCREMENT = 1');
        }

        // Langsung mengarahkan ke halaman index setelah penghapusan
        return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus.');
    }
}
