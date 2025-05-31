@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 600px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient">Tambah <span class="text-primary">Volunteer</span></h2>
            <form action="{{ route('admin.volunteerAdmin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Company</label>
                    <input class="form-control rounded-3" name="company_name" placeholder="Nama Company" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori Volunteer</label>
                    <input class="form-control rounded-3" name="category" placeholder="Kategori Volunteer" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Volunteer</label>
                    <input class="form-control rounded-3" name="name" placeholder="Judul Volunteer" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Lokasi Volunteer</label>
                    <input class="form-control rounded-3" name="location" placeholder="Lokasi Volunteer" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control rounded-3" name="description" rows="4" placeholder="Deskripsi" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Upload Gambar</label>
                    <input type="file" name="image" class="form-control rounded-3">
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm" type="submit">
                        <i class="bi bi-plus-circle"></i> Tambah
                    </button>
                    <a href="{{ route('admin.volunteerAdmin.index') }}"
                        class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
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