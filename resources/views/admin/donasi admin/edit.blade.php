@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
        <h3 class="text-center fw-bold mb-4 text-danger">Hapus <span class="fst-italic">Donasi</span></h3>

        <div class="mb-3">
            <p>Apakah kamu yakin ingin menghapus donasi berikut?</p>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nama:</strong> {{ $donasi->nama_donasi }}</li>
                <li class="list-group-item"><strong>Target:</strong> Rp {{ number_format($donasi->target_donasi, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Kategori:</strong> {{ $donasi->kategori }}</li>
                <li class="list-group-item"><strong>Deskripsi:</strong> {{ $donasi->deskripsi }}</li>
            </ul>
        </div>

        <form method="POST" action="{{ route('donasi.destroy', $donasi->id) }}">
            @csrf
            @method('DELETE')

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('donasi.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-danger">Hapus Sekarang</button>
            </div>
        </form>
    </div>
</div>
@endsection
