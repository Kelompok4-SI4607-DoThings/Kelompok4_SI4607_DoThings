@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 480px;">
        <div class="card-body p-4">
            <h2 class="fw-bold text-gradient text-center mb-4">
                <i class="bi bi-credit-card-2-front-fill text-success me-2"></i>
                Konfirmasi Pembayaran Zakat
            </h2>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item bg-transparent border-0 px-0">
                    <strong>Nama Pembayar:</strong> <span class="float-end">{{ $zakat->nama_pembayar_zakat }}</span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0">
                    <strong>Panti Asuhan:</strong> <span class="float-end">{{ $zakat->pantiasuhan }}</span>
                </li>
                <li class="list-group-item bg-transparent border-0 px-0">
                    <strong>Total Zakat:</strong> <span class="float-end text-success fw-bold">Rp {{ number_format($totalZakat, 2, ',', '.') }}</span>
                </li>
            </ul>
            <div class="text-center mb-4">
                <div class="mb-2 fw-semibold">Scan QR untuk pembayaran:</div>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=ZAKAT-{{ $zakat->id }}-{{ $totalZakat }}" alt="QR Code Pembayaran" class="rounded-3 shadow-sm border" style="background:#fff;">
                <div class="small text-muted mt-2">*Tunjukkan QR ini ke kasir atau scan dengan aplikasi pembayaran Anda.</div>
            </div>
            <form action="{{ route('zakat.processPayment', $zakat->id) }}" method="POST" class="text-center">
                @csrf
                <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-cash-coin"></i> Bayar Sekarang
                </button>
                <a href="{{ route('zakat.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm ms-2">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
            </form>
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