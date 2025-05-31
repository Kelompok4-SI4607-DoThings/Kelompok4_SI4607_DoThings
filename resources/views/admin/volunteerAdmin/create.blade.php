@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Add <strong>Volunteer</strong></h2>
    <form action="{{ route('admin.volunteerAdmin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control mb-3" name="company_name" placeholder="Nama Company">
        <input class="form-control mb-3" name="category" placeholder="Category Volunteer">
        <input class="form-control mb-3" name="name" placeholder="Judul Volunteer">
        <input class="form-control mb-3" name="location" placeholder="Lokasi Volunteer">
        <textarea class="form-control mb-3" name="description" placeholder="Deskripsi"></textarea>
        <label>Upload File Gambar</label>
        <input type="file" name="image" class="form-control mb-3">
        <button class="btn btn-primary">Add New</button>
    </form>
</div>
<br>
@endsection