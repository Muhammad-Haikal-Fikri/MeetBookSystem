@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Staff</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Staff</h6>
        </div>
        <div class="card-body">
            <h5>Nama Lengkap : {{ $staff->name }}</h5>
            <h5>Posisi : {{ $staff->position }}</h5>

            <form action="" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Hapus</button>
                <a href="/dashboard/staffs/{{$staff->id}}/edit" class="btn btn-primary">Edit Data</a>
                <a href="/dashboard/staffs" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
