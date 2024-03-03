<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\kategori;
use Illuminate\Support\Facades\Hash;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'namaproduk' => 'required',
            'stok' => 'required|integer',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'id_kategori' => 'required',
        ]);

        Produk::create($data);

        return redirect('/produk')->with('status', 'Produk berhasil ditambahkan');
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
    public function edit(Produk $produk)
    {
        $kategori = kategori::all();
        $produk = Produk::all();
        return view('produk.edit', compact('produk','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'namaproduk' => 'required',
            'stok' => 'required|integer',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'id_kategori' => 'required',

        ]);

        $produk->update($data);
        return redirect()->route('produk.index')->with('status', 'Data produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect('/produk')->with('status', 'produk berhasil dihapus');
    }
}
