@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Pengajuan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengesahan Pengajuan</h6>
        </div>
        <div class="card-body">
            <form action="/dashboard/books/{{ $book->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Disetujui?</label>
                    <input type="hidden" class="form-control" id="name" name="id" value="{{ $book->id }}">
                    <select id="approved" class="form-control" name="approved">
                        <option selected>Pilih...</option>
                        <option value="1">Disetujui</option>
                        <option value="0">Tidak disetujui</option>
                        <option value="2">Ditolak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Informasi Penolakan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="reject_note">
                    <small class="text-danger">*) Isi jika ditolak</small>
                </div>

                <button type="submit" class="btn btn-primary">Edit Data</button>
                <a href="/dashboard/books/{{ $book->id }}" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
