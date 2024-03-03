@extends('layouts.master')

@section('title')
Produk
@endsection

@section('sub-title')
Edit Produk
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Form Edit Produk</div>
            <div class="card-body">
                @foreach($produk as $p)
                <form action="{{ route('produk.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="namaproduk">Nama Produk</label>
                        <input type="text" name="namaproduk" id="namaproduk" value="{{ $p->namaproduk }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="stok" name="stok" id="stok"  value="{{ $p->stok }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="harga_beli">Harga Beli</label>
                    </div>
                    <div class="col-12 form-group">
                        <input type="double" id="harga_beli" class="form-control" name="harga_beli" value="{{ $p->harga_beli }}" step="0.01">
                    </div>
                    <div class="col-md-4">
                        <label for="harga_jual">Harga Jual</label>
                    </div>
                    <div class="col-12 form-group">
                        <input type="double" id="harga_jual" class="form-control" name="harga_jual" value="{{ $p->harga_jual }}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select class="form-select" name="id_kategori" id="id_kategori" required>
                            <option value="" selected>Pilih Kategori...</option>
                            @foreach($kategori as $kategories)
                                <option value="{{ $kategories->id }}" {{ $p->id_kategori == $kategories->id ? 'selected' : '' }}>{{ $kategories->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </form>
            @endforeach

            </div>
        </div>
    </div>
</div>

<div class="text-start">
    <a href="{{ route('produk.index') }}" class="mx-auto flex">
        <button type="submit" class="btn btn-outline-secondary">Kembali</button>
    </a>
</div>
@endsection
