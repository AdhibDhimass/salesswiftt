@extends('layouts.master')

@section('title')
Petugas
@endsection

@section('sub-title')
Edit Petugas
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Form Edit Petugas</div>
            <div class="card-body">
                <form action="/petugas/{{ $petugas->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="{{ $petugas->username }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" disabled value="{{ $petugas->email }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="input-group ">
                        <label for="password">Role</label>
                    </div>
                    <div class="form-group">
                        <select class="form-select" name="role" id="role">
                            <option value="admin" {{ old('role', $petugas->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ old('role', $petugas->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                        </select>
                    </div>
                    <div class="col-sm-12 d-flex row">
                        <div class="col-lg-6">
                            <a href="{{ route('petugas.index') }}" class="mx-auto flex">
                                <button type="button" class="btn btn-outline-secondary">Kembali</button>
                            </a>
                        </div>
                        <div class="col-lg-6 mx-auto d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
