@extends('layouts.app')

@section('content')
<div class="container">
    <div class="profile-header d-flex align-items-center">
        <img src="{{ asset('images/' . $user->profile_picture) }}" alt="Foto Profil" class="profile-img rounded-circle" width="80">
        <div class="ml-3">
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->phone_number }}</p>
        </div>
       
    </div>

    <div class="profile-info mt-4 p-4 border rounded shadow mb-5"> <!-- Add margin-bottom here -->
        <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Input Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required readonly>
            </div>

            <!-- Input Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required readonly>
            </div>

            <!-- Input Role -->
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $user->role) }}" readonly>
            </div>

            <!-- Foto Profil -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Foto Profil</label>
                <div>
                    @if($user->profile_picture)
                        <img src="{{ asset('images/' . $user->profile_picture) }}" alt="Foto Profil" width="150" class="img-thumbnail">
                    @else
                        <p>Foto profil belum diunggah.</p>
                    @endif
                </div>
            </div>

            <!-- Input Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" readonly>
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <!-- Input Konfirmasi Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" readonly>
            </div>

            <!-- Tombol Update Profil -->
            <button type="submit" class="btn btn-primary">Update Profil Sekarang</button>
        </form>
    </div>
</div>

@endsection

@push('styles')
<style>
    .profile-header {
        background-color: #f4f7fc;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .profile-header img {
        border: 3px solid #ddd;
    }

    .profile-info {
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .profile-img {
        border: 3px solid #007bff;
    }
</style>
@endpush
