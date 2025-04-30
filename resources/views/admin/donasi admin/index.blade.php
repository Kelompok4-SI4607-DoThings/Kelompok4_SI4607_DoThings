@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2>Daftar Kampanye Donasi</h2>
            <a href="{{ route('campaigns.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Buat Kampanye Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse($campaigns as $campaign)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/'.$campaign->image) }}" 
                         class="card-img-top" 
                         alt="{{ $campaign->title }}"
                         style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $campaign->title }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($campaign->description, 100) }}
                        </p>
                        
                        <div class="progress mb-3">
                            <div class="progress-bar" 
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
                                <p class="fw-bold mb-0">Rp {{ number_format($campaign->current_amount) }}</p>
                            </div>
                            <div class="text-end">
                                <small class="text-muted">Target</small>
                                <p class="fw-bold mb-0">Rp {{ number_format($campaign->target_amount) }}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="far fa-clock"></i> 
                                {{ \Carbon\Carbon::parse($campaign->deadline)->diffForHumans() }}
                            </small>
                            <a href="{{ route('campaigns.show', $campaign->id) }}" 
                               class="btn btn-outline-primary btn-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada kampanye yang tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush