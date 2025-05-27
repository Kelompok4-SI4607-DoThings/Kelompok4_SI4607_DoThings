@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Komunitas</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $komunitas->judul_komunitas }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Tanggal Dibuat:</strong> {{ \Carbon\Carbon::parse($komunitas->tanggal_dibuat)->format('d-m-Y') }}</p>
            <p><strong>Category:</strong> {{ $komunitas->category }}</p>
            <p><strong>Deskripsi:</strong> {{ $komunitas->deskripsi }}</p>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('admin.komunitasAdmin.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('admin.komunitasAdmin.edit', $komunitas->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection
