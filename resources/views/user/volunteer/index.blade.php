@extends('layouts.app')

@section('content')
    <h2>Program Volunteer Tersedia</h2>
    <div class="row">
        @forelse($programs as $program)
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $program->image_path) }}" class="card-img-top" alt="{{ $program->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $program->name }}</h5>
                    <p class="text-muted">{{ $program->company_name }} - {{ $program->category }}</p>
                    <p>{{ Str::limit($program->description, 100) }}</p>
                    <p><strong>Lokasi:</strong> {{ $program->location }}</p>
                    <a href="{{ route('volunteer.create', $program) }}" class="btn btn-success btn-sm me-2">Daftar Volunteer</a>
                    <a href="{{ route('volunteer.edit', $program) }}" class="btn btn-warning btn-sm">Edit</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-muted">Belum ada program volunteer tersedia saat ini.</p>
        </div>
        @endforelse
    </div>
</div>

<hr>

<div class="container">
    <h2>Daftar Volunteer</h2>
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
<br>
@endsection
