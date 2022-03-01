@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Ruangan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Ruangan</h6>
        </div>
        <div class="card-body">
            <form action="/dashboard/rooms/{{ $room->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Lengkap Ruangan</label>
                    <input type="hidden" class="form-control" id="name" name="id" value="{{ $room->id }}">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}">
                </div>

                <div class="form-group">
                    <label for="file_upload">Upload File</label>
                    <input type="file" class="form-control-file" id="file" name="img">
                </div>
                <div class="form-group">
                    <label for="file_upload">Gambar 2</label>
                    <input type="file" class="form-control-file" id="file" name="img2">
                </div>
                <div class="form-group">
                    <label for="file_upload">Gambar 3</label>
                    <input type="file" class="form-control-file" id="file" name="img3">
                </div>

                <div class="from-group mb-3">
                    @if ($room->img)
                        <img width="200px" class="rounded" src="{{ asset('storage/img/' . $room->img) }}" alt="">
                        @if ($room->img2 !== null)
                            <img class="rounded" width="200px" src="{{ asset('storage/img/' . $room->img2) }}"
                                alt="">
                        @endif
                        @if ($room->img3 !== null)
                            <img class="rounded" width="200px" src="{{ asset('storage/img/' . $room->img3) }}"
                                alt="">
                        @endif
                    @else
                        <img class="rounded" width="200px" src="{{ asset('images/nocontentyet.jpg') }}" alt="">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
                <a href="/dashboard/rooms/{{ $room->id }}" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
