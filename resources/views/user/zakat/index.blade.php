@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4 text-gradient">Daftar <span class="text-primary">Zakat</span></h2>
    <a href="{{ route('zakat.create') }}" class="btn btn-success rounded-pill mb-3 px-4 fw-semibold shadow-sm">
        <i class="bi bi-plus-circle"></i> Tambah Zakat
    </a>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pembayar</th>
                            <th>Penghasilan</th>
                            <th>Bonus</th>
                            <th>Utang</th>
                            <th>Panti Asuhan</th>
                            <th>Total Zakat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zakat as $z)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $z->nama_pembayar_zakat }}</td>
                                <td>Rp {{ number_format($z->penghasilan_perbulan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($z->bonus, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($z->utang, 0, ',', '.') }}</td>
                                <td>{{ $z->pantiasuhan }}</td>
                                <td>
                                    @php
                                        $penghasilanBersih = $z->penghasilan_perbulan + $z->bonus - $z->utang;
                                        $totalZakat = max($penghasilanBersih * 0.025, 0);
                                    @endphp
                                    <span class="fw-bold text-success">Rp {{ number_format($totalZakat, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    @if ($z->is_paid)
                                        <span class="badge bg-success px-3 py-2 shadow-sm">Sudah Dibayar</span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2 shadow-sm">Belum Dibayar</span>
                                    @endif
                                    <br>
                                    <small class="text-muted">Status: {{ $z->status }}</small>
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        @if (!$z->is_paid)
                                            <a href="{{ route('zakat.pay', $z->id) }}" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm mb-1">
                                                <i class="bi bi-cash-coin"></i> Bayar
                                            </a>
                                        @endif
                                        <a href="{{ route('zakat.edit', $z->id) }}" class="btn btn-warning btn-sm rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
