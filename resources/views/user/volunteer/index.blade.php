@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Volunteer</h2>
    <a href="{{ route('volunteer.create') }}" class="btn btn-primary mb-3">Tambah Volunteer</a>
    

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        @foreach($volunteers as $v)
        <tr>
            <td>{{ $v->name }}</td>
            <td>{{ $v->gender }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->phone }}</td>
            <td>{{ $v->address }}</td>
            <td>
                <form action="{{ route('volunteer.destroy', $v->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
