<!-- resources/views/user/artikel/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Daftar Artikel</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src='{{ asset('images/' . $article->image) }}' class="card-img-top" alt="Article image">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ \Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
