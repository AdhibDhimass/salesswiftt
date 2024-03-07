@extends('layouts.master')

@section('title')
Produk
@endsection

@section('sub-title')
 Produk
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
                <h4>Tabel Produk</h4>
                <a href="{{route('produk.create')}}" class="btn btn-success "><i class="fa-solid fa-user-plus"></i></a>
             </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $produks)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $produks->namaproduk }}</td>
                                <td>{{ $produks->stok }}</td>
                                <td>{{ $produks->kategori->nama_kategori }}</td>
                                <td>Rp{{ number_format($produks->harga_jual, 0, ',', '.') }},-</td>
                                <td>Rp{{ number_format($produks->harga_jual, 0, ',', '.') }},-</td>
                                <td>
                                    <a href="{{ route('produk.edit', $produks->id) }}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                                    <form action="/produk/{{ $produks->id }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus petugas ini?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
