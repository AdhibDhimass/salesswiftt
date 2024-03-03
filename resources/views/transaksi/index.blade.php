@extends('layouts.master')

@section('title')
Transaksi
@endsection

@section('sub-title')
 Transaksi
@endsection

@section('content')
<div id="notification-container">
    @if (Session::has('status'))
    <div class="alert alert-success mt-2" id="notification">
        {{ Session::get('status') }}
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
        }, 3000); // Notifikasi akan menghilang setelah 3 detik
    </script>
    @endif
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Transaksi</h4>
                <a href="{{route('penjualan.create')}}" class="btn btn-success "><i class="fa-solid fa-user-plus"></i></a>
             </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Penjualan</th>
                                <th>Total Harga</th>
                                <th>Pelanggan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $penjualans)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $penjualans->namapenjualan }}</td>
                                <td>{{ $penjualans->stok }}</td>
                                <td>{{ $penjualans->pelanggan->namapelanggan }}</td>
                                <td>Rp.{{ $penjualans->harga_beli }}</td>
                                <td>Rp.{{ $penjualans->harga_jual }}</td>
                                <td>
                                    <a href="{{ route('penjualan.edit', $penjualans->id) }}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                                    <form action="/penjualan/{{ $penjualans->id }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus petugas ini?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>
                                    <td></td>
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
