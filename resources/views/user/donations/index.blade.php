@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2>Donasi</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('donations.show') }}" class="btn btn-info">
                <i class="fas fa-history"></i> Riwayat Donasi Saya
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif  
    
    {{-- menampilkan daftar kampanye --}}
    <div class="row">
        @forelse($campaigns as $campaign)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/'.$campaign->image) }}" 
                         class="card-img-top" 
                         alt="{{ $campaign->title }}"
                         style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $campaign->title }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($campaign->description, 100) }}
                        </p>
                        {{-- progres --}}
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
                            <div class="btn-group">
                                
                                    <a href="{{ route('donations.edit', $campaign) }}"
                                    class="btn btn-primary btn-sm">
                                    Edit Donasi    
                                    </a>
                                <a href="{{ route('donations.create', $campaign) }}"
                                   class="btn btn-primary btn-sm">
                                    Donasi Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal untuk setiap kampanye -->
            <div class="modal fade" id="campaignModal-{{ $campaign->id }}" tabindex="-1" aria-labelledby="campaignModalLabel-{{ $campaign->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="campaignModalLabel-{{ $campaign->id }}">{{ $campaign->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('images/'.$campaign->image) }}" 
                                 class="img-fluid mb-3" 
                                 alt="{{ $campaign->title }}"
                                 style="width: 100%; height: 300px; object-fit: cover;">
                            
                            <p class="text-justify">{{ $campaign->description }}</p>
                            
                            <div class="progress mb-3">
                                <div class="progress-bar" role="progressbar" 
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush