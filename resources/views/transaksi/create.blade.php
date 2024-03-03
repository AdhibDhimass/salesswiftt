@extends('layouts.master')

@section('title')
Transaksi
@endsection

@section('sub-title')
Transaksi
@endsection


@section('content')
<section id="basic-layouts">
    <div class="row match-height justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">From Transaksi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form" action="{{ route('penjualan.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="namaproduk">Nama Produk</label>
                                    </div>
                                    <div class="col-8 form-group">
                                        <select class="form-select" name="id_pelanggan" id="id_pelanggan" required>
                                            <option value="" selected>Pilih Produk...</option>
                                            @foreach($produk as $produks)
                                                <option value="{{ $produks->id }}">{{ $produks->namaproduk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="jumlah">Jumlah</label>
                                    </div>
                                    <div class="col-8 form-group">
                                        <input type="number" id="jumlah" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Barang">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="harga_jual">pelanggan</label>
                                    </div>
                                    <div class="col-8 form-group">
                                        <select class="form-select" name="id_pelanggan" id="id_pelanggan" required>
                                            <option value="" selected>Pilih pelanggan...</option>
                                            @foreach($pelanggan as $pelanggans)
                                                <option value="{{ $pelanggans->id }}">{{ $pelanggans->namapelanggan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 d-flex row">
                                        <div class="col-lg-6">
                                            <a href="{{ route('penjualan.index') }}" onclick="history.back()" class="mx-auto flex">
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
