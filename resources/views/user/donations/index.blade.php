@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold text-gradient">Donasi</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('donations.show') }}" class="btn btn-info rounded-pill px-4 fw-semibold shadow-sm">
                <i class="fas fa-history"></i> Riwayat Donasi Saya
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif  
    
    <div class="row">
        @forelse($campaigns as $campaign)
            <div class="col-md-6 col-lg-5 mb-4"> <!-- Ubah col-md-4 jadi col-md-6 col-lg-5 agar card lebih besar -->
                <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden" style="min-height: 480px;"> <!-- Tambah min-height -->
                    <img src="{{ asset('storage/'.$campaign->image) }}" 
                         class="card-img-top" 
                         alt="{{ $campaign->title }}"
                         style="height: 260px; object-fit: cover;"> <!-- Tinggikan gambar -->
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-primary text-gradient mb-2" style="font-size: 1.35rem; letter-spacing: 1px;">
                            <i class="bi bi-heart-pulse-fill me-1 text-danger"></i>
                            {{ $campaign->title }}
                        </h5>
                        <p class="card-text text-muted small mb-2">
                            {{ Str::limit($campaign->description, 120) }}
                        </p>
                        <div class="progress mb-3" style="height: 20px;">
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
                            <div class="btn-group gap-2">

                                <a href="{{ route('donations.detail', $campaign->id) }}"
                                   class="btn btn-info btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                               

                                <a href="{{ route('donations.create', $campaign) }}"
                                   class="btn btn-success btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="bi bi-cash-coin"></i> Donasi Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal untuk setiap kampanye -->
            <div class="modal fade" id="campaignModal-{{ $campaign->id }}" tabindex="-1" aria-labelledby="campaignModalLabel-{{ $campaign->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content rounded-4">
                        <div class="modal-header">
                            <h5 class="modal-title" id="campaignModalLabel-{{ $campaign->id }}">{{ $campaign->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <img src="{{ asset('storage/'.$campaign->image) }}" 

                                 class="img-fluid mb-3 rounded-4 shadow-sm" 
                                 alt="{{ $campaign->title }}"
                                 style="width: 100%; height: 300px; object-fit: cover;">
                            <p class="text-justify">{{ $campaign->description }}</p>
                            <div class="progress mb-3" style="height: 18px;">
                                <div class="progress-bar bg-success fw-semibold" role="progressbar" 
                                     style="width: {{ $campaign->getProgressPercentageAttribute() }}%">
                                    {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}%
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="border rounded p-3 text-center">
                                        <h5>Target</h5>
                                        <p class="h4 text-primary mb-0">Rp {{ number_format($campaign->target_amount) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="border rounded p-3 text-center">
                                        <h5>Terkumpul</h5>
                                        <p class="h4 text-success mb-0">Rp {{ number_format($campaign->current_amount) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="border rounded p-3 text-center">
                                        <h5>Deadline</h5>
                                        <p class="h4 text-danger mb-0">{{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center shadow-sm rounded-3">
                    Belum ada Donasi yang tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .card-title.text-gradient {
        font-weight: 700;
        text-shadow: 0 2px 8px rgba(32,201,151,0.08);
        transition: color 0.2s;
    }
    .card-title .bi-heart-pulse-fill {
        font-size: 1.3rem;
        vertical-align: -0.2em;
    }
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-7px) scale(1.02);
        box-shadow: 0 8px 32px rgba(0,0,0,0.12);
    }
    .progress-bar {
        font-size: 1rem;
    }
    .btn-group.gap-2 > .btn {
        margin-right: 0.5rem;
    }
    .btn-group.gap-2 > .btn:last-child {
        margin-right: 0;
    }
</style>
@endpush