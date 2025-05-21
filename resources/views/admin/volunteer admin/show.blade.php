@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Volunteer Details</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="company_name">Nama Company</label>
                        <p>{{ $volunteer->company_name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="category">Category Volunteer</label>
                        <p>{{ $volunteer->category }}</p>
                    </div>

                    <div class="form-group">
                        <label for="volunteer_name">Nama Volunteer</label>
                        <p>{{ $volunteer->volunteer_name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="location">Lokasi Volunteer</label>
                        <p>{{ $volunteer->location }}</p>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <p>{{ $volunteer->description }}</p>
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <div>
                            <img src="{{ asset('storage/' . $volunteer->image) }}" alt="Volunteer Image" class="img-fluid" style="max-width: 100%; height: auto;">
                        </div>
                    </div>

                    <a href="{{ route('volunteers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
