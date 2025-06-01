<!-- resources/views/user/artikel/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Daftar Artikel</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-md-4">
            <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden">
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Article image" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-primary">{{ $article->title }}</h5>
                    <p class="card-text small mb-3">{{ \Str::limit($article->content, 100) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info btn-sm rounded-pill px-3 shadow-sm">
                            <i class="bi bi-eye"></i> Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
