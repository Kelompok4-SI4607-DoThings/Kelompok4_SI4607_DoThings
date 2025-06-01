<!-- resources/views/user/artikel/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-gradient text-center">Daftar <span class="text-primary">Artikel</span></h2>
    <div class="d-flex justify-content-center mb-4">
        <a href="{{ route('articles.create') }}" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Artikel
        </a>
    </div>
    <div class="row g-4">
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
        @if($articles->isEmpty())
        <div class="col-12">
            <div class="alert alert-info text-center shadow-sm">Belum ada artikel tersedia.</div>
        </div>
        @endif
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
