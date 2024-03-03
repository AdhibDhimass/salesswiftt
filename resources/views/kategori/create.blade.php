@extends('layouts.master')

@section('title')
 Kategori
@endsection

@section('sub-title')
Tambah Kategori
@endsection


@section('content')
<section id="basic-layouts">
    <div class="row match-height justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">From Tambah Kategori</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form" action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nama_kategori">Nama Kategori</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="text" id="nama_kategori" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori">
                                    </div>
                                    <div class="col-sm-12 d-flex row">
                                        <div class="col-lg-6">
                                            <a href="{{ route('kategori.index') }}" class="mx-auto flex">
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
