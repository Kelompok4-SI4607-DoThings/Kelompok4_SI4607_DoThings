@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 600px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient text-center">Tambah <span class="text-primary">Artikel</span></h2>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Artikel</label>
                    <input type="text" class="form-control rounded-3" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Konten</label>
                    <textarea class="form-control rounded-3" id="content" name="content" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label fw-semibold">Penulis</label>
                    <input type="text" class="form-control rounded-3" id="author" name="author" required>
                </div>
                <div class="mb-3">
                    <label for="published_at" class="form-label fw-semibold">Tanggal Terbit</label>
                    <input type="date" class="form-control rounded-3" id="published_at" name="published_at">
                </div>
                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Foto Artikel</label>
                    <input type="file" class="form-control rounded-3" id="image" name="image" accept="image/*">
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-plus-circle"></i> Simpan Artikel
                    </button>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-arrow-left"></i> Batal
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