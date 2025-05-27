<!-- resources/views/user/artikel/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $article->title }}</h2>
    <p><strong>Penulis:</strong> {{ $article->author }}</p>
    <p><strong>Dipublikasikan:</strong> {{ $article->published_at ? $article->published_at->format('d M Y') : 'Belum Dipublikasikan' }}</p>
    
    <!-- Menampilkan Foto Artikel -->
    @if ($article->image)
        <div class="mt-3">
            <p><strong>Foto Artikel:</strong></p>
            <img src="{{ asset('images/' . $article->image) }}" alt="Article Image" class="img-fluid" style="width: 100%; max-width: 500px;">
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-body">
            <p>{{ $article->content }}</p>
        </div>
    </div>
    
    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning mt-3">Edit Artikel</a>
    
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Hapus Artikel</button>
    </form>
</div>
@endsection
