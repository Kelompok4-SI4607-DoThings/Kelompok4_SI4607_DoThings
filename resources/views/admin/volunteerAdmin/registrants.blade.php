@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4 text-gradient text-center">
        <i class="bi bi-people-fill text-info me-2"></i>
        Riwayat Pendaftar: <span class="text-primary">{{ $volunteer->name }}</span>
    </h2>
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 800px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover table-bordered rounded-4 overflow-hidden">
                    <thead class="table-info">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th class="text-center">Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registrants as $i => $registrant)
                            <tr>
                                <td class="text-center">{{ $i+1 }}</td>
                                <td class="fw-semibold"><i class="bi bi-person-circle me-1"></i>{{ $registrant->name }}</td>
                                <td><i class="bi bi-envelope me-1"></i>{{ $registrant->email }}</td>
                                <td class="text-center">{{ $registrant->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada pendaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('admin.volunteerAdmin.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
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
    .table thead th {
        vertical-align: middle;
    }
</style>
<br>
@endsection