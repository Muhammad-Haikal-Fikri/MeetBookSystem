@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Ruangan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Ruangan</h6>
        </div>
        <div class="card-body">
            @if ($room->img)
                <img width="200px" class="rounded" src="{{ asset('storage/img/' . $room->img) }}" alt="">
                @if ($room->img2 !== null)
                    <img class="rounded" width="200px" src="{{ asset('storage/img/' . $room->img2) }}" alt="">
                @endif
                @if ($room->img3 !== null)
                    <img class="rounded" width="200px" src="{{ asset('storage/img/' . $room->img3) }}" alt="">
                @endif
            @else
                <img class="rounded" width="200px" src="{{ asset('images/nocontentyet.jpg') }}" alt="">
            @endif

            <h5 class="mt-3">Nama ruangan : {{ $room->name }}</h5>

            <form action="" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Hapus</button>
                <a href="/dashboard/rooms/{{ $room->id }}/edit" class="btn btn-primary">Edit Data</a>
                <a href="/dashboard/rooms" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
