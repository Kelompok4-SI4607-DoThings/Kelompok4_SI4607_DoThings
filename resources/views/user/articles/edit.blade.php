<!-- resources/views/user/articles/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 600px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient text-center">Edit <span class="text-primary">Artikel</span></h2>
            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Artikel</label>
                    <input type="text" name="title" id="title" class="form-control rounded-3" value="{{ old('title', $article->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label fw-semibold">Penulis</label>
                    <input type="text" name="author" id="author" class="form-control rounded-3" value="{{ old('author', $article->author) }}" required>
                </div>

                <div class="mb-3">
                    <label for="published_at" class="form-label fw-semibold">Tanggal Terbit</label>
                    <input type="date" name="published_at" id="published_at" class="form-control rounded-3" value="{{ old('published_at', $article->published_at ? $article->published_at->format('Y-m-d') : '') }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Konten Artikel</label>
                    <textarea name="content" id="content" class="form-control rounded-3" rows="5" required>{{ old('content', $article->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold">Foto Artikel</label>
                    <input type="file" name="image" id="image" class="form-control rounded-3">
                    @if ($article->image)
                        <div class="mt-2">
                            <p class="mb-1"><strong>Foto Saat Ini:</strong></p>
                            <img src="{{ asset('images/' . $article->image) }}" alt="Article Image" class="rounded shadow" style="width: 150px; height: auto;">
                        </div>
                    @endif
                </div>

                <div class="d-flex gap-2 justify-content-center mt-4">
                    <button type="submit" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-pencil-square"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
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
