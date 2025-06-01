@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4">
            <h2 class="fw-bold mb-4 text-gradient">Detail Donasi</h2>
            
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/'.$campaign->image) }}" 
                         class="img-fluid rounded-4 shadow-sm mb-4" 
                         alt="{{ $campaign->title }}"
                         style="width: 100%; height: 300px; object-fit: cover;">
                    
                    <!-- Tambahan informasi pembuat campaign -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-person-circle text-primary"></i> Informasi Penggalang Dana
                            </h5>
                            <p class="mb-2">
                                <i class="bi bi-person text-muted me-2"></i>{{ $campaign->user?->name ?? 'User tidak ditemukan' }}
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-calendar2-check text-muted me-2"></i>Bergabung sejak {{ $campaign->user?->created_at?->format('d M Y') ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h3 class="fw-bold text-primary mb-3">{{ $campaign->title }}</h3>
                    
                    <!-- Status dan Deadline -->
                    <div class="d-flex gap-2 mb-3">
                        <span class="badge bg-{{ $campaign->status == 'active' ? 'success' : 'warning' }} px-3 py-2">
                            <i class="bi bi-circle-fill me-1"></i>{{ ucfirst($campaign->status) }}
                        </span>
                        <span class="badge bg-info px-3 py-2">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}
                        </span>
                    </div>
                    
                    <p class="text-muted mb-4">{{ $campaign->description }}</p>
                    
                    <!-- Progress bar dengan label -->
                    <label class="form-label fw-semibold mb-2">Progress Donasi</label>
                    <div class="progress mb-3" style="height: 20px;">
                        <div class="progress-bar bg-success fw-semibold" 
                             role="progressbar" 
                             style="width: {{ $campaign->getProgressPercentageAttribute() }}%">
                            {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}%
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="border rounded-4 p-3">
                                <h6 class="text-muted mb-1">Target Donasi</h6>
                                <h4 class="text-primary mb-0">Rp {{ number_format($campaign->target_amount) }}</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded-4 p-3">
                                <h6 class="text-muted mb-1">Total Terkumpul</h6>
                                <h4 class="text-success mb-0">Rp {{ number_format($campaign->current_amount) }}</h4>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi tambahan -->
                    <div class="card border-0 bg-light rounded-4 mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Informasi Tambahan</h5>
                            <div class="row g-3">
                                <div class="col-6">
                                    <p class="mb-1 text-muted">Total Donatur</p>
                                    <h5 class="mb-0">{{ $campaign->donations->count() }} Orang</h5>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 text-muted">Sisa Waktu</p>
                                    <h5 class="mb-0">
                                        @php
                                            $deadline = \Carbon\Carbon::parse($campaign->deadline);
                                            $now = \Carbon\Carbon::now();
                                        @endphp
                                        
                                        @if($now->gt($deadline))
                                            <span class="text-danger">Sudah Berakhir</span>
                                        @else
                                            {{ floor($now->diffInDays($deadline)) }} Hari Lagi
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('donations.create', $campaign->id) }}" 
                           class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="bi bi-cash-coin"></i> Donasi Sekarang
                        </a>
                        <a href="{{ route('donations.index') }}" 
                           class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
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
@endsection