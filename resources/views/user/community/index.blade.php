@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 fw-bold text-primary text-center">Pilih Komunitas</h2>
    <div class="row justify-content-center">
        @forelse($komunitas as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow rounded-4 border-0 overflow-hidden">
                @if(!empty($item->image))
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                        <i class="bi bi-people-fill text-secondary" style="font-size: 3rem;"></i>
                    </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <span class="badge bg-info text-dark">{{ $item->kategori ?? 'Komunitas' }}</span>
                    </div>
                    <h5 class="card-title fw-bold">{{ $item->judul_komunitas ?? $item->name ?? '-' }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit($item->deskripsi ?? $item->description, 80) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('community.chat.show', $item->id) }}" class="btn btn-primary btn-sm w-100 rounded-pill shadow-sm">Masuk Ruang Obrolan</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">Belum ada komunitas tersedia.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection