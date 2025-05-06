@extends('layouts.app')

@section('content')
<style>
    .custom-background {
    background-image: url('/images/tangan.png'); /* Path gambar tangan */
    background-size: contain; /* Agar gambar tidak terpotong dan tetap terlihat utuh */
    background-position: center center; /* Menempatkan gambar di tengah */
    background-repeat: no-repeat; /* Mencegah pengulangan gambar */
    background-attachment: fixed; /* Agar gambar tetap di tempat saat halaman digulir */
    padding: 100px 0; /* Menambah padding agar lebih estetis */
    color: white;
    text-align: center;
    width: 100%;
    height: 100vh; /* Membuat elemen menutupi seluruh tinggi layar */
    position: relative; /* Agar bisa menambah elemen lainnya dengan baik */
}
    .custom-background h2 {
        font-size: 36px;
        font-weight: bold;
        font-family: 'Cursive', sans-serif; /* Gunakan font mirip tulisan tangan */
        letter-spacing: 2px; /* Menambahkan jarak antar huruf */
        margin-bottom: 10px;
    }

    .custom-background p {
        font-size: 18px;
        font-family: 'Cursive', sans-serif; /* Gunakan font mirip tulisan tangan */
        letter-spacing: 1px; /* Menambahkan jarak antar huruf */
        font-weight: normal;
        margin-top: 0;
        color: black;
        display: inline-block;
        text-align: center;
        padding-left: 15px;
        padding-right: 15px;
    }
    /* Styles for the custom section */
    .section-title {
        color: black;
    }

    .section-subtitle {
        color: black;
        font-size: 20px;
    }
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
    <!-- Custom Section with Hand Image Background -->
    <div class="custom-background">
    </div>
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
                <a href="#" class="custom-btn mt-3">Detail</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card text-center active">
                <div class="icon">📢</div>
                <h5 class="mb-2">Galang Dana</h5>
                <p>Mulailah alur kebaikan bermakna dari langkah sederhana. Masukkan kontribusimu bersama mereka.</p>
                <a href="#" class="custom-btn mt-3">Detail</a>
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
                <a href="{{ route('admin.campaigns.index') }}" class="custom-btn mt-3">Detail</a>
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