@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4 text-gradient">Program <span class="text-primary">Volunteer</span> Tersedia</h2>
    <div class="row g-4">
        @forelse($programs as $program)
        <div class="col-md-4">
            <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden">
                <img src="{{ asset('storage/' . $program->image_path) }}" class="card-img-top" alt="{{ $program->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-primary">{{ $program->name }}</h5>
                    <p class="text-muted mb-1"><i class="bi bi-building"></i> {{ $program->company_name }} &mdash; <span class="badge bg-info text-dark">{{ $program->category }}</span></p>
                    <p class="small mb-2">{{ Str::limit($program->description, 90) }}</p>
                    <p class="mb-3"><i class="bi bi-geo-alt"></i> <strong>Lokasi:</strong> {{ $program->location }}</p>
                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ route('volunteer.create', $program) }}" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm">
                            <i class="bi bi-person-plus"></i> Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center shadow-sm">Belum ada program volunteer tersedia saat ini.</div>
        </div>
        @endforelse
    </div>
</div>

<hr class="my-5">

<div class="container">
    <h2 class="fw-bold mb-4 text-gradient">Daftar <span class="text-primary">Volunteer</span></h2>
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($volunteers as $v)
                        <tr>
                            <td class="fw-semibold">{{ $v->name }}</td>
                            <td>{{ $v->gender }}</td>
                            <td>{{ $v->email }}</td>
                            <td>{{ $v->phone }}</td>
                            <td>{{ $v->address }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('volunteer.edit', $v->id) }}" class="btn btn-warning btn-sm rounded-pill px-3 shadow-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('volunteer.destroy', $v->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<br>
@endsection
