@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card p-4 shadow-sm">
        <h2 class="text-center mb-4">Update <span style="color: #007bff;">Donasi</span></h2>

        <form action="{{ route('donasi.update', $donasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_donasi" class="form-label">Nama Donasi</label>
                <input type="text" name="nama_donasi" class="form-control" id="nama_donasi" value="{{ $donasi->nama_donasi }}" required>
            </div>

            <div class="mb-3">
                <label for="target_donasi" class="form-label">Target Donasi</label>
                <input type="number" name="target_donasi" class="form-control" id="target_donasi" value="{{ $donasi->target_donasi }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori_donasi" class="form-label">Kategori Donasi</label>
                <input type="text" name="kategori_donasi" class="form-control" id="kategori_donasi" value="{{ $donasi->kategori_donasi }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required>{{ $donasi->deskripsi }}</textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="form-label">Upload File Gambar</label>
                <input type="file" name="gambar" class="form-control" id="gambar">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Now</button>
        </form>
    </div>
</div>
@endsection
