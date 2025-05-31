@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">
                    <h2 class="fw-bold mb-4 text-gradient text-center">Edit <span class="text-primary">Donasi</span></h2>
                    <form method="POST" action="{{ route('donations.update', $donation) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Donasi Untuk</label>
                            <input type="text" class="form-control rounded-3" value="{{ $donation->campaign->title }}" disabled>
                        </div>
                        
                        <div class="mb-4">
                            <label for="amount" class="form-label fw-semibold">Jumlah Donasi (Rp)</label>
                            <input type="number" name="amount" id="amount" 
                                   class="form-control rounded-3" value="{{ $donation->amount }}" min="1000" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">Pesan (Opsional)</label>
                            <textarea name="message" id="message" 
                                      class="form-control rounded-3" rows="3" placeholder="Tulis pesan untuk campaigner...">{{ $donation->message }}</textarea>
                        </div>
                        
                        <div class="d-flex gap-2 justify-content-center mt-4">
                            <button type="submit" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                                <i class="bi bi-pencil-square"></i> Update Donasi
                            </button>
                            <a href="{{ route('donations.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
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
