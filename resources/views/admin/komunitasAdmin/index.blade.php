@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-gradient fw-bold mb-0">🌟 Daftar Komunitas</h2>
        <a href="{{ route('admin.komunitasAdmin.create') }}" class="btn btn-success rounded-pill shadow-sm px-4 py-2 fw-semibold">
            <i class="bi bi-plus-circle me-1"></i> Tambah Komunitas
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        @foreach($komunitas as $item)
            <div class="col-md-4">
                <div class="card komunitas-card border-0 rounded-4 shadow-lg h-100 position-relative overflow-hidden" style="transition: transform .2s;">
                    @if ($item->image_path)
                        <div class="overflow-hidden" style="height: 210px;">
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top img-fluid komunitas-img" style="object-fit: cover; height: 100%; transition: transform 0.4s cubic-bezier(.4,2,.6,1);" alt="Community Image">
                        </div>
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 210px;">
                            <i class="bi bi-people-fill text-secondary" style="font-size: 3rem;"></i>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-gradient bg-info text-dark mb-2 px-3 py-2 fs-6 shadow-sm" style="letter-spacing:1px;">
                            <i class="bi bi-tag"></i> {{ $item->category }}
                        </span>
                        <h5 class="card-title fw-bold text-primary">{{ $item->judul_komunitas }}</h5>
                        <p class="card-text text-muted small mb-3">{{ Str::limit($item->deskripsi, 90) }}</p>
                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('admin.komunitasAdmin.show', $item->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center">
                                <i class="bi bi-eye me-1"></i> Detail
                            </a>
                            <a href="{{ route('admin.komunitasAdmin.edit', $item->id) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 d-flex align-items-center">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.komunitasAdmin.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komunitas ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center">
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {!! $komunitas->links('pagination::bootstrap-5') !!}
    </div>
</div>

{{-- Custom CSS for extra style --}}
<style>
    .komunitas-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.12), 0 1.5px 6px rgba(0,0,0,0.08);
    }
    .komunitas-img:hover {
        transform: scale(1.08) rotate(-1deg);
    }
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endsection
