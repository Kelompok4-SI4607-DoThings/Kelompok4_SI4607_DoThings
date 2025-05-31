@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 520px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient text-center">
                <i class="bi bi-pencil-square text-warning me-2"></i>
                Edit <span class="text-primary">Zakat</span>
            </h2>
            <form action="{{ route('zakat.update', $zakat->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_pembayar_zakat" class="form-label fw-semibold">Nama Pembayar Zakat</label>
                    <input type="text" name="nama_pembayar_zakat" class="form-control rounded-3" value="{{ $zakat->nama_pembayar_zakat }}" required>
                </div>
                <div class="mb-3">
                    <label for="penghasilan_perbulan" class="form-label fw-semibold">Penghasilan Perbulan</label>
                    <input type="number" name="penghasilan_perbulan" class="form-control rounded-3" value="{{ $zakat->penghasilan_perbulan }}" required>
                </div>
                <div class="mb-3">
                    <label for="bonus" class="form-label fw-semibold">Bonus</label>
                    <input type="number" name="bonus" class="form-control rounded-3" value="{{ $zakat->bonus }}">
                </div>
                <div class="mb-3">
                    <label for="utang" class="form-label fw-semibold">Utang</label>
                    <input type="number" name="utang" class="form-control rounded-3" value="{{ $zakat->utang }}">
                </div>
                <div class="mb-4">
                    <label for="pantiasuhan" class="form-label fw-semibold">Panti Asuhan</label>
                    <input type="text" name="pantiasuhan" class="form-control rounded-3" value="{{ $zakat->pantiasuhan }}" required>
                </div>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="submit" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-pencil-square"></i> Perbarui
                    </button>
                    <a href="{{ route('zakat.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-arrow-left-circle"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #ffc107 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endsection
