@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto bg-white" style="max-width: 900px;">
        <div class="row g-0 align-items-center">
            <div class="col-md-5 text-center bg-gradient rounded-start-4 py-5"
                style="background: linear-gradient(135deg, #0d6efd 60%, #20c997 100%); min-height: 340px;">
                @if ($volunteeradmin->image_path)
                    <img src="{{ asset('storage/' . $volunteeradmin->image_path) }}"
                        class="img-fluid rounded-4 shadow-lg volunteer-img-detail"
                        style="max-height: 260px; object-fit:cover; transition:transform .3s;" alt="Volunteer Image">
                @else
                    <div class="d-flex align-items-center justify-content-center h-100" style="min-height:220px;">
                        <i class="bi bi-person-badge text-white" style="font-size: 6rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-7 p-5">
                <span class="badge bg-info text-dark mb-3 px-4 py-3 fs-5 shadow-sm"
                    style="letter-spacing:1px;">
                    <i class="bi bi-tag"></i> {{ $volunteeradmin->category ?? 'Volunteer' }}
                </span>
                <h2 class="fw-bold mb-3" style="color: #0d6efd; font-size: 2.5rem;">{{ $volunteeradmin->name }}</h2>
                <div class="mb-4">
                    <span class="badge bg-light text-primary me-2 fs-6"><i class="bi bi-building"></i>
                        {{ $volunteeradmin->company_name }}</span>
                    <span class="badge bg-light text-success fs-6"><i class="bi bi-geo-alt"></i>
                        {{ $volunteeradmin->location }}</span>
                </div>
                <div class="my-3">
                    <p class="text-muted fs-4">{{ $volunteeradmin->description }}</p>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('admin.volunteerAdmin.edit', $volunteeradmin->id) }}"
                        class="btn btn-warning rounded-pill px-4 py-2 fs-5 shadow-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="{{ route('admin.volunteerAdmin.index') }}"
                        class="btn btn-outline-secondary rounded-pill px-4 py-2 fs-5 shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .volunteer-img-detail:hover {
        transform: scale(1.08) rotate(-2deg);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18), 0 1.5px 6px rgba(0, 0, 0, 0.10);
    }

    .card {
        border-radius: 2rem !important;
    }
</style>
@endsection
