@extends('layouts.app')

@section('content')
    <h1>Daftar Zakat</h1>
    <a href="{{ route('zakat.create') }}" class="btn btn-primary">Tambah Zakat</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pembayar Zakat</th>
                <th>Penghasilan Perbulan</th>
                <th>Bonus</th>
                <th>Utang</th>
                <th>Panti Asuhan</th>
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
