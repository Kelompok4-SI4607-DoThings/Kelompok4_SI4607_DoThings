@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Form Galang Dana --}}
    <div class="card border-0 shadow-lg rounded-4 mb-5">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient text-center">
                Buat <span class="text-primary">Galang Dana</span> Baru
            </h2>
            
            <form action="{{ route('GalangDana.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Galang Dana</label>
                    <input type="text" name="title" id="title" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control rounded-3" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="target_amount" class="form-label fw-semibold">Target Donasi</label>
                    <input type="number" name="target_amount" id="target_amount" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label fw-semibold">Batas Waktu</label>
                    <input type="date" name="deadline" id="deadline" class="form-control rounded-3" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Gambar Galang Dana</label>
                    <input type="file" name="image" id="image" class="form-control rounded-3" required>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-plus-circle"></i> Ajukan Galang Dana
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Daftar Kategori --}}
    <div class="card border-0 shadow-lg rounded-4 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-4 text-primary">
                <i class="bi bi-tags"></i> Daftar Kategori Galang Dana (Rekomendasi)
            </h5>
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="fw-semibold">{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center py-4 text-muted">
                                    <i class="bi bi-info-circle me-2"></i>Belum ada kategori tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Daftar Galang Dana --}}
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">
            <h2 class="fw-bold mb-4 text-gradient">
                Daftar <span class="text-primary">Galang Dana</span>
            </h2>
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Target</th>
                            <th>Batas Waktu</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($campaigns as $campaign)
                            <tr>
                                <td class="fw-semibold">{{ $campaign->title }}</td>
                                <td>{{ Str::limit($campaign->description, 60) }}</td>
                                <td class="text-success fw-bold">
                                    Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                                </td>
                                <td>
                                    <span class="badge bg-light text-primary px-3 py-2 shadow-sm">
                                        <i class="bi bi-calendar-event"></i>
                                        {{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}
                                    </span>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $campaign->image) }}" 
                                         alt="Gambar Kampanye" 
                                         class="rounded shadow-sm" 
                                         style="width: 90px; height: 60px; object-fit:cover;">
                                </td>
                                <td>
                                    <span class="badge {{ $campaign->status == 'pending' ? 'bg-warning text-dark' : 
                                        ($campaign->status == 'approved' ? 'bg-success' : 'bg-danger') }} 
                                        px-3 py-2 shadow-sm text-capitalize">
                                        {{ ucfirst($campaign->status) }}
                                    </span>
                                    @if($campaign->status === 'rejected' && $campaign->suggestions)
                                        <div class="mt-2">
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#suggestionModal{{ $campaign->id }}">
                                                <i class="bi bi-info-circle"></i> Lihat Catatan Admin
                                            </button>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="suggestionModal{{ $campaign->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Catatan Admin</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-danger">
                                                            {{ $campaign->suggestions }}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('GalangDana.edit', $campaign->id) }}" 
                                        class="btn btn-outline-primary btn-sm rounded-pill px-3 mb-1">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="bi bi-info-circle me-2"></i>Belum ada galang dana
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .table-responsive {
        border-radius: 0.5rem;
    }
    
    .table th {
        border-top: none;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endpush

@endsection