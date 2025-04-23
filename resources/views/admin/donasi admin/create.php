@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 800px;">
        <h3 class="text-center fw-bold mb-4">Add <span class="text-primary fst-italic">Donasi</span></h3>

        <form method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_donasi" class="form-label">Nama Donasi</label>
                <input type="text" class="form-control" id="nama_donasi" name="nama_donasi" placeholder="Masukkan nama donasi">
            </div>

            <div class="mb-3">
                <label for="target_donasi" class="form-label">Target Donasi</label>
                <input type="number" class="form-control" id="target_donasi" name="target_donasi" placeholder="Contoh: 10000000">
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Category Donasi</label>
                <select class="form-select" id="kategori" name="kategori">
                    <option selected disabled>Pilih kategori</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Lingkungan">Lingkungan</option>
                    <option value="Bencana Alam">Bencana Alam</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Tulis deskripsi singkat..."></textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="form-label">Upload File Gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    Add Now <i class="bi bi-arrow-right-circle"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="text-center mt-4">
        <a href="#" class="text-primary fs-5 fw-bold text-decoration-none">
            New Artikel <i class="bi bi-plus-circle"></i>
        </a>
        <p class="fw-semibold fst-italic mt-3">“More Giving, More Living”</p>
        <p class="text-muted">Sedikit Dari Kita, Berarti Besar Bagi Mereka!</p>
    </div>
</div>
@endsection
