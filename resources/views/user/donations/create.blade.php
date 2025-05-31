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

        <!-- Dropdown Metode Pembayaran -->
        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="credit_card">Kartu Kredit</option>
                <option value="ewallet">E-Wallet</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Donasi Sekarang</button>
        <a href="{{ route('donations.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left-circle"></i> Kembali
                            </a>
    </form>
</div>
<br>
@endsection