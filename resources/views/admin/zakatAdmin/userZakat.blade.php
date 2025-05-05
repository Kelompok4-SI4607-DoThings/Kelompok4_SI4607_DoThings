@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Zakat User</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Nama Zakat</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zakats as $zakat)
                <tr>
                    <td>{{ $zakat->user->name }}</td>
                    <td>{{ $zakat->name }}</td>
                    <td>Rp {{ number_format($zakat->amount) }}</td>
                    <td>{{ $zakat->status }}</td>
                    <td>
                        <form action="{{ route('zakatAdmin.updateStatus', $zakat->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()">
                                <option value="Pending" {{ $zakat->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Completed" {{ $zakat->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection