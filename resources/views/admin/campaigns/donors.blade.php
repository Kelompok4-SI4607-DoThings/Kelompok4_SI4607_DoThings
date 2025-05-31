@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4 text-gradient">Riwayat Pendonasi: {{ $campaign->title }}</h2>
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Donatur</th>
                            <th>Jumlah</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($campaign->donations as $donation)
                            <tr>
                                <td>{{ $donation->donor_name }}</td>
                                <td>Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                                <td>{{ $donation->message ?? '-' }}</td>
                                <td>{{ $donation->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada donasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <a href="{{ route('campaigns.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection