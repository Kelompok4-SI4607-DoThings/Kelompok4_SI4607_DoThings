@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-white">
    <!-- Background Images -->
    {{-- <div class="position-absolute top-0 start-0">
        <img src="{{ asset('images/hand-top.png') }}" alt="hand top" style="width: 180px;">
    </div>
    <div class="position-absolute bottom-0 end-0">
        <img src="{{ asset('images/hand-bottom.png') }}" alt="hand bottom" style="width: 180px;">
    </div> --}}

    <!-- Login Card -->
    <div class="card shadow p-4 border-0 rounded-4" style="max-width: 400px; width: 100%; z-index: 1;">
        <!-- Logo / Heading -->
        <div class="text-end">
            <h4 class="fw-bold mb-0">DO</h4>
            <h4 class="text-primary fw-bold">THINGS</h4>
        </div>

        <h5 class="text-center my-4">Login to your account</h5>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control" 
                    placeholder="Email" 
                    required 
                    value="{{ old('email') }}"
                >
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control" 
                    placeholder="Password" 
                    required
                >
            </div>

            <!-- Submit Button -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login now</button>
            </div>

            <!-- Register Link -->
            <p class="text-center small mb-0">
                Don’t have an account? 
                <a href="{{ route('register') }}">Sign Up</a>
            </p>
        </form>
    </div>
</div>
@endsection
