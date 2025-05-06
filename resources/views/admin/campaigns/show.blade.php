@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset('images/'.$campaign->image) }}" 
                     class="card-img-top" 
                     alt="{{ $campaign->title }}"
                     style="height: 400px; object-fit: cover;">
                     
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="mb-0">{{ $campaign->title }}</h3>
                        <a href="{{ route('campaigns.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                    
                    <p class="text-justify">{{ $campaign->description }}</p>
                    
                    <div class="progress mb-3">
                        <div class="progress-bar" role="progressbar" 
                             style="width: {{ $campaign->getProgressPercentageAttribute() }}%">
                            {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}%
                        </div>
                    </div>

                    <div class="row mb-4">
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

                    <div class="mt-3">
                    <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Kampanye
                    </a>
                    
                    <form action="{{ route('campaigns.destroy', $campaign->id) }}" 
                        method="POST" 
                        class="d-inline" 
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kampanye ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus Kampanye
                        </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection