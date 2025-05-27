@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Konfirmasi Pembayaran Zakat</h1>
    <p><strong>Nama Pembayar:</strong> {{ $zakat->nama_pembayar_zakat }}</p>
    <p><strong>Panti Asuhan:</strong> {{ $zakat->pantiasuhan }}</p>
    <p><strong>Total Zakat:</strong> {{ number_format($totalZakat, 2) }}</p>

    <form action="{{ route('zakat.processPayment', $zakat->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Bayar Sekarang</button>
    </form>
</div>
@endsection