<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\produk;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        $pelanggan = Pelanggan::all();
        return view('penjualan.index',compact('penjualan','pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        $pelanggan = Pelanggan::all();
        return view('transaksi.create',compact('produk','pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function getprodukDetails($id)
    {
        $produk = Produk::find($id);
        return response()->json($produk);
    }

    public function store(Request $request)
    {
        $kasir = Auth::user()->name;
        $validate = $request->validate([
            'pelangganid' => 'required|exists:pelangga$pelanggan,id',
            'totalharga' => 'required|numeric',
            'pembayaran' => 'required|numeric',
        ]);

        $penjualan = new Penjualan();
        $penjualan->kasir = $kasir;
        $penjualan->totalharga = $request->total_pesanan;
        $penjualan->pelangganid = $request->pelangganid;
        $penjualan->pembayaran = $request->pembayaran;
        $penjualan->nota = mt_rand(1000000000000000, 9999999999999999);

        $penjualan->save();

        return redirect()->route('transaksi.index')->with('success','penjualan berhasil');
    }


    /**
     * Display the specified resource.
     */
    public function show(penjualan $penjualan)
    {
        // $produk = Produk::all();
        // $pelanggan = Pelanggan::all();
        // return view ('transaksi.show',compact('produk','pelangga$pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penjualan $penjualan)
    {
        //
    }
}
