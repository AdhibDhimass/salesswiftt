<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', ['pelanggan' => $pelanggan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'namapelanggan' => 'required',
            'alamat' => 'required',
            'notelp' => 'required|numeric',
        ]);

        Pelanggan::create($data);

        return redirect('/pelanggan')->with('status', 'Pelanggan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $pelanggan = Pelanggan::findOrFail($id);
        // return view('pelanggan.edit', ['pelanggan' => $pelanggan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $pelanggan = Pelanggan::findOrFail($id);
        // $data = $request->validate([
        //     'namapelanggan' => 'required',
        //     'alamat' => 'required',
        //     'notelp' => 'required|numeric',
        // ]);

        // $pelanggan->update($data);

        // return redirect('/pelanggan')->with('status', 'Data pelanggan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect('/pelanggan')->with('status', 'pelanggan berhasil dihapus');
    }
}
