@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 600px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient text-center">Detail <span class="text-primary">Komunitas</span></h2>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item py-3">
                    <strong>Judul Komunitas:</strong>
                    <span class="float-end">{{ $komunitas->judul_komunitas }}</span>
                </li>
                <li class="list-group-item py-3">
                    <strong>Tanggal Dibuat:</strong>
                    <span class="float-end">{{ \Carbon\Carbon::parse($komunitas->tanggal_dibuat)->format('d-m-Y') }}</span>
                </li>
                <li class="list-group-item py-3">
                    <strong>Kategori:</strong>
                    <span class="float-end">{{ $komunitas->category }}</span>
                </li>
                <li class="list-group-item py-3">
                    <strong>Deskripsi:</strong>
                    <span class="float-end text-end" style="max-width: 350px; display: inline-block;">{{ $komunitas->deskripsi }}</span>
                </li>
            </ul>
            <div class="text-center d-flex justify-content-center gap-2">
                <a href="{{ route('admin.komunitasAdmin.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.komunitasAdmin.edit', $komunitas->id) }}" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-pencil-square"></i> Edit
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
