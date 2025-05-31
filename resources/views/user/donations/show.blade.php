@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-gradient text-center mb-5">
        <i class="bi bi-archive-fill text-primary me-2"></i> Arsip Donasi Saya
    </h2>
    
    @if($donations->isEmpty())
        <div class="alert alert-warning text-center shadow-sm rounded-3">
            <strong>Belum ada donasi yang dilakukan.</strong>
        </div>
    @else
        <div class="row g-4">
            @foreach($donations as $donation)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-lg rounded-4 h-100">
                        <img src="{{ asset('storage/' . $donation->campaign->image) }}" class="card-img-top rounded-top-4" alt="Gambar Kampanye" style="height: 180px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-primary text-gradient mb-2">
                                <i class="bi bi-heart-pulse-fill me-1 text-danger"></i>
                                {{ $donation->campaign->title }}
                            </h5>
                            <ul class="list-unstyled mb-3">
                                <li><span class="badge bg-success bg-opacity-10 text-success mb-1"><i class="bi bi-cash-coin"></i> Rp {{ number_format($donation->amount) }}</span></li>
                                <li><span class="badge bg-info bg-opacity-10 text-info mb-1"><i class="bi bi-calendar-event"></i> {{ $donation->created_at->format('d M Y H:i') }}</span></li>
                                <li><span class="badge bg-light text-dark mb-1"><i class="bi bi-chat-dots"></i> {{ $donation->message ?? '-' }}</span></li>
                            </ul>
                            <div class="d-flex gap-2 mt-auto">
                                <form action="{{ route('donations.destroy', $donation) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-5">
        <a href="{{ route('donations.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
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
