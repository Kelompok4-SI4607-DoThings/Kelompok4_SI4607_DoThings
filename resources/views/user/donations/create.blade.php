@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">
                    <h2 class="fw-bold mb-4 text-gradient text-center">
                        Donasi untuk <span class="text-primary">{{ $campaign->title }}</span>
                    </h2>
                    <form action="{{ route('donations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

                        <div class="mb-3">
                            <label for="donor_name" class="form-label fw-semibold">Nama Donatur</label>
                            <input type="text" class="form-control rounded-3" id="donor_name" name="donor_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label fw-semibold">Jumlah Donasi (Rp)</label>
                            <input type="number" class="form-control rounded-3" id="amount" name="amount" min="1000" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label fw-semibold">Pesan (Opsional)</label>
                            <textarea class="form-control rounded-3" id="message" name="message" rows="3" placeholder="Tulis pesan untuk campaigner..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="payment_method" class="form-label fw-semibold">Metode Pembayaran</label>
                            <select class="form-select rounded-3" id="payment_method" name="payment_method" required onchange="showPaymentInfo()">
                                <option value="" disabled selected>Pilih Metode</option>
                                <option value="bank_transfer">Transfer Bank</option>
                                <option value="qris">Qris</option>
                                <option value="ewallet">E-Wallet</option>
                            </select>
                        </div>

                        <!-- Info pembayaran dinamis -->
                        <div id="payment-info" class="mb-4" style="display:none;">
                            <!-- Akan diisi oleh JS -->
                        </div>

                        <div class="d-flex gap-2 justify-content-center mt-4">
                            <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                                <i class="bi bi-cash-coin"></i> Donasi Sekarang
                            </button>
                            <a href="{{ route('donations.index') }}" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold shadow-sm">
                                <i class="bi bi-arrow-left-circle"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd 60%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
<script>
    function showPaymentInfo() {
        var method = document.getElementById('payment_method').value;
        var info = document.getElementById('payment-info');
        info.style.display = 'block';

        if (method === 'bank_transfer') {
            info.innerHTML = `
                <div class="alert alert-info rounded-3 shadow-sm mb-0">
                    <strong>Nomor Rekening:</strong><br>
                    1234567890 (Bank ABC)<br>
                    a.n. Yayasan DoThings
                </div>
            `;
        } else if (method === 'qris') {
            info.innerHTML = `
                <div class="text-center">
                    <div class="mb-2 fw-semibold">Scan QR Qris berikut untuk pembayaran:</div>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=DoThings-QRIS-{{ $campaign->id }}" alt="QR Qris" class="rounded-3 shadow-sm border" style="background:#fff;">
                    <div class="small text-muted mt-2">*Scan dengan aplikasi pembayaran Anda.</div>
                </div>
            `;
        } else if (method === 'ewallet') {
            info.innerHTML = `
                <div class="alert alert-info rounded-3 shadow-sm mb-0">
                    <strong>Nomor E-Wallet:</strong><br>
                    0812-3456-7890 (OVO/Gopay/DANA)<br>
                    a.n. DoThings Foundation
                </div>
            `;
        } else {
            info.style.display = 'none';
            info.innerHTML = '';
        }
    }
</script>
@endsection