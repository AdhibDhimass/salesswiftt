<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::all();
        return view('petugas.index', ['petugas' => $petugas]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']); // Hash password

        // dd($data);
        User::create($data);

        return redirect('/petugas')->with('status', 'Petugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = User::findOrFail($id);
        return view('petugas.edit', ['petugas' => $petugas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::findOrFail($id);
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:8',
            'role' => 'required'
             // Hanya validasi jika password diisi
            // ... tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Periksa apakah password baru diisi
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $petugas->update($data);

        return redirect('/petugas')->with('status', 'Data petugas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect('/petugas')->with('status', 'Petugas berhasil dihapus');
    }
}
