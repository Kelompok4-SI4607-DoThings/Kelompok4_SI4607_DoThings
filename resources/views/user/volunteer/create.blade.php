@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Formulir Pendaftaran Volunteer</h2>
    <form action="{{ route('volunteer.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
    <label>Jenis Kelamin</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="laki" value="laki laki" required>
        <label class="form-check-label" for="laki">Laki-laki</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="perempuan" value="perempuan" required>
        <label class="form-check-label" for="perempuan">Perempuan</label>
    </div>
    </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
            <label class="form-check-label" for="agreement">Saya menyetujui syarat dan ketentuan</label>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection