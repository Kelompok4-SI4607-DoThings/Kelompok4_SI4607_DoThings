@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient">Edit <span class="text-primary">Galang Dana</span></h2>
            
            <form action="{{ route('GalangDana.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Galang Dana</label>
                    <input type="text" name="title" id="title" 
                        class="form-control rounded-3 @error('title') is-invalid @enderror"
                        value="{{ old('title', $campaign->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" id="description" 
                        class="form-control rounded-3 @error('description') is-invalid @enderror"
                        rows="4" required>{{ old('description', $campaign->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="target_amount" class="form-label fw-semibold">Target Donasi</label>
                    <input type="number" name="target_amount" id="target_amount" 
                        class="form-control rounded-3 @error('target_amount') is-invalid @enderror"
                        value="{{ old('target_amount', $campaign->target_amount) }}" required>
                    @error('target_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label fw-semibold">Batas Waktu</label>
                    <input type="date" name="deadline" id="deadline" 
                        class="form-control rounded-3 @error('deadline') is-invalid @enderror"
                        value="{{ old('deadline', $campaign->deadline) }}" required>
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Gambar Galang Dana</label>
                    @if($campaign->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $campaign->image) }}" 
                                alt="Current Image" class="rounded" style="max-height: 150px">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" 
                        class="form-control rounded-3 @error('image') is-invalid @enderror">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-check-circle"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('GalangDana.index') }}" 
                        class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endpush
@endsection