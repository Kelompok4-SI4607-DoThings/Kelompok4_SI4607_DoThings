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
            <div class="text-center d-flex justify-content-center gap-2 mb-4">
                <a href="{{ route('admin.komunitasAdmin.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.komunitasAdmin.edit', $komunitas->id) }}" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
            </div>

            <h4 class="fw-bold text-gradient mb-3 mt-4"><i class="bi bi-chat-dots-fill text-primary me-2"></i>Rekam Jejak Chat Komunitas</h4>
            <div class="card shadow-sm border-0 rounded-4 mb-2" style="background: #f8fafc; max-height: 300px; overflow-y: auto;">
                <div class="card-body px-4 py-3">
                    @forelse($komunitas->chats as $chat)
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-1">
                                <span class="fw-semibold text-primary" style="font-size:1.05rem;">
                                    <i class="bi bi-person-circle me-1"></i>
                                    {{ $chat->user->name ?? 'User' }}
                                </span>
                                <span class="text-muted small ms-2" style="font-size:0.95rem;">{{ $chat->created_at->format('d M Y H:i') }}</span>
                            </div>
                            <div class="p-2 rounded-3 bg-light shadow-sm" style="font-size:1.08rem;">
                                {{ $chat->message }}
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center mb-0">Belum ada chat pada komunitas ini.</p>
                    @endforelse
                </div>
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
