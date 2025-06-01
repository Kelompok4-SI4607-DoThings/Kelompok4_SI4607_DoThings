@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 600px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient">Edit <span class="text-primary">Volunteer</span></h2>
            <form action="{{ route('admin.volunteerAdmin.update', $volunteeradmin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Company</label>
                    <input class="form-control rounded-3" name="company_name" value="{{ $volunteeradmin->company_name }}" placeholder="Nama Company" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori Volunteer</label>
                    <input class="form-control rounded-3" name="category" value="{{ $volunteeradmin->category }}" placeholder="Kategori Volunteer" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Volunteer</label>
                    <input class="form-control rounded-3" name="name" value="{{ $volunteeradmin->name }}" placeholder="Judul Volunteer" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Lokasi Volunteer</label>
                    <input class="form-control rounded-3" name="location" value="{{ $volunteeradmin->location }}" placeholder="Lokasi Volunteer" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control rounded-3" name="description" rows="4" placeholder="Deskripsi" required>{{ $volunteeradmin->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Upload Gambar</label>
                    <input type="file" name="image" class="form-control rounded-3">
                    @if ($volunteeradmin->image_path)
                        <img src="{{ asset('storage/' . $volunteeradmin->image_path) }}" class="img-fluid rounded mt-3 shadow-sm" style="max-height:120px;">
                    @endif
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm" type="submit">
                        <i class="bi bi-pencil-square"></i> Update
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