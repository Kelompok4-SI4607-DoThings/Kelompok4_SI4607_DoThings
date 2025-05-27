@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5">Donasi Saya</h2>
    
    {{-- Pesan Jika Tidak Ada Donasi --}}
    @if($donations->isEmpty())
        <div class="alert alert-warning text-center">
            <strong>Belum ada donasi yang dilakukan.</strong>
        </div>
    @else
        <div class="row">
            @foreach($donations as $donation)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-light">
                        <img src="{{ asset('images/' . $donation->campaign->image) }}" class="card-img-top" alt="Gambar Kampanye" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $donation->campaign->title }}</h5>
                            <p class="card-text">
                                <strong>Jumlah:</strong> Rp {{ number_format($donation->amount) }}<br>
                                <strong>Tanggal:</strong> {{ $donation->created_at->format('d M Y H:i') }}<br>
                                <strong>Pesan:</strong> {{ $donation->message ?? '-' }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <div class="btn-group">
                                    <a href="{{ route('donations.edit', $donation) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('donations.destroy', $donation) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Tombol Kembali --}}
    <div class="text-center mt-4">
        <a href="{{ route('donations.index') }}" class="btn btn-outline-secondary btn-lg">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>
</div>
@endsection
