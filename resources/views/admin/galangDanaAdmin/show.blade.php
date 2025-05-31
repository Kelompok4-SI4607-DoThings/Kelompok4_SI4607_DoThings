@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Galang Dana</h2>
    <table class="table">
        <tbody>
            <tr>
                <th>Judul</th>
                <td>{{ $campaign->title }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $campaign->description }}</td>
            </tr>
            <tr>
                <th>Target</th>
                <td>Rp {{ number_format($campaign->target_amount, 2) }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($campaign->status) }}</td>
            </tr>
        </tbody>
    </table>

    <form action="{{ route('galangDanaAdmin.update', $campaign->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="approved" {{ $campaign->status === 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $campaign->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="suggestions" class="form-label">Saran</label>
            <textarea name="suggestions" id="suggestions" class="form-control" rows="4">{{ $campaign->suggestions }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('galangDanaAdmin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection