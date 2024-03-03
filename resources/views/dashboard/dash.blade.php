@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('sub-title')
Dashboard
@endsection

@section('content')
<section class="row">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-8 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Pelanggan</h6>
                                @php
                                    $pelanggan = \App\Models\Produk::count();
                                @endphp
                                <h6 class="font-extrabold mb-0">{{ $pelanggan }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="fa-solid fa-user-group"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Petugas</h6>
                                @php
                                    $petugas = \App\Models\User::where('role', 'petugas')->count();
                                @endphp
                                <h6 class="font-extrabold mb-0">{{ $petugas }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Produk</h6>
                                @php
                                    $produkCount = \App\Models\Produk::count();
                                @endphp
                                <h6 class="font-extrabold mb-0">{{$produkCount}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="fa-solid fa-money-check"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Transaksi</h6>
                                @php
                                    $penjualanCount = \App\Models\Penjualan::count();
                                @endphp
                                <h6 class="font-extrabold mb-0">{{$penjualanCount}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="fa-solid fa-layer-group"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Kategori</h6>
                                @php
                                    $kategoriCount = \App\Models\kategori::count();
                                @endphp
                                <h6 class="font-extrabold mb-0">{{$kategoriCount}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

