@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4 text-gradient">Data <span class="text-primary">Zakat</span></h2>
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pembayar Zakat</th>
                            <th>Penghasilan Perbulan</th>
                            <th>Panti Asuhan</th>
                            <th>Status Bayar</th>
                            <th>Status Admin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zakats as $zakat)
                            <tr>
                                <td class="fw-semibold">{{ $zakat->nama_pembayar_zakat }}</td>
                                <td>Rp {{ number_format($zakat->penghasilan_perbulan, 0, ',', '.') }}</td>
                                <td>{{ $zakat->pantiasuhan }}</td>
                                <td>
                                    @if ($zakat->is_paid)
                                        <span class="badge bg-success px-3 py-2 shadow-sm">Sudah Dibayar</span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2 shadow-sm">Belum Dibayar</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $zakat->status === 'Pending' ? 'bg-warning text-dark' : 'bg-success' }} px-3 py-2 shadow-sm text-capitalize">
                                        {{ $zakat->status }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Form untuk mengubah status -->
                                    <form action="{{ route('zakatAdmin.updateStatus', $zakat->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-select form-select-sm d-inline-block w-auto rounded-pill shadow-sm" style="min-width:110px;" onchange="this.form.submit()">
                                            <option value="Pending" {{ $zakat->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Completed" {{ $zakat->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>
                                    <!-- Tombol Show -->
                                    <a href="{{ route('zakatAdmin.show', $zakat->id) }}" class="btn btn-info btn-sm rounded-pill px-3 shadow-sm mb-1">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('zakatAdmin.destroy', $zakat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm">
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
</style>
@endsection