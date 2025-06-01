@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 650px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient">Detail <span class="text-primary">Galang Dana</span></h2>
            <table class="table align-middle table-bordered rounded-4 overflow-hidden mb-4">
                <tbody>
                    <tr>
                        <th class="bg-light" style="width: 30%;">Judul</th>
                        <td>{{ $campaign->title }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Deskripsi</th>
                        <td>{{ $campaign->description }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Target</th>
                        <td class="fw-bold text-success">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Status</th>
                        <td>
                            <span class="badge {{ $campaign->status == 'pending' ? 'bg-warning text-dark' : ($campaign->status == 'approved' ? 'bg-success' : 'bg-danger') }} px-3 py-2 shadow-sm text-capitalize">
                                {{ ucfirst($campaign->status) }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <form action="{{ route('galangDanaAdmin.update', $campaign->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select name="status" id="status" class="form-select rounded-3">
                        <option value="approved" {{ $campaign->status === 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $campaign->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="suggestions" class="form-label fw-semibold">Saran</label>
                    <textarea name="suggestions" id="suggestions" class="form-control rounded-3" rows="4" placeholder="Tulis saran jika ada...">{{ $campaign->suggestions }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-check-circle"></i> Simpan
                    </button>
                    <a href="{{ route('galangDanaAdmin.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
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