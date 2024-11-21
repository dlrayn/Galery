<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
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
                // Login berhasil
                Auth::login($petugas);
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }

            // Login gagal
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['username' => 'Username atau password salah']);

        } catch (\Exception $e) {
            return back()
                ->withInput($request->only('username'))
                ->with('error', 'Terjadi kesalahan saat login.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}