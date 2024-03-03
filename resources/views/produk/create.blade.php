@extends('layouts.master')

@section('title')
Produk
@endsection

@section('sub-title')
Tambah Produk
@endsection


@section('content')
<section id="basic-layouts">
    <div class="row match-height justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">From Tambah Produk</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form" action="{{ route('produk.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="namaproduk">Nama Produk</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="text" id="namaproduk" class="form-control" name="namaproduk" placeholder="Masukkan Nama Produk">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="stok">Stok</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="number" id="stok" class="form-control" name="stok" placeholder="Masukkan Jumlah Barang">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_beli">Harga Beli</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="double" id="harga_beli" class="form-control" name="harga_beli" placeholder="Masukkan Harga" step="0.01">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_jual">Harga Jual</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="double" id="harga_jual" class="form-control" name="harga_jual" placeholder="Masukkan Harga" step="0.01">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_jual">Kategori</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <select class="form-select" name="id_kategori" id="id_kategori" required>
                                            <option value="" selected>Pilih Kategori...</option>
                                            @foreach($kategori as $kategories)
                                                <option value="{{ $kategories->id }}">{{ $kategories->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 d-flex row">
                                        <div class="col-lg-6">
                                            <a href="{{ route('produk.index') }}" onclick="history.back()" class="mx-auto flex">
                                                <button type="submit" class="btn btn-outline-secondary">Kembali</button>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 mx-auto d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
