@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Volunteer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
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
            <label for="name">Nama:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $volunteer->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $volunteer->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone">Telepon:</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $volunteer->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="address">Alamat:</label>
            <textarea name="address" class="form-control" required>{{ old('address', $volunteer->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gender">Jenis Kelamin:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="laki laki" {{ $volunteer->gender == 'laki laki' ? 'checked' : '' }} required>
                <label class="form-check-label">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="perempuan" {{ $volunteer->gender == 'perempuan' ? 'checked' : '' }} required>
                <label class="form-check-label">Perempuan</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('volunteer.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
<br>
@endsection
