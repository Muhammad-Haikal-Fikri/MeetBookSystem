@extends('layouts.public')

@section('content')

    <style>
        .show {

            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='250' preserveAspectRatio='none' viewBox='0 0 1440 250'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1000%26quot%3b)' fill='none'%3e%3crect width='1440' height='250' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M16 250L266 0L471.5 0L221.5 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M284.6 250L534.6 0L621.6 0L371.6 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M493.20000000000005 250L743.2 0L810.7 0L560.7 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M741.8000000000001 250L991.8000000000001 0L1311.3000000000002 0L1061.3000000000002 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M1427 250L1177 0L1136.5 0L1386.5 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M1195.4 250L945.4000000000001 0L819.4000000000001 0L1069.4 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M949.8 250L699.8 0L431.29999999999995 0L681.3 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M707.1999999999999 250L457.19999999999993 0L148.19999999999993 0L398.19999999999993 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M1223.3729678036805 250L1440 33.37296780368038L1440 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M0 250L216.62703219631962 250L 0 33.37296780368038z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1000'%3e%3crect width='1440' height='250' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='0%25' y1='100%25' x2='100%25' y2='0%25' id='SvgjsLinearGradient1001'%3e%3cstop stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3clinearGradient x1='100%25' y1='100%25' x2='0%25' y2='0%25' id='SvgjsLinearGradient1002'%3e%3cstop stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e");
            background-repeat: repeat-y;
            background-size: cover;
            background-attachment: fixed;
        }

    </style>

    <div class="show pt-5">
        <!-- Page Heading -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4 p-3 text-white">
                    <div class="align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-white">Detail Pengajuan R. Rapat {{ $book->topic }}</h1>
                    </div>
                    <div class="form-group mt-3">
                        @if ($book->approved == 1)
                            <p class="bg-success text-white p-3">Di Setujui</p>
                        @elseif ($book->approved == 2)
                            <p class="bg-dark text-white p-3">Di Tolak karena: {{ $book->reject_note }}</p>
                        @else
                            <p class="bg-danger text-white p-3">Belum Di Setujui</p>
                        @endif
                    </div>
                    <div class="from-group">
                        <h3>Pengaju</h3>
                    </div>
                    <div class="form-group">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $book->username }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="staff_nip">Nomor Induk Pegawai</label>
                        <input type="text" class="form-control" id="staff_nip" name="staff_nip"
                            value="{{ $book->staff_nip }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="installation">Instalasi</label>
                        <input type="text" class="form-control" id="installation" name="installation"
                            value="{{ $book->installation }}" disabled>
                    </div>
                    <div class="from-group mt-3">
                        <h3>Pengajuan Ruangan</h3>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-4">
                            <label for="datetimepicker">Mulai Pada Tanggal</label>
                            <input value="{{ $book->date_start }}" type="text"
                                class="@error('date_start') is-invalid
                @enderror form-control datetimepicker"
                                name="date_start" disabled>
                            @error('date_start')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="timepicker_start">Mulai Pada Jam</label>
                            <input id="timepicker_start" value="{{ $book->time_start }}" type="text"
                                class="@error('time_start') is-invalid
                @enderror form-control timepicker"
                                name="time_start" disabled>
                            @error('time_start')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="timepicker_finish">Selesai Pada Jam</label>
                            <input id="timepicker_finish" value="{{ $book->time_finish }}" type="text"
                                class="@error('time_finish') is-invalid
                @enderror form-control timepicker"
                                name="time_finish" disabled>
                            @error('time_finish')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="topic">Topik Rapat</label>
                        <input type="text" class="form-control" id="topic" placeholder="Contoh. Kegiatan Meeting Harian"
                            name="topic" value="{{ $book->topic }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="entrant">Jumlah Peserta</label>
                        <input type="text" class="form-control" id="entrant" name="entrant"
                            value="{{ $book->entrant }}" disabled>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type_meeting">Jenis Rapat</label>
                            <input type="text" class="form-control" id="type_meeting" name="type_meeting"
                                value="{{ $book->type_meeting }}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="room_id">Ruangan</label>
                            <input type="text" class="form-control" id="room_id" name="room_id"
                                value="{{ $book->room->name ?? 'Ruangan Terhapus' }}" disabled>
                        </div>
                    </div>
                    </form>
                    <a href="/dashboard" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>

@endsection
