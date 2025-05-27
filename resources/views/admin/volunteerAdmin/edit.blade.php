@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Edit Volunteer</h2>
    <form action="{{ route('admin.volunteerAdmin.update', $volunteeradmin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input class="form-control mb-3" name="company_name" value="{{ $volunteeradmin->company_name }}" placeholder="Nama Company">
        <input class="form-control mb-3" name="category" value="{{ $volunteeradmin->category }}" placeholder="Category Volunteer">
        <input class="form-control mb-3" name="name" value="{{ $volunteeradmin->name }}" placeholder="Judul Volunteer">
        <input class="form-control mb-3" name="location" value="{{ $volunteeradmin->location }}" placeholder="Lokasi Volunteer">
        <textarea class="form-control mb-3" name="description" placeholder="Deskripsi">{{ $volunteeradmin->description }}</textarea>
        <label>Upload File Gambar</label>
        <input type="file" name="image" class="form-control mb-3">
        @if ($volunteeradmin->image_path)
            <img src="{{ asset('storage/' . $volunteeradmin->image_path) }}" width="150">
        @endif
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection