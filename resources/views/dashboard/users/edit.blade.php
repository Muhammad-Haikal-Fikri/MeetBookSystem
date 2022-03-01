@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen User</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <form action="/dashboard/users/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="hidden" class="form-control" id="role" name="id" value="{{ $user->id }}">
                    <select id="role" class="form-control" name="role">
                        <option selected>Pilih...</option>
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif/Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
                <a href="/dashboard/users/{{ $user->id }}" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
