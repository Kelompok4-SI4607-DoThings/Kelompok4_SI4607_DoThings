@extends('layouts.app')

@section('content')
    <h1>Daftar Zakat</h1>
    <a href="{{ route('zakat.create') }}" class="btn btn-primary">Tambah Zakat</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pembayar Zakat</th>
                <th>Penghasilan Perbulan</th>
                <th>Bonus</th>
                <th>Utang</th>
                <th>Panti Asuhan</th>
                <th>Total Zakat</th>
                <th>Status</th> <!-- Kolom untuk status pembayaran -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zakat as $z)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $z->nama_pembayar_zakat }}</td>
                    <td>{{ number_format($z->penghasilan_perbulan, 2) }}</td>
                    <td>{{ number_format($z->bonus, 2) }}</td>
                    <td>{{ number_format($z->utang, 2) }}</td>
                    <td>{{ $z->pantiasuhan }}</td>
                    <td>
                        @php
                            $totalZakat = (($z->penghasilan_perbulan + $z->bonus) * 0.025) - $z->utang;
                        @endphp
                        {{ number_format(max($totalZakat, 0), 2) }}
                    </td>
                    <td>
                        @if ($z->is_paid)
                            <span class="badge bg-success">Sudah Dibayar</span>
                        @else
                            <span class="badge bg-danger">Belum Dibayar</span>
                        @endif
                        <br>
                        <small>Status: {{ $z->status }}</small> <!-- Tambahkan status dari admin -->
                    </td>
                    <td>
                        @if (!$z->is_paid)
                            <a href="{{ route('zakat.pay', $z->id) }}" class="btn btn-success">Bayar</a>
                        @endif
                        <a href="{{ route('zakat.edit', $z->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('zakat.destroy', $z->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
