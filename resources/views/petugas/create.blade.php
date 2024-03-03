@extends('layouts.master')

@section('title')
 Petugas
@endsection

@section('sub-title')
Tambah Petugas
@endsection


@section('content')
<section id="basic-layouts">
    <div class="row match-height justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">From Tambah Petugas</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form" action="{{route('petugas.store')}}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first-name">Username</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="text" id="first-name" class="form-control" name="username"
                                            placeholder="Masukan Username">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="Masukan Email">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="role">Role</label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <select class="form-select" name="role" id="role">
                                            <option value="" selected>Pilih role...</option>
                                            <option value="admin">Admin</option>
                                            <option value="petugas">Petugas</option>
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
