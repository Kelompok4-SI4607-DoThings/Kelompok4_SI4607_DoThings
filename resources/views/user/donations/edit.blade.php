@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-center fw-bold">Edit Donasi</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('donations.update', $donation) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-4">
                            <label class="form-label">Donasi</label>
                            <input type="text" class="form-control" value="{{ $donation->campaign->title }}" disabled>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="amount" class="form-label">Jumlah Donasi (Rp)</label>
                            <input type="number" name="amount" id="amount" 
                                   class="form-control" value="{{ $donation->amount }}" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="message" class="form-label">Pesan (Opsional)</label>
                            <textarea name="message" id="message" 
                                      class="form-control" rows="3">{{ $donation->message }}</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update Donasi</button>
                            <a href="{{ route('donations.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left-circle"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
