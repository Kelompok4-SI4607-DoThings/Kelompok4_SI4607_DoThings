@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Komunitas</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan pada input:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('communities.update', $community->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Komunitas</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $community->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Komunitas</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $community->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('communities.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection