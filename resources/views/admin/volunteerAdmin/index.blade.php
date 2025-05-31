@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">New Volunteer</h2>
        <a href="{{ route('admin.volunteerAdmin.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Volunteer
        </a>
    </div>

    <div class="row">
        @foreach ($volunteers as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                @if ($item->image_path)
                <div class="overflow-hidden" style="height: 200px;">
                    <img src="{{ asset('storage/' . $item->image_path) }}" 
                        class="card-img-top img-fluid" 
                        style="object-fit: cover; height: 100%; transition: transform 0.3s ease;" 
                        onmouseover="this.style.transform='scale(1.05)'" 
                        onmouseout="this.style.transform='scale(1)'"
                        alt="Volunteer Image">
                </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary mb-2">{{ $item->category }}</span>
                    <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit($item->description, 80) }}</p>
                    
                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ route('admin.volunteerAdmin.show', $item->id) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-eye"></i> Read More
                        </a>
                        <a href="{{ route('admin.volunteerAdmin.edit', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.volunteerAdmin.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
@endsection
