@extends('layouts.public')

@section('content')

    <style>
        .create {

            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='250' preserveAspectRatio='none' viewBox='0 0 1440 250'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1000%26quot%3b)' fill='none'%3e%3crect width='1440' height='250' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M16 250L266 0L471.5 0L221.5 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M284.6 250L534.6 0L621.6 0L371.6 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M493.20000000000005 250L743.2 0L810.7 0L560.7 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M741.8000000000001 250L991.8000000000001 0L1311.3000000000002 0L1061.3000000000002 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M1427 250L1177 0L1136.5 0L1386.5 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M1195.4 250L945.4000000000001 0L819.4000000000001 0L1069.4 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M949.8 250L699.8 0L431.29999999999995 0L681.3 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M707.1999999999999 250L457.19999999999993 0L148.19999999999993 0L398.19999999999993 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M1223.3729678036805 250L1440 33.37296780368038L1440 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M0 250L216.62703219631962 250L 0 33.37296780368038z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1000'%3e%3crect width='1440' height='250' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='0%25' y1='100%25' x2='100%25' y2='0%25' id='SvgjsLinearGradient1001'%3e%3cstop stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3clinearGradient x1='100%25' y1='100%25' x2='0%25' y2='0%25' id='SvgjsLinearGradient1002'%3e%3cstop stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e");
            background-repeat: repeat-y;
            background-size: cover;
            background-attachment: fixed;
        }

    </style>

    <div class="create pt-5">
        <div class="container-xl">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('status-error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status-error') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <!-- Page Heading -->
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-0 text-white">Form Pengajuan Ruang {{ $room->name }}</h1>
                    </div>
                    <div class="card shadow mb-2 p-3">
                        <div class="row">
                            <div class="col-md-3 p-3">
                                <h4 class="text-center">Gambar Ruangan</h4>
                                @if ($room->img === null && !file_exists(public_path() . 'storage/img/' . $room->img))
                                    <img data-toggle="modal" data-target="#exampleModal" class="rounded" width="100%"
                                        src="{{ asset('images/nocontentyet.jpg') }}">
                                @else
                                    <div class="row">
                                        <div class="col-md-12 p-1">
                                            <img data-toggle="modal" data-target="#exampleModal" class="rounded"
                                                width="100%" src="{{ asset('storage/img/' . $room->img) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if ($room->img2 !== null)
                                            <div class="col-md-6 p-1">
                                                <img data-toggle="modal" data-target="#exampleModal" class="rounded"
                                                    width="100%" src="{{ asset('storage/img/' . $room->img2) }}" alt="">
                                            </div>
                                        @endif
                                        @if ($room->img3 !== null)
                                            <div class="col-md-6 p-1">
                                                <img data-toggle="modal" data-target="#exampleModal" class="rounded"
                                                    width="100%" src="{{ asset('storage/img/' . $room->img3) }}" alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div id="carouselExampleIndicators" class="carousel slide"
                                                        data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                                class="active"></li>
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                                            </li>
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="2">
                                                            </li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('storage/img/' . $room->img) }}"
                                                                    class="rounded d-block w-100" alt="...">
                                                            </div>
                                                            @if ($room->img2 !== null)
                                                                <div class="carousel-item">
                                                                    <img src="{{ asset('storage/img/' . $room->img2) }}"
                                                                        class="rounded d-block w-100" alt="...">
                                                                </div>
                                                            @endif

                                                            @if ($room->img3 !== null)
                                                                <div class="carousel-item">
                                                                    <img src="{{ asset('storage/img/' . $room->img3) }}"
                                                                        class="rounded d-block w-100" alt="...">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                            role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                            role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-9 p-3">
                                <form action="/books" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs" id="menu-list" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#data-diri" role="tab"
                                                    aria-controls="data-diri" aria-selected="true">Data Diri</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#pengajuan" role="tab"
                                                    aria-controls="pengajuan" aria-selected="false">Pengajuan</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content mt-3">
                                            <div class="tab-pane active" id="data-diri" role="tabpanel">
                                                <div class="from-group mt-3">
                                                    <h3>Data Diri</h3>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Nama Lengkap</label>
                                                    <input value="{{ old('username') }}" type="text"
                                                        class="@error('username') is-invalid
                                            @enderror form-control"
                                                        id="username" name="username">
                                                    @error('username')
                                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="staff_nip">Nomor Induk Pegawai</label>
                                                    <input value="{{ old('staff_nip') }}" type="text"
                                                        class="@error('staff_nip') is-invalid
                                            @enderror form-control"
                                                        id="staff_nip" name="staff_nip">
                                                    @error('staff_nip')
                                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="installation">Instalasi</label>
                                                    <input value="{{ old('installation') }}" type="text"
                                                        class="@error('installation') is-invalid
                                            @enderror form-control"
                                                        id="installation" name="installation">
                                                    @error('installation')
                                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="pengajuan" role="tabpanel"
                                                aria-labelledby="history-tab">
                                                <div class="from-group mt-3">
                                                    <h3>Pengajuan Ruangan</h3>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="datepicker_start">Mulai Pada Tanggal</label>
                                                        <input id="datepicker_start" value="{{ old('date_start') }}"
                                                            type="text"
                                                            class="@error('date_start') is-invalid
                                                @enderror form-control"
                                                            name="date_start">
                                                        @error('date_start')
                                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="timepicker_start">Mulai Pada Jam</label>
                                                        <input id="timepicker_start" value="{{ old('time_start') }}"
                                                            type="text"
                                                            class="@error('time_start') is-invalid
                                                @enderror form-control timepicker"
                                                            name="time_start">
                                                        @error('time_start')
                                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="timepicker_finish">Selesai Pada Jam</label>
                                                        <input id="timepicker_finish" value="{{ old('time_finish') }}"
                                                            type="text"
                                                            class="@error('time_finish') is-invalid
                                                @enderror form-control timepicker"
                                                            name="time_finish">
                                                        @error('time_finish')
                                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="topic">Topik Rapat</label>
                                                    <input value="{{ old('topic') }}" type="text"
                                                        class="@error('topic') is-invalid
                                            @enderror form-control"
                                                        id="topic" placeholder="Contoh. Kegiatan Meeting Harian"
                                                        name="topic">
                                                    @error('topic')
                                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="entrant">Jumlah Peserta</label>
                                                        <input value="{{ old('entrant') }}" type="number"
                                                            class="@error('entrant') is-invalid
                                            @enderror form-control"
                                                            id="entrant" name="entrant">
                                                        @error('entrant')
                                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="type_meeting">Jenis Rapat</label>
                                                        <select id="type_meeting"
                                                            class="@error('type_meeting') is-invalid
                                                @enderror form-control"
                                                            name="type_meeting">
                                                            <option selected>Pilih...</option>
                                                            <option value="Internal">Internal</option>
                                                            <option value="Eksternal">Eksternal</option>
                                                        </select>
                                                        @error('type_meeting')
                                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="room_id">Ruangan</label>
                                                        <input value="{{ $room->name }}" type="text"
                                                            class="form-control" id="room_id" name="room_id" disabled>
                                                        <input value="{{ $room->id }}" type="hidden"
                                                            class="form-control" id="room_id" name="room_id">
                                                        @error('room_id')
                                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="/" class="btn btn-secondary">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Ajukan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-sm my-5">
            <hr class="separator separator--dots-white" />
        </div>
        <div class="text-center mb-4">
            <h1 class="h3 mb-0 text-white mt-3">Daftar Pengajuan Ruang {{ $room->name }}</h1>
        </div>
        <div class="container pb-5">
            <div class="card shadow mb-4 p-3">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Topik</th>
                            <th scope="col">Jenis Rapat</th>
                            <th scope="col">Jumlah Peserta</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr data-toggle="popover" data-trigger="hover" title="Informasi Detail" data-html="true"
                                data-content="Pemesan &#9;: {{ $book->username }}<br/>
                                NIP &#9;&#9;: {{ $book->staff_nip }}<br/>
                                Instalasi &#9;: {{ $book->installation }}<br/>
                                   @if ($book->approved == 2 && $book->reject_note !== null)
                                Info Ditolak : {{ $book->reject_note }}
                        @endif
                        ">
                        <td>{{ $books->firstItem() + $loop->index }}</td>
                        <td>{{ $book->date_start }}</td>
                        <td>{{ $book->time_start }} - {{ $book->time_finish }}</td>
                        <td>{{ $book->topic }}</td>
                        <td>{{ $book->type_meeting }}</td>
                        <td>{{ $book->entrant }}</td>
                        <td>{{ $book->room->name ?? 'Ruangan Terhapus' }}</td>
                        @if ($book->approved === 1)
                            <td class="bg-success text-white">Di Setujui</td>
                        @elseif ($book->approved === 2)
                            <td class="bg-danger text-white">Di Tolak</td>
                        @else
                            <td class="bg-secondary text-white">Pending</td>
                        @endif
                        </tr>
                        @endforeach
                        @if ($books->count() <= 5)
                            @for ($i = 1; $i <= 5 - $books->count(); $i++)
                                <tr>
                                    <td class="pb-4"></td>
                                    <td class="pb-4"></td>
                                    <td class="pb-4"></td>
                                    <td class="pb-4"></td>
                                    <td class="pb-4"></td>
                                    <td class="pb-4"></td>
                                    <td class="pb-4"></td>
                                    <td class="pb-4"></td>
                                </tr>
                            @endfor
                        @endif
                    </tbody>
                </table>
                {!! $books->appends(request()->input())->links() !!}
            </div>
        </div>
    </div>

    <script>
        $('#menu-list a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>

@endsection
