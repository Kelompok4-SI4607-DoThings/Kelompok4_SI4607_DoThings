@extends('layouts.app')

@section('title', 'Beranda | DoThings')

@section('content')

<style>
    /* Global Styles & Typography */
    body {
        font-family: 'Poppins', sans-serif; /* A more modern, friendly font */
        background-color: #f0f2f5; /* Light gray background */
        color: #333;
        overflow-x: hidden; /* Prevent horizontal scroll */
    }

    h1, h2, h5 {
        font-family: 'Montserrat', sans-serif; /* Stronger font for headings */
    }

    .text-primary {
        color: #2699FB !important; /* Your accent blue */
    }

    /* Hero Section Specifics */
    .hero-section {
        position: relative;
        overflow: hidden;
        padding: 120px 0; /* Even more vertical padding */
        background-color: #34495e; /* Fallback dark background */
        color: white;
        display: flex;
        align-items: center; /* Vertically center content */
        min-height: 90vh; /* Make it take more viewport height */
        /* Animation for background, if you add subtle movement */
        /* animation: heroBgPan 20s infinite alternate linear; */
    }

    .hero-bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* More dynamic gradient overlay */
        background: linear-gradient(to bottom right, rgba(38, 153, 251, 0.7), rgba(0, 75, 150, 0.85));
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .hero-section h1 {
        font-size: 4.5rem; /* Even larger hero title */
        font-weight: 900; /* Black font weight */
        line-height: 1.1;
        letter-spacing: -2px; /* Slightly tighter letter spacing for impact */
        text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5); /* Stronger text shadow */
        margin-bottom: 20px; /* Adjust spacing */
    }

    .hero-section p.lead {
        font-size: 1.4rem; /* Larger lead paragraph */
        max-width: 800px; /* Wider text for better flow */
        margin: 0 auto 40px auto; /* More spacing below paragraph */
    }

    /* General Buttons */
    .btn-light, .btn-cta {
        border: none;
        font-weight: 700; /* Bolder font weight */
        padding: 18px 45px; /* Generous padding */
        border-radius: 50px; /* Pill shape */
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); /* Smoother, more distinct transition */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.18); /* Softer initial shadow */
    }

    .btn-light {
        background-color: #fff;
        color: #2699FB;
    }

    .btn-light:hover {
        background-color: #e2e6ea;
        color: #1e7ad1; /* Slightly darker blue on hover */
        transform: translateY(-7px); /* More pronounced lift */
        box-shadow: 0 18px 30px rgba(0, 0, 0, 0.3); /* Stronger shadow on hover */
    }

    /* Section Styling */
    section {
        padding: 100px 0; /* Consistent larger padding for all sections */
    }

    .section-heading {
        font-size: 2.8rem; /* Larger section heading */
        font-weight: 800; /* Extra bold */
        margin-bottom: 60px; /* More spacing below heading */
        position: relative;
        padding-bottom: 20px; /* Space for underline */
        color: #333;
    }

    .section-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px; /* Wider underline */
        height: 5px; /* Thicker underline */
        background-color: #2699FB; /* Accent underline */
        border-radius: 3px;
    }

    /* About Section Cards */
    .about-card {
        background-color: #fff;
        border: none;
        border-radius: 20px; /* More rounded corners */
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1); /* Stronger initial shadow */
        padding: 40px; /* More padding */
        transition: transform 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        border-bottom: 5px solid transparent; /* Prepare for accent border */
    }

    .about-card:hover {
        transform: translateY(-15px); /* Even more pronounced lift */
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
        border-color: #2699FB; /* Accent border on hover */
    }

    .about-card i {
        font-size: 4rem; /* Even larger icons for impact */
        margin-bottom: 25px;
        color: #2699FB; /* Primary color for icons */
        transition: color 0.3s ease;
    }

    .about-card:hover i {
        color: #1a6cb3; /* Slightly darker blue on hover */
    }

    .about-card h5 {
        font-size: 1.5rem; /* Larger heading in cards */
        margin-bottom: 15px;
        color: #444;
    }

    .about-card p {
        font-size: 1.05rem; /* Slightly larger paragraph in cards */
        color: #666;
        line-height: 1.7;
    }

    /* CTA Section Specifics */
    .cta-section {
        padding: 120px 0; /* Consistent large padding */
        position: relative;
        overflow: hidden;
        color: white;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        /* animation: ctaBgPan 20s infinite alternate linear; */
    }

    .cta-bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Deeper, more directional blue gradient overlay */
        background: linear-gradient(to left, rgba(38, 153, 251, 0.8), rgba(0, 75, 150, 0.9));
        z-index: 1;
    }

    .cta-content {
        position: relative;
        z-index: 2;
    }

    .cta-section h2 {
        font-size: 3.5rem; /* Even larger CTA title */
        font-weight: 900;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
        margin-bottom: 25px;
    }

    .cta-section p.lead {
        font-size: 1.3rem;
        max-width: 700px;
        margin: 0 auto 40px auto;
    }

    .btn-cta {
        background-color: #fff;
        color: #2699FB;
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25); /* Stronger initial shadow for CTA button */
    }

    .btn-cta:hover {
        background-color: #e2e6ea;
        color: #1e7ad1;
        transform: translateY(-9px); /* Even more pronounced lift for CTA button */
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.4); /* Much stronger shadow on hover */
    }

    /* Utility for spacing (you might keep Bootstrap's default spacing utilities too) */
    .mb-6 { margin-bottom: 4rem !important; }
    .mt-6 { margin-top: 4rem !important; }

    /* For smooth scrolling when using hash links */
    html {
        scroll-behavior: smooth;
    }

    /* Optional: subtle background pan animation - uncomment if you want to try */
    /*
    @keyframes heroBgPan {
        0% { background-position: 0% 0%; }
        100% { background-position: 100% 100%; }
    }
    @keyframes ctaBgPan {
        0% { background-position: 0% 0%; }
        100% { background-position: 100% 100%; }
    }
    */

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 3rem;
        }
        .hero-section p.lead {
            font-size: 1.1rem;
        }
        .section-heading {
            font-size: 2rem;
        }
        .about-card {
            padding: 30px;
        }
        .about-card i {
            font-size: 3rem;
        }
        .about-card h5 {
            font-size: 1.3rem;
        }
        .about-card p {
            font-size: 0.95rem;
        }
        .cta-section h2 {
            font-size: 2.5rem;
        }
        .cta-section p.lead {
            font-size: 1.05rem;
        }
        .btn-light, .btn-cta {
            padding: 15px 35px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 80px 0;
            min-height: 70vh;
        }
        .hero-section h1 {
            font-size: 2.5rem;
            letter-spacing: -1px;
        }
        .hero-section p.lead {
            font-size: 1rem;
        }
        section {
            padding: 60px 0;
        }
        .section-heading {
            font-size: 1.8rem;
            margin-bottom: 40px;
        }
        .section-heading::after {
            width: 70px;
            height: 4px;
        }
        .about-card {
            padding: 25px;
        }
        .about-card i {
            font-size: 2.5rem;
        }
        .about-card h5 {
            font-size: 1.2rem;
        }
        .about-card p {
            font-size: 0.9rem;
        }
        .cta-section h2 {
            font-size: 2rem;
        }
        .cta-section p.lead {
            font-size: 0.95rem;
        }
        .btn-light, .btn-cta {
            padding: 12px 30px;
            font-size: 0.85rem;
        }
    }

</style>

{{-- Add Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800;900&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
{{-- Add Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


{{-- Hero Section --}}
<section class="hero-section" style="background: url('https://source.unsplash.com/1920x1080/?volunteer,charity,helping-hands') center/cover no-repeat;">
    <div class="hero-bg-overlay"></div>
    <div class="container hero-content">
        <h1 class="mb-3">Bersama Kita Bisa Membantu Sesama</h1>
        <p class="lead mb-4">DoThings adalah platform donasi yang transparan, cepat, dan aman untuk membantu mereka yang membutuhkan.</p>
        <a href="#donasi" class="btn btn-light btn-lg mt-3">Mulai Donasi</a>
    </div>
</section>

{{-- About Section --}}
<section class="bg-light">
    <div class="container">
        <h2 class="text-center section-heading">Kenapa Memilih DoThings?</h2>
        <div class="row text-center justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="about-card">
                    <i class="bi bi-shield-lock-fill"></i>
                    <h5>Transparan</h5>
                    <p>Setiap transaksi donasi dapat dipantau secara terbuka dan jujur.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="about-card">
                    <i class="bi bi-lightning-fill"></i>
                    <h5>Cepat</h5>
                    <p>Proses donasi yang mudah dan cepat tanpa hambatan teknis.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="about-card">
                    <i class="bi bi-shield-check"></i>
                    <h5>Aman</h5>
                    <p>Keamanan data dan transaksi Anda adalah prioritas utama kami.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section id="donasi" class="cta-section" style="background: url('https://source.unsplash.com/1920x1080/?donation,community-support,giving') center/cover;">
    <div class="cta-bg-overlay"></div>
    <div class="container cta-content">
        <h2 class="mb-4">Yuk, Jadi Bagian dari Kebaikan!</h2>
        <p class="lead mb-4">Bantu sesama dengan berdonasi sekarang.</p>
        <a href="{{ route('login') }}" class="btn btn-cta">Donasi Sekarang</a>
    </div>
</section>

{{-- Footer Space (You might replace this with a real footer later) --}}
<div class="mb-6"></div>

@endsection