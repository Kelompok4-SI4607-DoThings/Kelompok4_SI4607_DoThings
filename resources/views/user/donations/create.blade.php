@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Donasi untuk {{ $campaign->title }}</h2>

    <form action="{{ route('donations.store') }}" method="POST">
        @csrf

        <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

        <div class="mb-3">
            <label for="donor_name" class="form-label">Nama Donatur</label>
            <input type="text" class="form-control" id="donor_name" name="donor_name" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah Donasi</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Pesan (opsional)</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Donasi Sekarang</button>
    </form>
</div>
@endsection