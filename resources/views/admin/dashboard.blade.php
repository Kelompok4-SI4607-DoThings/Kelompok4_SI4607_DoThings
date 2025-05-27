@extends('layouts.app')

@section('content')
<style>
    .custom-card {
        border-radius: 20px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
        padding: 30px 20px;
        transition: 0.3s ease;
        height: 100%;
        background-color: #fff;
    }

    .custom-card.active {
        background-color: #2699FB;
        color: white;
    }

    .custom-card .icon {
        font-size: 40px;
        margin-bottom: 20px;
    }

    .custom-card h5 {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .custom-card.active h5,
    .custom-card.active p {
        color: white;
    }

    .custom-card p {
        color: #8F8F8F;
        font-size: 14px;
    }

    .custom-btn {
        border: 2px solid #fff;
        background: transparent;
        padding: 8px 24px;
        font-weight: 600;
        font-size: 14px;
        border-radius: 24px;
        color: white;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
    }

    .custom-card:not(.active) .custom-btn {
        border: 2px solid #2699FB;
        color: #2699FB;
    }

    .custom-card:not(.active) .custom-btn:hover {
        background: #2699FB;
        color: white;
    }

    .section-title span {
        color: #2699FB;
    }

    .section-subtitle {
        color: #8F8F8F;
        font-size: 15px;
        max-width: 700px;
        margin: 0 auto;
    }
</style>

<div class="container my-5">
    <!-- First section -->
    <div class="text-center mb-5">
        <h2 class="fw-bold section-title">Share Your <span>Kindness</span></h2>
        <p class="section-subtitle">"Sekecil apa pun kebaikan yang kamu berikan, bisa menjadi cahaya bagi mereka yang membutuhkan."</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="icon">🤝</div>
                <h5 class="mb-2">Volunteer</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route(name: 'admin.volunteerAdmin.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card text-center active">
                <div class="icon">📢</div>
                <h5 class="mb-2">Galang Dana</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route('galangDanaAdmin.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="icon">🕌</div>
                <h5 class="mb-2">Pembayaran Zakat</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route('zakatAdmin.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card text-center active">
                <div class="icon">👥</div>
                <h5 class="mb-2">Komunitas</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="#" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="icon">🎮</div>
                <h5 class="mb-2">Gamifikasi & Reward</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="#" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card text-center active">
                <div class="icon">📝</div>
                <h5 class="mb-2">Unggah Artikel</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="#" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
    </div>

    <!-- Second section -->
    <div class="text-center mb-4">
        <h2 class="fw-bold section-title">Menebar <span>Kasih</span>, Meraih <span>Berkah Ilahi</span></h2>
        <p class="section-subtitle">"Dan barangsiapa bertakwa kepada Allah, niscaya dia menjadikan kemudahan baginya dalam urusannya."</p>
    </div>

    <!-- First row with 3 cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="icon">❤️</div>
                <h5 class="mb-2">Donasi</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route('campaigns.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="custom-card text-center active">
                <div class="icon">🔖</div>
                <h5 class="mb-2">Bookmark</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="#" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="icon">💳</div>
                <h5 class="mb-2">Payment Gateway</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="#" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
    </div>

    <!-- Second row with 2 centered cards -->
    <div class="row g-4">
        <div class="col-md-2"></div> <!-- Empty column for offset -->
        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="icon">⭐</div>
                <h5 class="mb-2">Rating & Review</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="#" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="icon">🔔</div>
                <h5 class="mb-2">Notifikasi & Reminder</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="#" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-2"></div> <!-- Empty column for offset -->
    </div>
</div>
@endsection