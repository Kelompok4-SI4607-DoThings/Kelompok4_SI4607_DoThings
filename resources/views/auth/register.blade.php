@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4 shadow rounded" style="width: 100%; max-width: 420px;">
        <h4 class="text-center mb-4">Create an Account</h4>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama -->
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Full Name:" required value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email:" required value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Enter your password:" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password:" required>
            </div>

            <!-- Role -->
            {{-- <div class="mb-3">
                <select name="role" class="form-select" required>
                    <option value="" disabled selected>Register as...</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div> --}}

            <button type="submit" class="btn btn-primary w-100">Create Account</button>
        </form>


        <div class="text-center mt-3">
            Already have an account? <a href="{{ route('login') }}">Log In Here!</a>
        </div>
    </div>
</div>
@endsection