<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Galery;
use App\Models\Foto;

class DashboardController extends Controller
{
    public function index()
    {
        
        // Ambil semua data yang diperlukan
        $posts = Post::count();
        $petugas = Petugas::count();
        $kategoris = Kategori::count();
        $galery = Galery::count();
        $foto = Foto::count();

        return view('dashboard.index', compact('posts', 'petugas', 'kategoris', 'galery', 'foto'));
    }
}
