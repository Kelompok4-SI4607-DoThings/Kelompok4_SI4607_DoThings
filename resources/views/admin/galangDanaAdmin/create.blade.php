@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="fw-bold text-gradient mb-4 text-center">Kelola <span class="text-primary">Kategori</span></h2>
            
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Kategori Baru
                    </h5>
                    <form action="{{ route('galangDanaAdmin.storeCategory') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label for="category_name" class="form-label fw-semibold">Nama Kategori</label>
                                <input type="text" name="category_name" id="category_name" 
                                    class="form-control rounded-3 @error('category_name') is-invalid @enderror" 
                                    required>
                                @error('category_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="description" class="form-label fw-semibold">Deskripsi</label>
                                <input type="text" name="description" id="description" 
                                    class="form-control rounded-3 @error('description') is-invalid @enderror" 
                                    required>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-success rounded-pill px-4 w-100 fw-semibold shadow-sm">
                                    <i class="bi bi-plus-circle"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="bi bi-list-check"></i> Daftar Kategori
                    </h5>
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories ?? [] as $category)
                                <tr>
                                    <td class="fw-semibold">{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <span class="badge {{ $category->status === 'active' ? 'bg-success' : 'bg-danger' }} px-3 py-2 shadow-sm">
                                            {{ ucfirst($category->status) }}
                                        </span>
                                    </td>
                                    <td>
                                       
                                        <form action="{{ route('galangDanaAdmin.destroyCategory', $category->id) }}" 
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm"
                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        <i class="bi bi-info-circle me-2"></i>Belum ada kategori
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('galangDanaAdmin.index') }}" 
                    class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
@endsection