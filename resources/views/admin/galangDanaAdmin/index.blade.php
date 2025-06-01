@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-gradient m-0">Daftar <span class="text-primary">Galang Dana</span></h2>
        <div class="d-flex gap-2">
            <a href="{{ route('galangDanaAdmin.createCategory') }}" class="btn btn-success rounded-pill px-4">
                <i class="bi bi-tags"></i> Kelola Kategori
            </a>
        </div>
    </div>


    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">
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
                        @foreach ($campaigns as $campaign)
                            <tr>
                                <td class="fw-semibold">{{ $campaign->title }}</td>
                                <td>{{ Str::limit($campaign->description, 50) }}</td>
                                <td class="text-success fw-bold">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-light text-primary px-3 py-2 shadow-sm">
                                        <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}
                                    </span>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $campaign->image) }}" alt="Gambar Kampanye" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit:cover;">
                                </td>
                                <td>
                                    <span class="badge {{ $campaign->status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }} px-3 py-2 shadow-sm text-capitalize">
                                        {{ $campaign->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('galangDanaAdmin.show', $campaign->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 mb-1">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <form action="{{ route('galangDanaAdmin.destroy', $campaign->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Yakin ingin menghapus kampanye ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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