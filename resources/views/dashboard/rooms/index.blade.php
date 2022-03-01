@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Ruangan</h1>
        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Tambah Data Ruangan</button>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $room->name }}</td>
                                <td>
                                    @if ($room->img)
                                        <img width="200px" class="rounded"
                                            src="{{ asset('storage/img/' . $room->img) }}" alt="">
                                        @if ($room->img2 !== null)
                                            <img class="rounded" width="200px"
                                                src="{{ asset('storage/img/' . $room->img2) }}" alt="">
                                        @endif
                                        @if ($room->img3 !== null)
                                            <img class="rounded" width="200px"
                                                src="{{ asset('storage/img/' . $room->img3) }}" alt="">
                                        @endif
                                    @else
                                        <img class="rounded" width="200px"
                                            src="{{ asset('images/nocontentyet.jpg') }}" alt="">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="/dashboard/rooms/{{ $room->id }}" class="badge badge-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/rooms" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Ruangan</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="file_upload">Gambar 1</label>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
