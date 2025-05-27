@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Komunitas</h1>
    <form action="{{ route('admin.komunitasAdmin.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul_komunitas">Judul Komunitas</label>
            <input type="text" class="form-control" id="judul_komunitas" name="judul_komunitas" required>
        </div>
        <div class="form-group">
            <label for="tanggal_dibuat">Tanggal Dibuat</label>
            <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" required>
        </div>
        <div class="form-group">
            <label for="category">Content / Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Now</button>
    </form>
</div>
@endsection
