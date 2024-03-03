@extends('layouts.master')

@section('title')
Petugas
@endsection

@section('sub-title')
 Petugas
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
                <h4>Tabel Petugas</h4>
                <a href="{{route('petugas.create')}}" class="btn btn-success "><i class="fa-solid fa-user-plus"></i></a>
             </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $petugass)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $petugass->username }}</td>
                                <td>{{ $petugass->email }}</td>
                                <td>{{ $petugass->role }}</td>
                                <td>
                                    <a href="{{route('petugas.edit', $petugass->id)}}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                                    <form action="/petugas/{{ $petugass->id }}" method="POST" style="display: inline-block">
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
