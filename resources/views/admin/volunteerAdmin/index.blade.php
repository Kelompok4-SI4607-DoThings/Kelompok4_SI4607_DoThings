@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-gradient fw-bold mb-0">🤝 Daftar Volunteer</h2>
        <a href="{{ route('admin.volunteerAdmin.create') }}" class="btn btn-success rounded-pill shadow-sm px-4 py-2 fw-semibold">
            <i class="bi bi-plus-circle me-1"></i> Tambah Volunteer
        </a>
    </div>

    <div class="row g-4">
        @forelse ($volunteers as $item)
        <div class="col-md-4">
            <div class="card volunteer-card border-0 rounded-4 shadow-lg h-100 position-relative overflow-hidden" style="transition: transform .2s;">
                @if ($item->image_path)
                <div class="overflow-hidden" style="height: 200px;">
                    <img src="{{ asset('storage/' . $item->image_path) }}"
                        class="card-img-top img-fluid volunteer-img"
                        style="object-fit: cover; height: 100%; transition: transform 0.4s cubic-bezier(.4,2,.6,1);"
                        alt="Volunteer Image">
                </div>
                @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="bi bi-person-badge text-secondary" style="font-size: 3rem;"></i>
                </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <span class="badge bg-gradient bg-info text-dark mb-2 px-3 py-2 fs-6 shadow-sm" style="letter-spacing:1px;">
                        <i class="bi bi-tag"></i> {{ $item->category ?? 'Volunteer' }}
                    </span>
                    <h5 class="card-title fw-bold text-primary">{{ $item->name }}</h5>
                    <p class="card-text text-muted small mb-3">{{ Str::limit($item->description, 90) }}</p>
                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ route('admin.volunteerAdmin.show', $item->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center">
                            <i class="bi bi-eye me-1"></i> Detail
                        </a>
                        <a href="{{ route('admin.volunteerAdmin.edit', $item->id) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 d-flex align-items-center">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.volunteerAdmin.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center">
                                <i class="bi bi-trash me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">Belum ada volunteer.</div>
        </div>
        @endforelse
    </div>
</div>

<style>
    .volunteer-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.12), 0 1.5px 6px rgba(0,0,0,0.08);
    }
    .volunteer-img:hover {
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
