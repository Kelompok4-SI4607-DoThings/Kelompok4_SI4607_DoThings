@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 700px;">
        @if($program->image)
        <img src="{{ asset('storage/' . $program->image) }}" class="card-img-top rounded-4" alt="{{ $program->name }}" style="height: 250px; object-fit: cover;">
        @endif
        <div class="card-body p-5">
            <h2 class="fw-bold mb-3 text-gradient">{{ $program->name }}</h2>
            <span class="badge bg-info text-dark mb-2">{{ $program->category }}</span>
            <p class="mb-3">{{ $program->description }}</p>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Lokasi:</strong> {{ $program->location }}</li>
            </ul>
            <div class="mb-3">
                {{-- tambahkan link sesuai dengan ketentuan volunteer link yang ada --}}
                <a href="https://www.instagram.com/p/DKl7ybFS2OC/?igsh=d2Nwb3d2bWlkMWVo" target="_blank" rel="noopener" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-box-arrow-up-right"></i> Lihat Halaman Asli
                </a>
            </div>
            <a href="{{ route('volunteer.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection