@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <img src="{{ asset('storage/'.$campaign->image) }}" 
                     class="card-img-top campaign-img-detail"
                     alt="{{ $campaign->title }}"
                     style="height: 380px; object-fit: cover; transition:transform .3s;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-gradient bg-info text-dark px-3 py-2 fs-6 shadow-sm" style="letter-spacing:1px;">
                            <i class="bi bi-tag"></i> {{ $campaign->category ?? 'Donasi' }}
                        </span>
                        <a href="{{ route('campaigns.index') }}" class="btn btn-outline-secondary rounded-pill px-3 fw-semibold shadow-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <h3 class="fw-bold text-primary mb-2">{{ $campaign->title }}</h3>
                    <p class="text-muted fs-6 mb-3">{{ $campaign->description }}</p>
                    
                    <div class="progress mb-3" style="height: 18px;">
                        <div class="progress-bar bg-success fw-semibold fs-6"
                             role="progressbar"
                             style="width: {{ $campaign->getProgressPercentageAttribute() }}%"
                             aria-valuenow="{{ $campaign->getProgressPercentageAttribute() }}"
                             aria-valuemin="0" aria-valuemax="100">
                            {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}%
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <div class="border-0 rounded-4 bg-light p-2 text-center shadow-sm">
                                <div class="fw-semibold text-secondary mb-1 small">Target</div>
                                <div class="h5 text-primary mb-0">Rp {{ number_format($campaign->target_amount) }}</div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="border-0 rounded-4 bg-light p-2 text-center shadow-sm">
                                <div class="fw-semibold text-secondary mb-1 small">Terkumpul</div>
                                <div class="h5 text-success mb-0">Rp {{ number_format($campaign->current_amount) }}</div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="border-0 rounded-4 bg-light p-2 text-center shadow-sm">
                                <div class="fw-semibold text-secondary mb-1 small">Deadline</div>
                                <div class="h5 text-danger mb-0">
                                    {{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-warning rounded-pill px-3 fw-semibold shadow-sm">
                            <i class="fas fa-edit"></i> Edit Donasi
                        </a>
                        <form action="{{ route('campaigns.destroy', $campaign->id) }}" 
                            method="POST" 
                            class="d-inline" 
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kampanye ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill px-3 fw-semibold shadow-sm">
                                <i class="fas fa-trash"></i> Hapus Donasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .campaign-img-detail:hover {
        transform: scale(1.04) rotate(-1deg);
        box-shadow: 0 8px 32px rgba(0,0,0,0.18), 0 1.5px 6px rgba(0,0,0,0.10);
    }
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endsection