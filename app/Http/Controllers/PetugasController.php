<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    // Menampilkan daftar petugas
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));

        return response()->json(Petugas::all());
    }

    // Menampilkan form tambah petugas
    public function create()
    {
        return view('petugas.create');
    }

    // Menyimpan petugas baru dengan password yang di-hash
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:petugas,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            // Buat petugas baru dengan Hash::make
            $petugas = new Petugas();
            $petugas->username = $request->username;
            $petugas->password = Hash::make($request->password); // Gunakan Hash::make
            $petugas->save();

            return redirect()
                ->route('petugas.index')
                ->with('success', 'Petugas berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan petugas. ' . $e->getMessage());
        }
    }

    // Menampilkan form edit petugas
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:petugas,username,'.$id,
            'password' => 'nullable|string|min:6',
        ]);
    
        // Ambil data petugas yang akan diupdate
        $petugas = Petugas::findOrFail($id);
        
        // Update username
        $petugas->username = $request->username;
        
        // Update password jika diisi
        if ($request->filled('password')) {
            $petugas->password = Hash::make($request->password);
        }
        
        // Simpan perubahan
        $petugas->save();
        
        return redirect()
            ->route('petugas.index')
            ->with('success', 'Data petugas berhasil diperbarui');
    }

    // Menghapus petugas dari database
    public function destroy($id)
    {
        Petugas::findOrFail($id)->delete();

        // Mengatur ulang auto increment pada tabel petugas agar mengikuti ID terakhir
        $lastId = Petugas::max('id');
        $newAutoIncrement = $lastId ? $lastId + 1 : 1;
        DB::statement("ALTER TABLE petugas AUTO_INCREMENT = {$newAutoIncrement}");

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
