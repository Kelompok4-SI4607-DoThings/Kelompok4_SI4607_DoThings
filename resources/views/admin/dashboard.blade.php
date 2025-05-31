@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa; /* Light background for the page */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* --- Section Titles and Subtitles --- */
    .section-title {
        font-size: 2.2rem; /* Slightly smaller title */
        color: #343a40;
        margin-bottom: 10px; /* Reduced margin */
        position: relative;
        display: inline-block;
    }

    .section-title span {
        color: #2699FB; /* Accent color for spans */
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 70px; /* Slightly smaller underline */
        height: 3px; /* Thinner underline */
        background-color: #2699FB;
        bottom: -8px; /* Adjusted position */
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .section-subtitle {
        color: #6c757d;
        font-size: 0.95rem; /* Slightly smaller subtitle */
        max-width: 600px; /* Reduced max-width for tighter look */
        margin: 15px auto 50px auto; /* Adjusted spacing */
        line-height: 1.5;
    }

    /* --- Custom Card Styles --- */
    .custom-card {
        border-radius: 12px; /* Slightly less rounded */
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08); /* Softer, slightly less prominent shadow */
        padding: 30px 20px; /* Reduced padding */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effects */
        height: 100%;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Distribute content nicely */
    }

    .custom-card:hover {
        transform: translateY(-6px); /* Slightly less lift on hover */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12); /* Adjusted shadow on hover */
    }

    .custom-card.active {
        background-color: #2699FB;
        color: white;
        box-shadow: 0 6px 20px rgba(38, 153, 251, 0.3); /* Blue shadow for active card */
    }

    .custom-card .icon {
        font-size: 3rem; /* Smaller icons */
        margin-bottom: 20px; /* Reduced space below icon */
        color: #2699FB; /* Default icon color */
    }

    .custom-card.active .icon {
        color: white; /* White icon for active card */
    }

    .custom-card h5 {
        font-weight: 700;
        margin-bottom: 10px; /* Reduced space below heading */
        font-size: 1.3rem; /* Smaller heading */
        color: #343a40; /* Default heading color */
    }

    .custom-card.active h5,
    .custom-card.active p {
        color: white;
    }

    .custom-card p {
        color: #6c757d;
        font-size: 0.9rem; /* Smaller paragraph text */
        line-height: 1.4; /* Slightly tighter line height */
        flex-grow: 1;
        margin-bottom: 20px; /* Reduced space before button */
    }

    /* --- Custom Button Styles --- */
    .custom-btn {
        border: 2px solid #2699FB;
        background: transparent;
        padding: 8px 24px; /* Reduced padding for button */
        font-weight: 600;
        font-size: 0.95rem; /* Slightly smaller font for button */
        border-radius: 25px; /* Slightly less rounded button */
        color: #2699FB;
        transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        display: inline-block;
        text-decoration: none;
    }

    .custom-btn:hover {
        background: #2699FB;
        color: white;
        border-color: #2699FB;
    }

    .custom-card.active .custom-btn {
        border: 2px solid white;
        color: white;
    }

    .custom-card.active .custom-btn:hover {
        background: white;
        color: #2699FB;
    }

    /* --- General Layout --- */
    .container {
        padding-top: 2rem; /* REDUCED TOP PADDING */
        padding-bottom: 4rem;
    }

    .my-5 {
        margin-top: 1.5rem !important; /* REDUCED TOP MARGIN */
        margin-bottom: 3rem !important;
    }

    .mb-5 {
        margin-bottom: 3rem !important;
    }

    .hr {
        margin-top: 4rem !important;
        margin-bottom: 4rem !important;
    }
</style>

<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold section-title">Share Your <span>Kindness</span></h2>
        <p class="section-subtitle">"Sekecil apa pun kebaikan yang kamu berikan, bisa menjadi cahaya bagi mereka yang membutuhkan."</p>
    </div>

    <div class="row g-3 mb-5 justify-content-center">
        <div class="col-md-4 col-sm-6">
            <div class="custom-card text-center">
                <div class="icon">🤝</div>
                <h5 class="mb-2">Volunteer</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route('admin.volunteerAdmin.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="custom-card text-center active">
                <div class="icon">📢</div>
                <h5 class="mb-2">Galang Dana</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route('galangDanaAdmin.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="custom-card text-center">
                <div class="icon">🕌</div>
                <h5 class="mb-2">Pembayaran Zakat</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route('zakatAdmin.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
    </div>

    <hr class="my-5 hr"> {{-- Divider for visual separation with adjusted margin --}}

    <div class="text-center mb-5">
        <h2 class="fw-bold section-title">Menebar <span>Kasih</span>, Meraih <span>Berkah Ilahi</span></h2>
        <p class="section-subtitle">"Dan barangsiapa bertakwa kepada Allah, niscaya dia menjadikan kemudahan baginya dalam urusannya."</p>
    </div>

    <div class="row g-3 justify-content-center">
        <div class="col-md-4 col-sm-6">
            <div class="custom-card text-center">
                <div class="icon">❤️</div>
                <h5 class="mb-2">Donasi</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route('campaigns.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="custom-card text-center active">
                <div class="icon">👥</div>
                <h5 class="mb-2">Komunitas</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="{{ route('admin.komunitasAdmin.index') }}" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
    </div>
</div>
@endsection