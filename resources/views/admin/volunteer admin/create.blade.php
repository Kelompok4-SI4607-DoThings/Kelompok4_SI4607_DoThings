@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Volunteer</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('volunteers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="company_name">Nama Company</label>
                            <input type="text" name="company_name" class="form-control" id="company_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="category">Category Volunteer</label>
                            <input type="text" name="category" class="form-control" id="category" required>
                        </div>

                        <div class="form-group">
                            <label for="volunteer_name">Nama Volunteer</label>
                            <input type="text" name="volunteer_name" class="form-control" id="volunteer_name" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Lokasi Volunteer</label>
                            <input type="text" name="location" class="form-control" id="location" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Upload File Gambar</label>
                            <input type="file" name="image" class="form-control" id="image" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Add Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
