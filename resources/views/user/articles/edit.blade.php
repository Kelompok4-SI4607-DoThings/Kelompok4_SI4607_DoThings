<!-- resources/views/user/articles/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Artikel</h2>
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Judul Artikel</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>
        
        <div class="form-group">
            <label for="author">Penulis</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $article->author) }}" required>
        </div>
        
        <div class="form-group">
            <label for="published_at">Tanggal Terbit</label>
            <input type="date" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', $article->published_at ? $article->published_at->format('Y-m-d') : '') }}">
        </div>

        <div class="form-group">
            <label for="content">Konten Artikel</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $article->content) }}</textarea>
        </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold">Foto Artikel</label>
                    <input type="file" name="image" id="image" class="form-control rounded-3">
                    @if ($article->image)
                        <div class="mt-2">
                            <p class="mb-1"><strong>Foto Saat Ini:</strong></p>
                            <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="rounded shadow" style="width: 150px; height: auto;">
                        </div>
                    @endif
                </div>

        <button type="submit" class="btn btn-success mt-3">Simpan Perubahan</button>
    </form>

    <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Artikel</a>
</div>
@endsection
