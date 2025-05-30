@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Zakat</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pembayar Zakat</th>
                <th>Penghasilan Perbulan</th>
                <th>Panti Asuhan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zakats as $zakat)
                <tr>
                    <td>{{ $zakat->nama_pembayar_zakat }}</td>
                    <td>{{ $zakat->penghasilan_perbulan }}</td>
                    <td>{{ $zakat->pantiasuhan }}</td>
                    <td>{{ $zakat->status }}</td>
                    <td>
                        
                        <!-- Form untuk mengubah status -->
                        <form action="{{ route('zakatAdmin.updateStatus', $zakat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()">
                                <option value="Pending" {{ $zakat->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Completed" {{ $zakat->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>

                        <!-- Tombol Edit -->
                        <a href="{{ route('zakatAdmin.edit', $zakat->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('zakatAdmin.destroy', $zakat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection