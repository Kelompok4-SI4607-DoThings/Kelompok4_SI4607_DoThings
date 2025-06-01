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
