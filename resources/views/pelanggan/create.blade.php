@extends('layouts.master')

@section('title')
Tambah Pelanggan
@endsection


@section('content')
<section id="basic-layouts">
    <div class="row match-height justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">From Tambah Pelanggan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form" action="{{route('pelanggan.store')}}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="namapelanggan">Nama Pelanggan</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="text" id="namapelanggan" class="form-control" name="namapelanggan"
                                            placeholder="Masukan nama pelanggan">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="alamat">Alamat</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="alamat" id="alamat" class="form-control" name="alamat"
                                            placeholder="Masukan alamat">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="notelp">No Telp</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="number" id="notelp" class="form-control" name="notelp"
                                            placeholder="notelp">
                                    </div>
                                    <div class="col-sm-12 d-flex row">
                                        <div class="col-lg-6">
                                            <a href="{{ route('pelanggan.index') }}" class="mx-auto flex">
                                                <button type="button" class="btn btn-outline-secondary">Kembali</button>
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
