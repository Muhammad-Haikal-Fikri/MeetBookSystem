@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Staff</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Staff</h6>
        </div>
        <div class="card-body">
            <form action="/dashboard/staffs/{{ $staff->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Lengkap Staff</label>
                    <input type="hidden" class="form-control" id="name" name="id" value="{{ $staff->id }}">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}">
                </div>
                <div class="form-group">
                    <label for="position">Jabatan Staff</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ $staff->position }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
                <a href="/dashboard/staffs/{{ $staff->id }}" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
