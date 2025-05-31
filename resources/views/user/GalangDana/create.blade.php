@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Galang Dana Saya</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Target</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->title }}</td>
                    <td>Rp {{ number_format($campaign->target_amount, 2) }}</td>
                    <td>{{ ucfirst($campaign->status) }}</td>
                    <td>
                        <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-primary btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection