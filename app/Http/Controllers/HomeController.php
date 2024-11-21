<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Foto;

class HomeController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $kategoris = Kategori::all();
        $posts = Post::all();
        $galeries = Galery::all();
        $fotos = Foto::all();

        return view('welcome', compact('profiles', 'kategoris', 'posts', 'galeries', 'fotos'));
    }
}
