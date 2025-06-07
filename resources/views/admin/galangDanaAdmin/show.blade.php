@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 750px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient">Detail <span class="text-primary">Galang Dana</span></h2>
            
            <!-- Informasi Campaign -->
            <div class="row mb-4">
                <div class="col-md-5">
                    <img src="{{ asset('storage/' . $campaign->image) }}" 
                         class="img-fluid rounded-4 shadow-sm mb-3" 
                         alt="Campaign Image"
                         style="width:100%; height:200px; object-fit:cover;">
                         
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-person-circle text-primary"></i> Info Penggalang Dana
                            </h6>
                            <p class="mb-2">
                                <i class="bi bi-person text-muted me-2"></i>{{ $campaign->user?->name ?? 'User tidak ditemukan' }}
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-calendar2-check text-muted me-2"></i>Dibuat pada {{ $campaign->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-7">
                    <div class="mb-4">
                        <h5 class="fw-bold text-primary mb-3">{{ $campaign->title }}</h5>
                        <p class="text-muted">{{ $campaign->description }}</p>
                    </div>

                    <!-- Progress & Statistics -->
                    <div class="progress mb-3" style="height: 20px;">
                        <div class="progress-bar bg-success fw-semibold" 
                             role="progressbar" 
                             style="width: {{ ($campaign->current_amount / $campaign->target_amount) * 100 }}%">
                            {{ number_format(($campaign->current_amount / $campaign->target_amount) * 100, 1) }}%
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="border rounded-4 p-3">
                                <h6 class="text-muted mb-1">Target Donasi</h6>
                                <h4 class="text-primary mb-0">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded-4 p-3">
                                <h6 class="text-muted mb-1">Terkumpul</h6>
                                <h4 class="text-success mb-0">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="card border-0 bg-light rounded-4 mb-4">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <p class="mb-1 text-muted">Status Campaign</p>
                                    <span class="badge {{ $campaign->status == 'pending' ? 'bg-warning text-dark' : ($campaign->status == 'approved' ? 'bg-success' : 'bg-danger') }} px-3 py-2">
                                        {{ ucfirst($campaign->status) }}
                                    </span>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 text-muted">Deadline</p>
                                    <h6 class="mb-0">{{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}</h6>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 text-muted">Total Donatur</p>
                                    <h6 class="mb-0">{{ $campaign->donations->count() }} Orang</h6>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 text-muted">Sisa Waktu</p>
                                    <h6 class="mb-0">
                                        @php
                                            $deadline = \Carbon\Carbon::parse($campaign->deadline);
                                            $now = \Carbon\Carbon::now();
                                        @endphp
                                        @if($now->gt($deadline))
                                            <span class="text-danger">Sudah Berakhir</span>
                                        @else
                                            {{ floor($now->diffInDays($deadline)) }} Hari Lagi
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Update Status -->
            <form action="{{ route('galangDanaAdmin.update', $campaign->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">Update Status</label>
                    <select name="status" id="status" class="form-select rounded-3 {{ $campaign->status === 'rejected' ? 'text-danger' : 'text-success' }}">
                        <option value="approved" {{ $campaign->status === 'approved' ? 'selected' : '' }} class="text-success">
                            Approved
                        </option>
                        <option value="rejected" {{ $campaign->status === 'rejected' ? 'selected' : '' }} class="text-danger">
                            Rejected
                        </option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="suggestions" class="form-label fw-semibold">Catatan Admin</label>
                    <textarea name="suggestions" id="suggestions" class="form-control rounded-3" 
                              rows="4" placeholder="Tulis catatan atau saran untuk penggalang dana...">{{ $campaign->suggestions }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-check-circle"></i> Simpan Perubahan
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

<script>
document.getElementById('status').addEventListener('change', function() {
    this.className = 'form-select rounded-3 ' + (this.value === 'rejected' ? 'text-danger' : 'text-success');
});
</script>
@endsection