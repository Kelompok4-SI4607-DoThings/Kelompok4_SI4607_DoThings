@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 fw-bold text-primary">Ruang Obrolan: {{ $komunitas->judul_komunitas ?? $komunitas->name ?? '-' }}</h2>
    <div class="mb-4">
        <a href="{{ route('community.chat.index') }}" class="btn btn-secondary btn-sm rounded-pill">← Daftar Komunitas</a>
    </div>
    <div class="card mb-3 shadow-sm" style="max-height: 400px; overflow-y: auto;">
        <div class="card-body px-4 py-3">
            @forelse($chats as $chat)
                <div class="mb-3 d-flex {{ $chat->user_id == Auth::id() ? 'justify-content-end' : 'justify-content-start' }}">
                    <div style="max-width: 70%;">
                        <div class="d-flex align-items-center mb-1">
                            <span class="fw-semibold {{ $chat->user_id == Auth::id() ? 'text-primary' : 'text-dark' }}">
                                {{ $chat->user->name }}
                            </span>
                            <span class="text-muted small ms-2">{{ $chat->created_at->format('d M Y H:i') }}</span>
                            @if($chat->user_id == Auth::id())
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-sm btn-link text-warning ms-2 p-0" data-bs-toggle="modal" data-bs-target="#editChatModal{{ $chat->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <!-- Tombol Delete -->
                                <form action="{{ route('community.chat.delete', [$komunitas->id, $chat->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus pesan ini?')" class="btn btn-sm btn-link text-danger p-0"><i class="bi bi-trash"></i></button>
                                </form>
                            @endif
                        </div>
                        <div class="p-2 rounded-3 {{ $chat->user_id == Auth::id() ? 'bg-primary text-white' : 'bg-light' }}">
                            {{ $chat->message }}
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Pesan -->
                <div class="modal fade" id="editChatModal{{ $chat->id }}" tabindex="-1" aria-labelledby="editChatModalLabel{{ $chat->id }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('community.chat.update', [$komunitas->id, $chat->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editChatModalLabel{{ $chat->id }}">Edit Pesan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <textarea name="message" class="form-control" rows="3" required>{{ $chat->message }}</textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
            @empty
                <p class="text-muted text-center">Belum ada pesan.</p>
            @endforelse
        </div>
    </div>
    <form action="{{ route('community.chat.store', $komunitas->id) }}" method="POST" class="mt-3">
        @csrf
        <div class="input-group">
            <textarea name="message" class="form-control rounded-start-pill" rows="1" placeholder="Tulis pesan..." required style="resize:none"></textarea>
            <button type="submit" class="btn btn-primary rounded-end-pill px-4">Kirim</button>
        </div>
    </form>
</div>
<br>
@endsection