@extends('layouts.app')

@section('title', 'Beranda | DoThings')

@section('content')

{{-- Hero Section --}}
<section class="bg-primary text-white text-center py-5" style="background: url('https://source.unsplash.com/1600x600/?volunteer,help') center/cover;">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Bersama Kita Bisa Membantu Sesama</h1>
        <p class="lead mb-4">DoThings adalah platform donasi yang transparan, cepat, dan aman untuk membantu mereka yang membutuhkan.</p>
        <a href="#donasi" class="btn btn-light btn-lg mt-3 shadow-lg hover-effect">Mulai Donasi</a>
    </div>
</section>

{{-- About Section --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Kenapa Memilih DoThings?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-lg h-100 bg-white hover-effect">
                    <i class="bi bi-shield-lock-fill fs-2 text-primary mb-3"></i>
                    <h5 class="fw-bold">Transparan</h5>
                    <p>Setiap transaksi donasi dapat dipantau secara terbuka dan jujur.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-lg h-100 bg-white hover-effect">
                    <i class="bi bi-lightning-fill fs-2 text-primary mb-3"></i>
                    <h5 class="fw-bold">Cepat</h5>
                    <p>Proses donasi yang mudah dan cepat tanpa hambatan teknis.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-lg h-100 bg-white hover-effect">
                    <i class="bi bi-shield-check fs-2 text-primary mb-3"></i>
                    <h5 class="fw-bold">Aman</h5>
                    <p>Keamanan data dan transaksi Anda adalah prioritas utama kami.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section id="donasi" class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('https://source.unsplash.com/1600x600/?donation,help') center/cover no-repeat;">
    <div class="container">
        <h2 class="display-5 fw-bold mb-4">Yuk, Jadi Bagian dari Kebaikan!</h2>
        <p class="lead mb-4">Bantu sesama dengan berdonasi sekarang.</p>
        <a href="{{ route('login') }}" class="btn btn-light btn-lg shadow-lg hover-effect">Donasi Sekarang</a>
    </div>
</section>

{{-- Footer Space --}}
<div class="mb-5"></div>

@endsection
