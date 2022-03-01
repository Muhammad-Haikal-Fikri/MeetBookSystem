@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <p class="h3 mb-0 text-gray-800">Hari ini tanggal: {{ date('d-M-Y') }}</p>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kalender Ruangan</h6>
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/locales-all.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css" />
        <div class="card-body">
            <div class="row">
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
            </div>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-md-3 card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Daftar Pengajuan</h5>
                <p class="card-text">Di Setujui : <u>{{ $approved }} </u><br>Belum disetujui :
                    <u>{{ $unapproved }}</u>
                </p>
                <a href="/dashboard/books" class="btn btn-warning">Ke Pengajuan</a>
            </div>
        </div>

        <div class="col-md-3 card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Daftar Ruangan</h5>
                <p class="card-text">Total Ruangan terdata: <u>{{ $roomsCount }}</u>.</p>
                <a href="/dashboard/rooms" class="btn btn-danger">Ke Daftar Ruangan</a>
            </div>
        </div>
    </div>
@endsection
