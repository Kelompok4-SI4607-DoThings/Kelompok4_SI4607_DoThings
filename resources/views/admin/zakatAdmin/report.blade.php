@extends('layouts.app')

@section('content')
    <h1>Laporan Zakat</h1>
    <p><strong>Total Zakat Terkumpul:</strong> {{ number_format($totalZakat, 2) }}</p>
    <p><strong>Jumlah Zakat Sudah Dibayar:</strong> {{ $paidZakat }}</p>
    <p><strong>Jumlah Zakat Belum Dibayar:</strong> {{ $unpaidZakat }}</p>
@endsection