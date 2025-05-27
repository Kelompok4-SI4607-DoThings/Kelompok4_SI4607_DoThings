@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Komunitas List</h2>
        {{-- Link to create new community --}}
        <a href="{{ route('admin.komunitasAdmin.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Komunitas
        </a>
    </div>

    {{-- Success notification display --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @foreach($komunitas as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden h-100">
                    {{-- Display community image --}}
                    @if ($item->image_path)
                        <div class="overflow-hidden" style="height: 200px;">
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top img-fluid" style="object-fit: cover; height: 100%; transition: transform 0.3s ease;" 
                                onmouseover="this.style.transform='scale(1.05)'" 
                                onmouseout="this.style.transform='scale(1)'"
                                alt="Community Image">
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary mb-2">{{ $item->category }}</span>
                        <h5 class="card-title fw-bold">{{ $item->judul_komunitas }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($item->deskripsi, 80) }}</p>
                        
                        <div class="mt-auto d-flex gap-2">
                            {{-- View button --}}
                            <a href="{{ route('admin.komunitasAdmin.show', $item->id) }}" class="btn btn-primary btn-sm d-flex align-items-center">
                                <i class="bi bi-eye"></i> Read More
                            </a>
                            {{-- Edit button --}}
                            <a href="{{ route('admin.komunitasAdmin.edit', $item->id) }}" class="btn btn-warning btn-sm d-flex align-items-center">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            {{-- Delete button --}}
                            <form action="{{ route('admin.komunitasAdmin.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komunitas ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {!! $komunitas->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
