<!-- resources/views/user/artikel/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $article->title }}</h2>
    <p><strong>Penulis:</strong> {{ $article->author }}</p>
    <p><strong>Dipublikasikan:</strong> {{ $article->published_at ? $article->published_at->format('d M Y') : 'Belum Dipublikasikan' }}</p>
    <div class="card">
        <div class="card-body">
            <p>{{ $article->content }}</p>
        </div>
    </div>
    
    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning mt-3 mb-3">Edit Artikel</a>
    
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3 mb-3">Hapus Artikel</button>
    </form>
</div>
@endsection