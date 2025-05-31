@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2 class="text-gradient fw-bold mb-0">🎁 Daftar Donasi</h2>
            <a href="{{ route('campaigns.create') }}" class="btn btn-success rounded-pill shadow-sm px-4 py-2 fw-semibold">
                <i class="fas fa-plus me-1"></i> Buat Donasi Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        @forelse($campaigns as $campaign)
            <div class="col-md-4">
                <div class="card campaign-card border-0 rounded-4 shadow-lg h-100 position-relative overflow-hidden" style="transition: transform .2s;">
                    <img src="{{ asset('storage/'.$campaign->image) }}" 
                         class="card-img-top campaign-img"
                         alt="{{ $campaign->title }}"
                         style="height: 210px; object-fit: cover; transition: transform 0.4s cubic-bezier(.4,2,.6,1);">
                    
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-gradient bg-info text-dark mb-2 px-3 py-2 fs-6 shadow-sm" style="letter-spacing:1px;">
                            <i class="bi bi-tag"></i> {{ $campaign->category ?? 'Donasi' }}
                        </span>
                        <h5 class="card-title fw-bold text-primary">{{ $campaign->title }}</h5>
                        <p class="card-text text-muted small mb-3">{{ Str::limit($campaign->description, 90) }}</p>
                        
                        <div class="progress mb-3" style="height: 18px;">
                            <div class="progress-bar bg-success fw-semibold" 
                                 role="progressbar" 
                                 style="width: {{ $campaign->getProgressPercentageAttribute() }}%"
                                 aria-valuenow="{{ $campaign->getProgressPercentageAttribute() }}"
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                                {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}%
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <small class="text-muted">Terkumpul</small>
                                <p class="fw-bold mb-0 text-success">Rp {{ number_format($campaign->current_amount) }}</p>
                            </div>
                            <div class="text-end">
                                <small class="text-muted">Target</small>
                                <p class="fw-bold mb-0 text-primary">Rp {{ number_format($campaign->target_amount) }}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <small class="text-muted">
                                <i class="far fa-clock"></i> 
                                {{ \Carbon\Carbon::parse($campaign->deadline)->diffForHumans() }}
                            </small>
                            <a href="{{ route('campaigns.show', $campaign->id) }}" 
                               class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada Donasi yang tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
    .campaign-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.12), 0 1.5px 6px rgba(0,0,0,0.08);
    }
    .campaign-img:hover {
        transform: scale(1.08) rotate(-1deg);
    }
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endpush