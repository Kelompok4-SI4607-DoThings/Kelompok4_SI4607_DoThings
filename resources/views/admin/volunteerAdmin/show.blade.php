@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Detail Volunteer</h2>

    <div class="card shadow-sm p-4">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-3">{{ $volunteeradmin->name }}</h3>
                <p><strong>Company:</strong> {{ $volunteeradmin->company_name }}</p>
                <p><strong>Category:</strong> {{ $volunteeradmin->category }}</p>
                <p><strong>Location:</strong> {{ $volunteeradmin->location }}</p>
                <p>{{ $volunteeradmin->description }}</p>
            </div>

            <div class="col-md-6 text-center">
                @if ($volunteeradmin->image_path)
                    <img src="{{ asset('storage/' . $volunteeradmin->image_path) }}"
                        class="img-fluid rounded" style="max-height: 300px;" alt="Volunteer Image">
                @else
                    <p class="text-muted">No image available</p>
                @endif
            </div>
        </div>
    </div>

    <a href="{{ route('admin.volunteerAdmin.index') }}" class="btn btn-secondary mt-4">← Back to List</a>
</div>
@endsection
