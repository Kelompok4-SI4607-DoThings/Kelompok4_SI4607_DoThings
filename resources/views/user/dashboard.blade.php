@extends('layouts.app')

@section('styles')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<style>
    :root {
        --primary: #4e73df;
        --primary-dark: #224abe;
        --secondary: #36b9cc;
        --success: #1cc88a;
        --warning: #f6c23e;
        --danger: #e74a3b;
        --dark: #5a5c69;
    }
    
    body {
        background-color: #f8f9fa;
    }

    .feature-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 12px;
        overflow: hidden;
        border: none;
        background-color: white;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        border-radius: 50%;
        font-size: 1.8rem;
        color: white;
        transition: transform 0.3s;
    }
    
    .feature-card:hover .feature-icon {
        transform: scale(1.1);
    }
    
    .stat-card {
        border-radius: 12px;
        border: none;
        height: 100%;
        background-color: white;
        transition: transform 0.3s;
    }
    
    .stat-card:hover {
        transform: scale(1.02);
    }
    
    .quote-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 40px;
    }
    
    .dashboard-header {
        background: linear-gradient(135deg, #4e73df 0%, #36b9cc 100%);
        color: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
    }
    
    .donation-summary {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        padding: 20px;
        margin-bottom: 30px;
        transition: transform 0.3s;
    }
    
    .donation-summary:hover {
        transform: scale(1.02);
    }
    
    .donation-summary-icon {
        font-size: 1.5rem;
        background: rgba(78, 115, 223, 0.1);
        color: var(--primary);
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
    }
    
    .chart-container {
        position: relative;
        height: 300px;
        width: 100%;
    }
    
    .progress {
        border-radius: 10px;
        height: 10px;
        background-color: #f1f1f1;
    }
    
    .progress-bar {
        transition: width 0.4s ease;
    }
    
    .category-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .category-icon {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 10px;
    }
    
    .bg-primary-light {
        background-color: rgba(78, 115, 223, 0.1);
        color: var(--primary);
    }
    
    .bg-success-light {
        background-color: rgba(28, 200, 138, 0.1);
        color: var(--success);
    }
    
    .bg-warning-light {
        background-color: rgba(246, 194, 62, 0.1);
        color: var(--warning);
    }
    
    .bg-danger-light {
        background-color: rgba(231, 74, 59, 0.1);
        color: var(--danger);
    }
    
    .btn-float {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 24px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 999;
        background-color: var(--primary);
        color: white;
        transition: background-color 0.3s;
    }
    
    .btn-float:hover {
        background-color: var(--primary-dark);
    }
</style>
@endsection


@section('content')
<div class="container py-5">

    {{-- Dashboard Header --}}
    <div class="dashboard-header shadow-sm mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="fw-bold mb-2">Selamat datang, {{ Auth::user()->name }}!</h3>
                <p class="mb-0 opacity-75">Terus berbagi kebaikan untuk mereka yang membutuhkan</p>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="d-flex justify-content-md-end align-items-center">
                    <span class="badge bg-light text-primary fs-6 me-2">{{ date('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Donation Summary --}}
    <div class="donation-summary mb-4">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="donation-summary-icon me-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-cash-stack"></i>
                    </span>
                    <div class="text-center w-100 text-md-start">
                        <h6 class="text-muted mb-1">Total Donasi</h6>
                        <h3 class="fw-bold mb-0">Rp {{ number_format($totalDonations, 0, ',', '.') }}</h3>
                        <p class="text-success small mb-0">
                            <i class="bi bi-arrow-up"></i>
                            @php
                                $lastMonthTotal = App\Models\Donation::whereMonth('created_at', now()->subMonth()->month)
                                    ->whereYear('created_at', now()->subMonth()->year)
                                    ->sum('amount');
                                
                                $percentageChange = $lastMonthTotal > 0 
                                    ? (($totalDonations - $lastMonthTotal) / $lastMonthTotal * 100)
                                    : 0;
                            @endphp
                            {{ number_format($percentageChange, 1) }}% dari bulan lalu
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="donation-summary-icon me-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-calendar-check"></i>
                    </span>
                    <div class="text-center w-100 text-md-start">
                        <h6 class="text-muted mb-1">Donasi Bulan Ini</h6>
                        <h3 class="fw-bold mb-0">Rp {{ number_format($currentMonthDonations, 0, ',', '.') }}</h3>
                        <p class="text-success small mb-0">
                            <i class="bi bi-arrow-up"></i>
                            @php
                                $lastWeekTotal = App\Models\Donation::whereBetween('created_at', [
                                    now()->subWeek()->startOfDay(),
                                    now()->subWeek()->endOfDay()
                                ])->sum('amount');
                                
                                $weeklyChange = $lastWeekTotal > 0
                                    ? (($currentMonthDonations - $lastWeekTotal) / $lastWeekTotal * 100)
                                    : 0;
                            @endphp
                            {{ number_format($weeklyChange, 1) }}% dari minggu lalu
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="donation-summary-icon me-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-megaphone"></i>
                    </span>
                    <div class="text-center w-100 text-md-start">
                        <h6 class="text-muted mb-1">Campaign Aktif</h6>
                        <h3 class="fw-bold mb-0">{{ number_format($activeCampaigns) }}</h3>
                        <p class="text-success small mb-0">
                            <i class="bi bi-arrow-up"></i> 
                            {{ number_format($campaignPercentageChange, 1) }}% dari bulan lalu
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- Statistik Grafik --}}
    <div class="row mb-5 justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Total Donasi (6 Bulan Terakhir)</h5>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-outline-primary active">6 Bulan</button>
                        </div>
                    </div>
                    <div class="chart-container mx-auto" style="max-width:600px;">
                        <canvas id="donationChart" width="600" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Activity Stats --}}
    <div class="row mb-5 justify-content-center">        
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm stat-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Donasi Populer</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Donasi</th>
                                    <th scope="col">Target</th>
                                    <th scope="col">Terkumpul</th>
                                    <th scope="col">Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularCampaigns as $campaign)
                                    <tr>
                                        <td style="min-width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="campaign-image me-3">
                                                    @if($campaign->image)
                                                        <img src="{{ asset('storage/' . $campaign->image) }}" 
                                                            alt="{{ $campaign->title }}" 
                                                            class="rounded"
                                                            style="width: 48px; height: 48px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                             style="width: 48px; height: 48px;">
                                                            <i class="bi bi-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="campaign-title">
                                                    <h6 class="mb-0">{{ $campaign->title }}</h6>
                                                    <small class="text-muted">{{ Str::limit($campaign->description, 50) }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-primary">
                                            <strong>Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</strong>
                                        </td>
                                        <td class="text-success">
                                            <strong>Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</strong>
                                        </td>

                                        <td style="min-width: 150px;">
                                            @php
                                                $percentage = ($campaign->current_amount / $campaign->target_amount) * 100;
                                                $progressClass = $percentage > 66 ? 'bg-success' : 
                                                            ($percentage > 33 ? 'bg-primary' : 'bg-warning');
                                            @endphp
                                            <div class="d-flex align-items-center">
                                                <div class="progress flex-grow-1" style="height: 10px;">
                                                    <div class="progress-bar {{ $progressClass }}" 
                                                        role="progressbar" 
                                                        style="width: {{ min($percentage, 100) }}%"
                                                        aria-valuenow="{{ $percentage }}"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100">
                                                    </div>
                                                </div>
                                                <small class="ms-2 text-muted">{{ number_format($percentage, 0) }}%</small>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('donations.index') }}" 
                           class="btn btn-outline-primary">
                            <i class="bi bi-list-ul me-1"></i>
                            Lihat Semua Campaign
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('donations.create', ['campaign' => 1]) }}" class="btn-float">
        <i class="bi bi-plus"></i>
    </a>
</div>


    {{-- Quote --}}
    <div class="quote-section text-center mb-5">
        <h2 class="fw-bold">Share Your <span class="text-primary">Kindness</span></h2>
        <p class="text-muted fst-italic">"Sekecil apapun kebaikan yang kamu berikan, bisa menjadi cahaya bagi mereka yang membutuhkan."</p>
    </div>

    {{-- Fitur Kartu --}}
<h4 class="fw-bold mb-4 text-center" style="color: #0d6efd;">Fitur Unggulan</h4>
<div class="row g-4 mb-5">
    @foreach ([
        ['title' => 'Volunteer', 'icon' => 'bi-people-fill', 'desc' => 'Jadilah bagian dari relawan kemanusiaan'],
        ['title' => 'Galang Dana', 'icon' => 'bi-cash-coin',  'desc' => 'Buat campaign untuk kebaikan'],
        ['title' => 'Pembayaran Zakat', 'icon' => 'bi-wallet2',  'desc' => 'Tunaikan kewajiban dengan mudah'],
        ['title' => 'Komunitas', 'icon' => 'bi-heart-fill',  'desc' => 'Bergabung dengan komunitas peduli'],
        ['title' => 'Unggah Artikel', 'icon' => 'bi-journal-text',   'desc' => 'Bagikan inspirasi kebaikan'],
        ['title' => 'Donasi', 'icon' => 'bi-gift-fill',  'desc' => 'Donasi untuk berbagai kebutuhan'],
    ] as $item)
        <div class="col-sm-6 col-md-4">
            <div class="card h-100 feature-card shadow rounded-4" style="border: none; background: white; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                <div class="card-body d-flex flex-column text-center px-4 py-5">
                    <div class="icon-circle mb-4 mx-auto">
                        <i class="{{ $item['icon'] }} feature-icon"></i>
                    </div>
                    <h5 class="card-title fw-bold" style="color: #0d6efd; font-size: 1.5rem;">{{ $item['title'] }}</h5>
                    <p class="card-text text-secondary small mb-4">{{ $item['desc'] }}</p>
                    <div class="mt-auto">
                        @if ($item['title'] === 'Donasi')
                            <a href="{{ route('donations.index') }}" class="btn btn-primary px-4 py-2 fw-semibold rounded-pill shadow-sm">Lihat Donasi</a>
                        @endif
                        @if ($item['title'] === 'Galang Dana')
                            <a href="{{ route('GalangDana.index') }}" class="btn btn-primary px-4 py-2 fw-semibold rounded-pill shadow-sm">Mulai Galang Dana</a>
                        @endif
                        @if ($item['title'] === 'Pembayaran Zakat')
                            <a href="{{ route('zakat.index') }}" class="btn btn-primary px-4 py-2 fw-semibold rounded-pill shadow-sm">Bayar Zakat</a>
                        @endif
                        @if ($item['title'] === 'Unggah Artikel')
                            <a href="{{ route('articles.index') }}" class="btn btn-primary px-4 py-2 fw-semibold rounded-pill shadow-sm">Tulis Artikel</a>
                        @endif
                        @if ($item['title'] === 'Volunteer')
                            <a href="{{ route('volunteer.index') }}" class="btn btn-primary px-4 py-2 fw-semibold rounded-pill shadow-sm">Mulai Volunteer</a>
                        @endif
                        @if ($item['title'] === 'Komunitas')
                            <a href="{{ route('community.chat.index') }}" class="btn btn-primary px-4 py-2 fw-semibold rounded-pill shadow-sm">Komunitas</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(13, 110, 253, 0.3);
        cursor: pointer;
    }
    .icon-circle {
        width: 70px;
        height: 70px;
        background-color: #e7f1ff; /* Light blue background */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        transition: background-color 0.3s ease;
    }
    .feature-icon {
        font-size: 2.5rem;
        color: #0d6efd; /* Bootstrap primary blue */
        transition: color 0.3s ease;
    }
    .feature-card:hover .icon-circle {
        background-color: #0d6efd; /* Solid blue on hover */
    }
    .feature-card:hover .feature-icon {
        color: white;
    }
    .btn-primary {
        background-color: #0d6efd;
        border: none;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    .btn-primary:hover, .btn-primary:focus {
        background-color: #084ede;
        box-shadow: 0 6px 12px rgba(13, 110, 253, 0.5);
        color: white;
        text-decoration: none;
    }
</style>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data untuk grafik total donasi
    const donationData = {
        labels: ['November', 'Desember', 'Januari', 'Februari', 'Maret', 'April'],
        datasets: [{
            label: 'Total Donasi (dalam juta Rp)',
            data: [65.8, 78.2, 62.5, 73.4, 85.6, 90.2],
            backgroundColor: 'rgba(78, 115, 223, 0.2)',
            borderColor: 'rgba(78, 115, 223, 1)',
            borderWidth: 2,
            pointBackgroundColor: 'rgba(78, 115, 223, 1)',
            pointBorderColor: '#fff',
            pointHoverRadius: 5,
            pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
            pointHoverBorderColor: 'rgba(220, 220, 220, 1)',
            pointHitRadius: 10,
            tension: 0.3
        }]
    };

    // Data untuk grafik kategori donasi
    const categoryData = {
        labels: ['Pendidikan', 'Kesehatan', 'Bencana Alam', 'Sosial & Lainnya'],
        datasets: [{
            data: [35, 28, 20, 17],
            backgroundColor: [
                'rgba(78, 115, 223, 0.8)',
                'rgba(40, 167, 69, 0.8)',
                'rgba(255, 193, 7, 0.8)',
                'rgba(220, 53, 69, 0.8)'
            ],
            borderWidth: 1
        }]
    };

    // Konfigurasi grafik donasi
    const donationConfig = {
        type: 'line',
        data: donationData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: false,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value + ' jt';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.raw + ' juta';
                        }
                    }
                }
            }
        }
    };

    // Konfigurasi grafik kategori
    const categoryConfig = {
        type: 'doughnut',
        data: categoryData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw + '%';
                        }
                    }
                }
            },
            cutout: '70%'
        }
    };

        const donationChart = new Chart(
        document.getElementById('donationChart'),
        {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Total Donasi (juta Rp)',
                    data: {!! json_encode($data) !!},
                    backgroundColor: 'rgba(78, 115, 223, 0.2)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value + ' jt';
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp ' + context.raw + ' juta';
                            }
                        }
                    }
                }
            }
        }
    );
</script>
@endsection