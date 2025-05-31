@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 600px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient text-center">Tambah <span class="text-primary">Komunitas</span></h2>
            <form action="{{ route('admin.komunitasAdmin.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="judul_komunitas" class="form-label fw-semibold">Judul Komunitas</label>
                    <input type="text" class="form-control rounded-3" id="judul_komunitas" name="judul_komunitas" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_dibuat" class="form-label fw-semibold">Tanggal Dibuat</label>
                    <input type="date" class="form-control rounded-3" id="tanggal_dibuat" name="tanggal_dibuat" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label fw-semibold">Kategori</label>
                    <input type="text" class="form-control rounded-3" id="category" name="category" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control rounded-3" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-plus-circle"></i> Tambah Komunitas
                    </button>
                    <a href="{{ route('admin.komunitasAdmin.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
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
