<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        try {
            // Cari petugas berdasarkan username
            $petugas = Petugas::where('username', $request->username)->first();

            // Cek apakah petugas ditemukan dan password cocok
            if ($petugas && Hash::check($request->password, $petugas->password)) {
                // Hapus token lama jika ada
                $petugas->tokens()->delete();
                
                // Buat token baru
                $token = $petugas->createToken('auth_token')->plainTextToken;

                // Login berhasil
                Auth::login($petugas);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Login berhasil',
                    'data' => [
                        'petugas' => $petugas,
                        'token' => $token,
                        'token_type' => 'Bearer'
                    ]
                ], 200);
            }

            // Login gagal
            return response()->json([
                'status' => 'error',
                'message' => 'Username atau password salah'
            ], 401);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat login: ' . $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            // Hapus token yang sedang digunakan
            $request->user()->currentAccessToken()->delete();
            
            // Logout dari session
            Auth::logout();

            return response()->json([
                'status' => 'success',
                'message' => 'Logout berhasil'
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat logout: ' . $e->getMessage()
            ], 500);
        }
    }
}