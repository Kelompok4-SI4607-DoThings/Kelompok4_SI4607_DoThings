@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 fw-bold text-gradient text-center" style="font-size:2.1rem;">
        <i class="bi bi-chat-dots-fill text-primary me-2"></i>
        Ruang Obrolan: {{ $komunitas->judul_komunitas ?? $komunitas->name ?? '-' }}
    </h2>
    <div class="mb-4 text-center">
        <a href="{{ route('community.chat.index') }}" class="btn btn-secondary btn-sm rounded-pill px-4">
            ← Daftar Komunitas
        </a>
    </div>
    <div class="card mb-3 shadow-sm" style="overflow-y: auto; max-height: 420px; background: #f8fafc;">
        <div class="card-body px-4 py-3" id="chat-body">
            @forelse($chats as $chat)
                <div class="mb-3 d-flex {{ $chat->user_id == Auth::id() ? 'justify-content-end' : 'justify-content-start' }}">
                    <div style="max-width: 75%;">
                        <div class="d-flex align-items-center mb-1">
                            <span class="fw-semibold {{ $chat->user_id == Auth::id() ? 'text-primary' : 'text-dark' }}" style="font-size:1.1rem;">
                                <i class="bi {{ $chat->user_id == Auth::id() ? 'bi-person-fill' : 'bi-person' }} me-1"></i>
                                {{ $chat->user->name }}
                            </span>
                            <span class="text-muted small ms-2" style="font-size:0.95rem;">{{ $chat->created_at->format('d M Y H:i') }}</span>
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
                        <div class="p-3 rounded-4 shadow-sm mb-1 {{ $chat->user_id == Auth::id() ? 'bg-primary text-white' : 'bg-light' }}" style="font-size:1.15rem;">
                            {{ $chat->message }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center" style="font-size:1.1rem;">Belum ada pesan.</p>
            @endforelse
        </div>
    </div>

    {{-- Modal Edit Pesan, letakkan di luar .card-body --}}
    @foreach($chats as $chat)
        @if($chat->user_id == Auth::id())
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
        @endif
    @endforeach

    <form action="{{ route('community.chat.store', $komunitas->id) }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-2">
            <textarea name="message" class="form-control rounded-3" rows="3" placeholder="Tulis pesan..." required style="resize:vertical; font-size:1.15rem;"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-semibold shadow-sm" style="font-size:1.1rem;">
                <i class="bi bi-send-fill me-1"></i> Kirim
            </button>
        </div>
    </form>
</div>
<br>
<style>
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    #chat-body::-webkit-scrollbar {
        width: 8px;
        background: #e9ecef;
        border-radius: 8px;
    }
    #chat-body::-webkit-scrollbar-thumb {
        background: #b2dfdb;
        border-radius: 8px;
    }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var chatBody = document.getElementById('chat-body');
            if(chatBody){
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        }, 200); // 200ms, bisa diperbesar jika masih gagal
    });
</script>
@endpush