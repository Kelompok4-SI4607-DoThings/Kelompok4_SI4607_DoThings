<!-- resources/views/admin/zakatAdmin/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 500px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient text-center">Detail <span class="text-primary">Zakat</span></h2>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item py-3">
                    <strong>Nama Pembayar:</strong>
                    <span class="float-end">{{ $zakat->nama_pembayar_zakat }}</span>
                </li>
                <li class="list-group-item py-3">
                    <strong>Penghasilan Perbulan:</strong>
                    <span class="float-end text-success">Rp {{ number_format($zakat->penghasilan_perbulan, 0, ',', '.') }}</span>
                </li>
                <li class="list-group-item py-3">
                    <strong>Panti Asuhan:</strong>
                    <span class="float-end">{{ $zakat->pantiasuhan }}</span>
                </li>
                <li class="list-group-item py-3">
                    <strong>Status Bayar:</strong>
                    <span class="float-end">
                        @if ($zakat->is_paid)
                            <span class="badge bg-success px-3 py-2 shadow-sm">Sudah Dibayar</span>
                        @else
                            <span class="badge bg-danger px-3 py-2 shadow-sm">Belum Dibayar</span>
                        @endif
                    </span>
                </li>
                <li class="list-group-item py-3">
                    <strong>Status Admin:</strong>
                    <span class="float-end">
                        <span class="badge {{ $zakat->status === 'Pending' ? 'bg-warning text-dark' : 'bg-success' }} px-3 py-2 shadow-sm text-capitalize">
                            {{ $zakat->status }}
                        </span>
                    </span>
                </li>
            </ul>
            <div class="text-center">
                <a href="{{ route('zakatAdmin.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
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