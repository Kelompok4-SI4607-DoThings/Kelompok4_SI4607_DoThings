@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-4xl p-4">
    <!-- Judul komunitas -->
    <h1 class="text-3xl font-bold mb-4">{{ $community->name }}</h1>

    <!-- Deskripsi komunitas -->
    <p class="mb-6">{{ $community->description }}</p>

    <!-- Informasi pemilik komunitas -->
    <p class="mb-6 text-sm text-gray-600">Dibuat oleh: {{ $community->user->name }}</p>

    <!-- Daftar pesan chatting komunitas -->
    <div class="border rounded p-4 mb-4 max-h-[400px] overflow-y-auto bg-gray-50">
        @foreach($community->messages as $msg)
            <div class="mb-3 flex {{ $msg->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="bg-blue-300 px-4 py-2 rounded max-w-xs break-words">
                    <strong>{{ $msg->user->name }}</strong><br>
                    <span>{{ $msg->message }}</span>
                    <div class="text-xs text-gray-600 mt-1">{{ $msg->created_at->diffForHumans() }}</div>
                </div>

                @if($msg->user_id === auth()->id())
                    <form action="{{ route('community.messages.destroy', $msg) }}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Form input kirim pesan baru -->
    <form action="{{ route('community.messages.store', $community) }}" method="POST" class="flex gap-2">
        @csrf
        <input type="text" name="message" placeholder="Tulis pesan..." required
               class="flex-grow border rounded px-4 py-2" />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Kirim
        </button>
    </form>
</div>
@endsections