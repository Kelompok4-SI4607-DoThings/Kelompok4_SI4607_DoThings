@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Komunitas</h1>
    <form action="{{ route('admin.komunitasAdmin.update', $komunitas->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This method is required to send the PUT request -->
        
        <div class="form-group">
            <label for="judul_komunitas">Judul Komunitas</label>
            <input type="text" class="form-control" id="judul_komunitas" name="judul_komunitas" value="{{ old('judul_komunitas', $komunitas->judul_komunitas) }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_dibuat">Tanggal Dibuat</label>
            <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" value="{{ old('tanggal_dibuat', \Carbon\Carbon::parse($komunitas->tanggal_dibuat)->format('Y-m-d')) }}" required>
        </div>
        <div class="form-group">
            <label for="category">Content / Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $komunitas->category) }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $komunitas->deskripsi) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Komunitas</button>
    </form>
</div>
<br>
@endsection
