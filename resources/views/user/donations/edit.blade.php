@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Donasi</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('donations.update', $donation) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label>Kampanye</label>
                            <input type="text" class="form-control" value="{{ $donation->campaign->title }}" disabled>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="amount">Jumlah Donasi (Rp)</label>
                            <input type="number" name="amount" id="amount" 
                                   class="form-control" value="{{ $donation->amount }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="message">Pesan (Opsional)</label>
                            <textarea name="message" id="message" 
                                      class="form-control" rows="3">{{ $donation->message }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Donasi</button>
                        <a href="{{ route('donations.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection