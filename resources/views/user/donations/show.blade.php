@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Donasi Saya</h2>
    <div class="row">
        @if($donations->isEmpty())
            <div class="col-md-12">
                <div class="alert alert-warning">Belum ada donasi yang dilakukan.</div>
            </div>
        @else
            @foreach($donations as $donation)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('images/' . $donation->campaign->image) }}" class="card-img-top" alt="Gambar Kampanye" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $donation->campaign->title }}</h5>
                        <p class="card-text">
                            <strong>Jumlah:</strong> Rp {{ number_format($donation->amount) }}<br>
                            <strong>Tanggal:</strong> {{ $donation->created_at->format('d M Y H:i') }}<br>
                            <strong>Pesan:</strong> {{ $donation->message ?? '-' }}
                        </p>
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
            @endforeach
        @endif
    </div>
</div>
@endsection