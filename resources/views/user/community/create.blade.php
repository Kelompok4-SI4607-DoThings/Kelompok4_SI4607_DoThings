@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Komunitas Baru</h1>
    <form action="{{ route('communities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Komunitas</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="category">Kategori</label>
            <select class="form-control" id="category" name="category" required>
                <option value="Bencana Alam">Bencana Alam</option>
                <option value="Kemiskinan">Kemiskinan</option>
                <option value="Lingkungan">Lingkungan</option>
                <option value="Pendidikan">Pendidikan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Gambar Komunitas</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Buat Komunitas</button>
    </form>
</div>
@endsection