@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 650px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient">Buat <span class="text-primary">Donasi Baru</span></h2>
            <form method="POST" action="{{ route('campaigns.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Donasi</label>
                    <input type="text" name="title" 
                        class="form-control rounded-3 @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" 
                        class="form-control rounded-3 @error('description') is-invalid @enderror"
                        rows="5" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Target Donasi</label>
                    <input type="number" name="target_amount" 
                        class="form-control rounded-3 @error('target_amount') is-invalid @enderror"
                        value="{{ old('target_amount') }}" required>
                    @error('target_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deadline</label>
                    <input type="date" name="deadline" 
                        class="form-control rounded-3 @error('deadline') is-invalid @enderror"
                        value="{{ old('deadline') }}" required>
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Gambar Donasi</label>
                    <input type="file" name="image" 
                        class="form-control rounded-3 @error('image') is-invalid @enderror" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-plus-circle"></i> Buat Donasi
                    </button>
                    <a href="{{ route('campaigns.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
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