@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Komunitas</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('communities.create') }}" class="btn btn-primary mb-3">Buat Komunitas Baru</a>

    @if ($communities->isEmpty())
        <p>Tidak ada komunitas.</p>
    @else
        <ul class="list-group">
            @foreach ($communities as $community)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $community->name }}</strong><br>
                        <small>{{ $community->description }}</small>
                    </div>

                    <div>
                        <a href="{{ route('communities.edit', $community->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>

                        <form action="{{ route('communities.destroy', $community->id) }}" method="POST" onsubmit="return confirm('Yakin hapus komunitas ini?')" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection