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
    
    .feature-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 12px;
        overflow: hidden;
        border: none;
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
    }
    
    .quote-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 40px;
    }
    
    .dashboard-header {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        color: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
    }
    
    .donation-summary {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        padding: 20px;
        margin-bottom: 30px;
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
        height: 8px;
        background-color: #f1f1f1;
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
        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="d-flex align-items-center">
                    <div class="donation-summary-icon me-3">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Donasi</h6>
                        <h3 class="fw-bold mb-0">Rp 425,678,000</h3>
                        <p class="text-success small mb-0"><i class="bi bi-arrow-up"></i> 12.5% dari bulan lalu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="d-flex align-items-center">
                    <div class="donation-summary-icon me-3">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Donasi Bulan Ini</h6>
                        <h3 class="fw-bold mb-0">Rp 85,230,000</h3>
                        <p class="text-success small mb-0"><i class="bi bi-arrow-up"></i> 8.2% dari minggu lalu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="d-flex align-items-center">
                    <div class="donation-summary-icon me-3">
                        <i class="bi bi-person-hearts"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Donatur Aktif</h6>
                        <h3 class="fw-bold mb-0">32,062</h3>
                        <p class="text-success small mb-0"><i class="bi bi-arrow-up"></i> 5.3% dari bulan lalu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center">
                    <div class="donation-summary-icon me-3">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Campaign Aktif</h6>
                        <h3 class="fw-bold mb-0">2,665</h3>
                        <p class="text-success small mb-0"><i class="bi bi-arrow-up"></i> 3.7% dari bulan lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Grafik --}}
    <div class="row mb-5">
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Total Donasi (6 Bulan Terakhir)</h5>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-outline-primary active">6 Bulan</button>
                            <button type="button" class="btn btn-outline-primary">1 Tahun</button>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="donationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm stat-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Kategori Donasi</h5>
                    <div class="chart-container">
                        <canvas id="categoryChart"></canvas>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div><i class="bi bi-circle-fill text-primary"></i> Pendidikan</div>
                            <div class="fw-bold">35%</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div><i class="bi bi-circle-fill text-success"></i> Kesehatan</div>
                            <div class="fw-bold">28%</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div><i class="bi bi-circle-fill text-warning"></i> Bencana Alam</div>
                            <div class="fw-bold">20%</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="bi bi-circle-fill text-danger"></i> Sosial & Lainnya</div>
                            <div class="fw-bold">17%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Activity Stats --}}
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm stat-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Top Donatur</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle text-white d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px">AS</div>
                                <div>
                                    <h6 class="mb-0">Ahmad Sulaiman</h6>
                                    <small class="text-muted">Jakarta</small>
                                </div>
                            </div>
                            <span class="badge bg-primary rounded-pill">Rp 15.5jt</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-info rounded-circle text-white d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px">SR</div>
                                <div>
                                    <h6 class="mb-0">Siti Rahmawati</h6>
                                    <small class="text-muted">Bandung</small>
                                </div>
                            </div>
                            <span class="badge bg-primary rounded-pill">Rp 12.8jt</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success rounded-circle text-white d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px">BH</div>
                                <div>
                                    <h6 class="mb-0">Budi Hartono</h6>
                                    <small class="text-muted">Surabaya</small>
                                </div>
                            </div>
                            <span class="badge bg-primary rounded-pill">Rp 10.2jt</span>
                        </li>
                    </ul>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm stat-card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Campaign Populer</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Campaign</th>
                                    <th>Kategori</th>
                                    <th>Target</th>
                                    <th>Terkumpul</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded me-3" style="width:40px;height:40px"></div>
                                            <div>Beasiswa Anak Yatim</div>
                                        </div>
                                    </td>
                                    <td>Pendidikan</td>
                                    <td>Rp 100jt</td>
                                    <td>Rp 85jt</td>
                                    <td>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded me-3" style="width:40px;height:40px"></div>
                                            <div>Bantuan Kesehatan Lansia</div>
                                        </div>
                                    </td>
                                    <td>Kesehatan</td>
                                    <td>Rp 75jt</td>
                                    <td>Rp 52jt</td>
                                    <td>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 69%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded me-3" style="width:40px;height:40px"></div>
                                            <div>Bangun Masjid Pelosok</div>
                                        </div>
                                    </td>
                                    <td>Ibadah</td>
                                    <td>Rp 500jt</td>
                                    <td>Rp 285jt</td>
                                    <td>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 57%"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua Campaign</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quote --}}
    <div class="quote-section text-center mb-5">
        <h2 class="fw-bold">Share Your <span class="text-primary">Kindness</span></h2>
        <p class="text-muted fst-italic">"Sekecil apapun kebaikan yang kamu berikan, bisa menjadi cahaya bagi mereka yang membutuhkan."</p>
    </div>

    {{-- Fitur Kartu --}}
    <h4 class="fw-bold mb-4">Fitur Unggulan</h4>
    <div class="row g-4 mb-5">
        @foreach ([
            ['title' => 'Volunteer', 'icon' => 'bi-people-fill', 'color' => 'bg-primary', 'desc' => 'Jadilah bagian dari relawan kemanusiaan'],
            ['title' => 'Galang Dana', 'icon' => 'bi-cash-coin', 'color' => 'bg-success', 'desc' => 'Buat campaign untuk kebaikan'],
            ['title' => 'Pembayaran Zakat', 'icon' => 'bi-wallet2', 'color' => 'bg-info', 'desc' => 'Tunaikan kewajiban dengan mudah'],
            ['title' => 'Komunitas', 'icon' => 'bi-heart-fill', 'color' => 'bg-warning', 'desc' => 'Bergabung dengan komunitas peduli'],
            ['title' => 'Gamifikasi & Reward', 'icon' => 'bi-trophy-fill', 'color' => 'bg-danger', 'desc' => 'Dapatkan hadiah dari kebaikan'],
            ['title' => 'Unggah Artikel', 'icon' => 'bi-journal-text', 'color' => 'bg-secondary', 'desc' => 'Bagikan inspirasi kebaikan'],
            ['title' => 'Donasi', 'icon' => 'bi-gift-fill', 'color' => 'bg-primary', 'desc' => 'Donasi untuk berbagai kebutuhan'],
            ['title' => 'Bookmark', 'icon' => 'bi-bookmark-heart-fill', 'color' => 'bg-success', 'desc' => 'Simpan campaign favorit'],
        ] as $item)
            <div class="col-sm-6 col-md-3">
                <div class="card h-100 text-center shadow-sm feature-card">
                    <div class="card-body">
                        <div class="feature-icon {{ $item['color'] }}">
                            <i class="{{ $item['icon'] }}"></i>
                        </div>
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        <p class="card-text text-muted small">{{ $item['desc'] }}</p>
                        @if ($item['title'] === 'Donasi')
                            <a href="{{ route('donations.index') }}" class="btn btn-primary mt-2">Lihat Donasi</a>
                        @endif
                        @if ($item['title'] === 'Pembayaran Zakat')
                            <a href="{{ route('zakat.index') }}" class="btn btn-outline-primary mt-2">Bayar Zakat</a>
                        @endif
                        @if ($item['title'] === 'Unggah Artikel')
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-primary mt-2">Tulis Artikel</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Quote Section 2 --}}
    <div class="quote-section text-center mb-4">
        <h5><strong>Menebar <span class="text-primary">Kasih</span>, Meraih <span class="text-info">Berkah Ilahi</span></strong></h5>
        <p class="text-muted fst-italic">"Dan barang siapa bersedekah kepada Allah, niscaya akan diberikan kemudahan baginya dalam urusannya."</p>
    </div>
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

    // Inisialisasi chart
    window.addEventListener('DOMContentLoaded', () => {
        const donationChart = new Chart(
            document.getElementById('donationChart'),
            donationConfig
        );
        
        const categoryChart = new Chart(
            document.getElementById('categoryChart'),
            categoryConfig
        );
    });
</script>
@endsection