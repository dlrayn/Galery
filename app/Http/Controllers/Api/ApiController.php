<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Foto;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function getProfiles()
    {
        try {
            $profiles = Profile::all();
            return response()->json([
                'status' => 'success',
                'data' => $profiles
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch profiles',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getKategoris()
    {
        try {
            $kategoris = Kategori::all();
            return response()->json([
                'status' => 'success',
                'data' => $kategoris
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch kategoris',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPosts()
    {
        try {
            $posts = Post::with('kategori')->get();
            return response()->json([
                'status' => 'success',
                'data' => $posts
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch posts',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getGaleries()
    {
        try {
            $galeries = Galery::with('fotos')->get();
            return response()->json([
                'status' => 'success',
                'data' => $galeries
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch galleries',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getFotos()
    {
        try {
            $fotos = Foto::with('galery')->get();
            return response()->json([
                'status' => 'success',
                'data' => $fotos
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch photos',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getAllData()
    {
        try {
            $data = [
                'profiles' => Profile::all(),
                'kategoris' => Kategori::all(),
                'posts' => Post::with('kategori')->get(),
                'galeries' => Galery::with('fotos')->get(),
                'fotos' => Foto::with('galery')->get()
            ];

            return response()->json([
                'status' => 'success',
                'data' => $data
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch data',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
} 