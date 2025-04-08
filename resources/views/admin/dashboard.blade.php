@extends('layouts.app')

@section('content')
<div class="container my-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Halo Admin, {{ Auth::user()->name }}!</h1>
        <p class="text-muted">Ini adalah dashboard untuk admin.</p>
    </div>

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <img src="{{ asset('images/hands-illustration.png') }}" alt="Helping Hands" class="img-fluid mb-3" style="max-height: 200px;">
        <h2 class="fw-semibold fs-4">"More Giving, More Living"</h2>
    </div>

    <!-- Share Your Kindness Section -->
    <div class="text-center mb-5">
        <h3 class="fw-bold text-primary">Share Your <span class="text-success">Kindness</span></h3>
        <div class="row g-4 mt-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4">
                    <h5 class="card-title">Volunteer</h5>
                    <p class="card-text">Join as a volunteer and help others.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm bg-primary text-white text-center p-4">
                    <h5 class="card-title">Giving Dana</h5>
                    <p class="card-text">Berbagi dana untuk kebaikan sesama.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4">
                    <h5 class="card-title">Pembangunan Dakwah</h5>
                    <p class="card-text">Dukung pembangunan kegiatan dakwah.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm bg-primary text-white text-center p-4">
                    <h5 class="card-title">Kebutuhan</h5>
                    <p class="card-text">Donasi kebutuhan pokok.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4">
                    <h5 class="card-title">Spiritual & Renewal</h5>
                    <p class="card-text">Kegiatan pembinaan rohani.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm bg-primary text-white text-center p-4">
                    <h5 class="card-title">Unggah Artikel</h5>
                    <p class="card-text">Bagikan artikel yang menginspirasi.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Menebar Kasih Section -->
    <div class="text-center my-5">
        <h3 class="fw-bold text-primary">Menebar Kasih, Meraih Berkah Ilahi</h3>
        <div class="row g-4 mt-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4">
                    <h5 class="card-title">Donasi</h5>
                    <p class="card-text">Salurkan donasi Anda.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm bg-primary text-white text-center p-4">
                    <h5 class="card-title">Rekapan Donasi</h5>
                    <p class="card-text">Lihat histori kontribusi Anda.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4">
                    <h5 class="card-title">Pembuktian Donasi</h5>
                    <p class="card-text">Unggah bukti donasi Anda.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 shadow-sm text-center p-4">
                    <h5 class="card-title">Rating & Review</h5>
                    <p class="card-text">Berikan ulasan untuk program kami.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 shadow-sm text-center p-4">
                    <h5 class="card-title">Spiritual & Renewal</h5>
                    <p class="card-text">Kegiatan pembinaan jiwa.</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection