@extends('layouts.public')

@section('content')
    <div class="cover py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="h3 mb-0 text-white">Jadwal Rapat</h1>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-md-12 card shadow mb-4 p-3">
                    <table class="bg-white table text-center">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Topik</th>
                                <th scope="col">Jenis Rapat</th>
                                <th scope="col">Jumlah Peserta</th>
                                <th scope="col">Ruangan</th>
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
                            <td>{{ $book->time_start }} - {{ $book->time_finish }} </td>
                            <td>{{ $book->topic }}</td>
                            <td>{{ $book->type_meeting }}</td>
                            <td>{{ $book->entrant }}</td>
                            <td>{{ $book->room->name ?? 'Ruangan Terhapus' }}</td>
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
                                    </tr>
                                @endfor
                            @endif
                        </tbody>
                    </table>
                    {!! $books->appends(request()->input())->links() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm my-5">
        <hr class="separator separator--dots" />
    </div>
    <div class="mb-5 text-center">
        <h1 class="h3 mb-0 text-dark">Daftar Ruang Rapat</h1>
    </div>

    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            @foreach ($rooms as $room)
                <div class="col-md-4 m-0">
                    <a class="card card-body text-center img-hover-zoom" href="/books/create?room_id={{ $room->id }}">
                        @if ($room->img === null && !file_exists(public_path() . 'storage/img/' . $room->img))
                            <img class="rounded h-100" width="100%" style="object-fit:cover;"
                                src="{{ asset('images/nocontentyet.jpg') }}">
                        @else
                            <img class="rounded h-100" width="100%" style="object-fit:cover;"
                                src="{{ asset('storage/img/' . $room->img) }}" alt="">
                        @endif
                        <div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-12">
                                    <h5 class="text-center"><b>Ruang {{ $room->name }}</b></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-sm my-5">
        <hr class="separator separator--dots" />
    </div>

    <div class="kalender py-5">
        <div class="container">
            <div id="calender" class="text-center mb-5">
                <h1 class="h3 mb-0 text-white">Kalender Jadwal Rapat</h1>
            </div>
            <div class="container justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow p-3">
                        <div class="row justify-content-center p-3">
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
