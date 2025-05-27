@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kampanye Pending</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Target</th>
                <th>Batas Waktu</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->title }}</td>
                    <td>{{ Str::limit($campaign->description, 50) }}</td> <!-- Deskripsi singkat -->
                    <td>Rp {{ number_format($campaign->target_amount, 2) }}</td>
                    <td>{{ $campaign->deadline }}</td>
                    <td>
                        <img src="{{ asset('images/' . $campaign->image) }}" alt="Gambar Kampanye" style="width: 100px; height: auto;">
                    </td>
                    <td>{{ ucfirst($campaign->status) }}</td>
                    <td>
                        <a href="{{ route('galangDanaAdmin.show', $campaign->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('galangDanaAdmin.destroy', $campaign->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kampanye ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection