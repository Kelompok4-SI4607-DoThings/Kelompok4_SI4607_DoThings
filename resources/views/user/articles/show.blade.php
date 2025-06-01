<!-- resources/views/user/artikel/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 700px;">
        <div class="card-body p-5">
            <h2 class="fw-bold text-gradient mb-2 text-center">{{ $article->title }}</h2>
            <div class="d-flex justify-content-center mb-3 gap-2 flex-wrap">
                <span class="badge bg-info text-dark"><i class="bi bi-person"></i> {{ $article->author }}</span>
                <span class="badge bg-light text-primary"><i class="bi bi-calendar-event"></i> {{ $article->published_at ? $article->published_at->format('d M Y') : 'Belum Dipublikasikan' }}</span>
            </div>
            @if ($article->image)
                <div class="text-center mb-4">

                    <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="img-fluid rounded-4 shadow" style="max-width: 500px;">

                </div>
            @endif

            <div class="card border-0 shadow-sm mb-4 bg-light">
                <div class="card-body px-4 py-3">
                    <p class="mb-0 fs-5" style="white-space: pre-line;">{{ $article->content }}</p>
                </div>
            </div>
            <div class="d-flex gap-2 justify-content-center mt-4 flex-wrap">
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-pencil-square"></i> Edit Artikel
                </a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-trash"></i> Hapus Artikel
                    </button>
                </form>
                <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
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
