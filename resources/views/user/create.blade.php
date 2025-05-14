@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Formulir Pendaftaran Volunteer</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('volunteer.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="motivasi" class="form-label">Motivasi Menjadi Volunteer</label>
            <textarea name="motivasi" class="form-control" rows="3" required>{{ old('motivasi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
    </form>
</div>
@endsection
