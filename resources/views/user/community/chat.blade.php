@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 fw-bold text-primary">Ruang Obrolan: {{ $komunitas->judul_komunitas ?? $komunitas->name ?? '-' }}</h2>
    <div class="mb-4">
        <a href="{{ route('community.chat.index') }}" class="btn btn-secondary btn-sm rounded-pill">← Daftar Komunitas</a>
    </div>
    <div class="card mb-3 shadow-sm" style="overflow-y: auto; max-height: 400px;">
        <div class="card-body px-4 py-3" id="chat-body">
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
            @empty
                <p class="text-muted text-center">Belum ada pesan.</p>
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
            <textarea name="message" class="form-control rounded-3" rows="3" placeholder="Tulis pesan..." required style="resize:vertical"></textarea>
        </div>
        <button type="submit" class="btn btn-primary px-4 rounded-pill">Kirim</button>
    </form>
</div>
<br>
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