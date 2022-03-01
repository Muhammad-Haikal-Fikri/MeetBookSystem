@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Admin</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Admin</h6>
        </div>
        <div class="card-body">
            <h5>NIPP : {{ $user->nip }}</h5>
            <h5>Nama Akun : {{ $user->name }}</h5>
            <h5>Level : Sebagai @if ($user->role == 1)
                                    <td>Admin</td>
                                @elseif ($user->role == 2)
                                    <td>Manager</td>
                                @else
                                    <td>User</td>
                                @endif</h5>

            <form action="/dashboard/users/{{ $user->id }}" method="POST">
                @csrf
                @method('DELETE')
                @if (Auth::user()->id !== $user->id)
                    <button class="btn btn-danger">Hapus</button>
                @endif
                <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-primary">Edit Data</a>
                <a href="/dashboard/users" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
