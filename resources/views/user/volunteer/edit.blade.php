@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 550px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4 text-gradient text-center">Edit <span class="text-primary">Volunteer</span></h2>

            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('volunteer.update', $volunteer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama</label>
                    <input type="text" name="name" class="form-control rounded-3" value="{{ old('name', $volunteer->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control rounded-3" value="{{ old('email', $volunteer->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">Telepon</label>
                    <input type="text" name="phone" class="form-control rounded-3" value="{{ old('phone', $volunteer->phone) }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-semibold">Alamat</label>
                    <textarea name="address" class="form-control rounded-3" required>{{ old('address', $volunteer->address) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="laki laki" id="genderL" {{ $volunteer->gender == 'laki laki' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genderL">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="perempuan" id="genderP" {{ $volunteer->gender == 'perempuan' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genderP">Perempuan</label>
                    </div>
                </div>

                <div class="d-flex gap-2 justify-content-center mt-4">
                    <button type="submit" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-pencil-square"></i> Update
                    </button>
                    <a href="{{ route('volunteer.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-arrow-left"></i> Batal
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
