@extends('layouts.app')

@section('content')
<div class="container">
    <div class="profile-header d-flex align-items-center mb-4">
        <img src="{{ asset('images/' . $user->profile_picture) }}" alt="Foto Profil" class="profile-img rounded-circle" width="80">
        <div class="ml-3">
            <h2>Edit Profil</h2>
            <p class="text-muted">{{ $user->name }}</p>
        </div>
    </div>

    <div class="profile-info p-4 border rounded shadow mb-5">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Input Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Input Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Input Role -->
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $user->role) }}"readonly>
            </div>

            <!-- Foto Profil -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Foto Profil</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                @if($user->profile_picture)
                    <img src="{{ asset('images/' . $user->profile_picture) }}" alt="Foto Profil" width="100" class="mt-2">
                @endif
            </div>

            <!-- Input Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <!-- Input Konfirmasi Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <!-- Tombol Update Profil -->
            <button type="submit" class="btn btn-primary w-100">Update Profil</button>
        </form>
        <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini? Semua data Anda akan hilang.')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100 mt-3">Hapus Akun</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Styling untuk header profil dengan foto dan nama */
    .profile-header {
        background-color: #f4f7fc;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-img {
        border: 3px solid #ddd;
    }

    .profile-info {
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    /* Styling form */
    .form-control {
        border-radius: 8px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 12px;
        font-size: 16px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    /* Styling gambar profil */
    img {
        max-width: 100%;
        border-radius: 5px;
    }
</style>
@endpush
