@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Galang Dana Baru</h2>
    <form action="{{ route('GalangDana.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Galang Dana</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="target_amount" class="form-label">Target Donasi</label>
            <input type="number" name="target_amount" id="target_amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Batas Waktu</label>
            <input type="date" name="deadline" id="deadline" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Galang Dana</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajukan Galang Dana</button>
    </form>
</div>

<div class="container mt-5">
    <h2>Daftar Galang Dana</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Target</th>
                <th>Batas Waktu</th>
                <th>Gambar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->title }}</td>
                    <td>{{ $campaign->description }}</td>
                    <td>Rp {{ number_format($campaign->target_amount, 2) }}</td>
                    <td>{{ $campaign->deadline }}</td>
                    <td>
                        <img src="{{ asset('images/' . $campaign->image) }}" alt="Gambar Kampanye" style="width: 100px; height: auto;">
                    </td>
                    <td>{{ ucfirst($campaign->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection