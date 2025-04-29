@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h4 class="fw-bold">Selamat datang, {{ Auth::user()->name }}!</h4>
    </div>
    

    {{-- Statistik --}}
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Active Users</h5>
                    <img src="{{ asset('images/chart-bar.png') }}" class="img-fluid rounded" alt="Bar Chart">
                    <div class="d-flex justify-content-between mt-3 text-muted small">
                        <div>Donatur: 32,062</div>
                        <div>Relawan: 12,868</div>
                        <div>Campaign: 2,665</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Activity Graph</h5>
                    <img src="{{ asset('images/chart-line.png') }}" class="img-fluid rounded" alt="Line Chart">
                </div>
            </div>
        </div>
    </div>

    {{-- Quote --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold">Share Your <span class="text-primary">Kindness</span></h2>
        <p class="text-muted fst-italic">"Sekecil apapun kebaikan yang kamu berikan, bisa menjadi cahaya bagi mereka yang membutuhkan."</p>
    </div>

    {{-- Fitur Kartu --}}
    <div class="row g-4 mb-5">
        @foreach ([
            ['title' => 'Volunteer', 'icon' => 'volunteer.png'],
            ['title' => 'Galang Dana', 'icon' => 'galang-dana.png'],
            ['title' => 'Pembayaran Zakat', 'icon' => 'zakat.png'],
            ['title' => 'Komunitas', 'icon' => 'komunitas.png'],
            ['title' => 'Gamifikasi & Reward', 'icon' => 'reward.png'],
            ['title' => 'Unggah Artikel', 'icon' => 'artikel.png'],
            ['title' => 'Donasi', 'icon' => 'donasi.png'],
            ['title' => 'Bookmark', 'icon' => 'bookmark.png'],
            ['title' => 'Payment Gateway', 'icon' => 'payment.png'],
            ['title' => 'Rating & Review', 'icon' => 'rating.png'],
            ['title' => 'Notifikasi & Reminder', 'icon' => 'notif.png'],
        ] as $item)
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <img src="{{ asset('images/icons/' . $item['icon']) }}" alt="{{ $item['title'] }}" class="mb-3" style="height: 50px">
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        @if ($item['title'] === 'Donasi')
                            <a href="{{ route('donations.index') }}" class="btn btn-primary mt-3">Lihat Donasi</a>
                        @endif
                        @if ($item['title'] === 'Galang Dana')
                            <a href="{{ route('campaigns.index') }}" class="btn btn-primary mt-3">Lihat Galang Dana</a>
                        @endif
                        @if ($item['title'] === 'Pembayaran Zakat')
                            <a href="{{ route('user.zakat.create') }}" class="btn btn-primary mt-3">Lihat Zakat</a>
                        @endif
                        @if ($item['title'] === 'Unggah Artikel')
                            <a href="{{ route('articles.index') }}" class="btn btn-primary mt-3">Unggah Artikel</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Quote Section 2 --}}
    <div class="text-center mb-5">
        <h5><strong>Menebar <span class="text-primary">Kasih</span>, Meraih <span class="text-info">Berkah Ilahi</span></strong></h5>
        <p class="text-muted fst-italic small">"Dan barang siapa bersedekah kepada Allah, niscaya akan diberikan kemudahan baginya dalam urusannya."</p>
    </div>
</div>

@endsection