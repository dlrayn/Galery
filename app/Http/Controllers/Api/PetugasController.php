<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return response()->json([
            'status' => 'success',
            'data' => $petugas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:petugas',
            'password' => 'required|min:6'
        ]);

        $petugas = Petugas::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Petugas created successfully',
            'data' => $petugas
        ], 201);
    }

    public function show($id)
    {
        $petugas = Petugas::find($id);
        
        if (!$petugas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Petugas not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $petugas
        ]);
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::find($id);

        if (!$petugas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Petugas not found'
            ], 404);
        }

        $request->validate([
            'username' => 'required|unique:petugas,username,'.$id,
            'password' => 'nullable|min:6'
        ]);

        $petugas->username = $request->username;
        if ($request->password) {
            $petugas->password = Hash::make($request->password);
        }
        $petugas->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Petugas updated successfully',
            'data' => $petugas
        ]);
    }

    public function destroy($id)
    {
        $petugas = Petugas::find($id);

        if (!$petugas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Petugas not found'
            ], 404);
        }

        $petugas->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Petugas deleted successfully'
        ]);
    }
}
