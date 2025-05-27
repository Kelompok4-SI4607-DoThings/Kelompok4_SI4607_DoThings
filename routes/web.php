<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\ZakatAdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalangDanaController;
use App\Http\Controllers\GalangDanaAdminController;
use App\Http\Controllers\VolunteerAdminController;
// Landing Page
Route::get('/', function () {
    return view('landing');
});

// AUTH Routes
// Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// });

// Redirect after login, based on role
Route::get('/redirect-dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware('auth');

// DASHBOARD Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});

// Campaign Routes

Route::prefix('admin')->name('campaigns.')->group(function () {
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('index');
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('store'); // Tambahkan rute ini
    Route::get('/campaigns/{id}', [CampaignController::class, 'show'])->name('show');
    Route::get('/campaigns/{id}/edit', [CampaignController::class, 'edit'])->name('edit');
    Route::put('/campaigns/{id}', [CampaignController::class, 'update'])->name('update');
    Route::delete('/campaigns/{id}', [CampaignController::class, 'destroy'])->name('destroy');
});
// Donation Routes
Route::middleware(['auth'])->prefix('donations')->name('donations.')->group(function () {
    Route::get('/', [DonationController::class, 'index'])->name('index');
    Route::get('/create/{campaign}', [DonationController::class, 'create'])->name('create');
    Route::post('/store', [DonationController::class, 'store'])->name('store');
    Route::get('/my-donations', [DonationController::class, 'show'])->name('show');
    Route::get('/{donation}/edit', [DonationController::class, 'edit'])->name('edit');
    Route::put('/{donation}', [DonationController::class, 'update'])->name('update');
    Route::delete('/{donation}', [DonationController::class, 'destroy'])->name('destroy'); // Pastikan rute ini ada
});

// Zakat Routes
Route::prefix('zakat')->name('zakat.')->group(function () {
    Route::get('/', [ZakatController::class, 'index'])->name('index'); // Menampilkan daftar zakat
    Route::get('/create', [ZakatController::class, 'create'])->name('create'); // Menampilkan form tambah zakat
    Route::post('/', [ZakatController::class, 'store'])->name('store'); // Menyimpan data zakat
    Route::get('/{id}/edit', [ZakatController::class, 'edit'])->name('edit'); // Menampilkan form edit zakat
    Route::put('/{id}', [ZakatController::class, 'update'])->name('update'); // Memperbarui data zakat
    Route::delete('/{id}', [ZakatController::class, 'destroy'])->name('destroy'); // Menghapus data zakat
    Route::post('/{id}/pay', [ZakatController::class, 'processPayment'])->name('processPayment');
    Route::get('/{id}', [ZakatController::class, 'show'])->name('show'); // Menampilkan detail zakat
    Route::get('/{id}/pay', [ZakatController::class, 'pay'])->name('pay'); // Rute untuk tombol Bayar
});

// Zakat Admin Routes
Route::prefix('zakatAdmin')->name('zakatAdmin.')->group(function () {
    Route::get('/', [ZakatAdminController::class, 'index'])->name('index');
    Route::get('/create', [ZakatAdminController::class, 'create'])->name('create');
    Route::post('/', [ZakatAdminController::class, 'store'])->name('store');
    Route::get('/{id}', [ZakatAdminController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [ZakatAdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ZakatAdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [ZakatAdminController::class, 'destroy'])->name('destroy');
    Route::get('/user-zakat', [ZakatAdminController::class, 'viewUserZakat'])->name('userZakat'); // Melihat zakat user
    Route::put('/{id}/update-status', [ZakatAdminController::class, 'updateStatus'])->name('updateStatus'); // Mengubah status zakat user
});

// Article Routes

Route::prefix('user/artikel')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/', [ArticleController::class, 'store'])->name('store');
    Route::get('/{id}', [ArticleController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('edit'); // Rute untuk edit artikel
    Route::put('/{id}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('destroy');
});

// Profile Routes
Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('show');
    Route::put('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy'); // Tambahkan rute ini
});

// Rute untuk user
Route::middleware(['auth'])->prefix('zakat')->name('zakat.')->group(function () {
    Route::get('/', [ZakatController::class, 'index'])->name('index');
    Route::post('/', [ZakatController::class, 'store'])->name('store');
});

// Rute untuk admin
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/zakat', [ZakatAdminController::class, 'index'])->name('admin.zakat.index');
    Route::get('/zakat/{id}', [ZakatAdminController::class, 'show'])->name('admin.zakat.show');
    Route::get('/zakat/{id}/edit', [ZakatAdminController::class, 'edit'])->name('admin.zakat.edit');
    Route::put('/zakat/{id}', [ZakatAdminController::class, 'update'])->name('admin.zakat.update');
    Route::delete('/zakat/{id}', [ZakatAdminController::class, 'destroy'])->name('admin.zakat.destroy');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
//     Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/galang-dana', [GalangDanaController::class, 'index'])->name('GalangDana.index');
    Route::get('/galang-dana/create', [GalangDanaController::class, 'create'])->name('GalangDana.create');
    Route::post('/galang-dana', [GalangDanaController::class, 'store'])->name('GalangDana.store');
});

Route::middleware(['auth'])->prefix('admin/galang-dana')->name('galangDanaAdmin.')->group(function () {
    Route::get('/', [GalangDanaAdminController::class, 'index'])->name('index');
    Route::get('/{id}', [GalangDanaAdminController::class, 'show'])->name('show');
    Route::patch('/{id}', [GalangDanaAdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [GalangDanaAdminController::class, 'destroy'])->name('destroy');
});

//volunteer admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/volunteeradmin', [VolunteerAdminController::class, 'index'])->name('volunteerAdmin.index');
    Route::get('/volunteeradmin/create', [VolunteerAdminController::class, 'create'])->name('volunteerAdmin.create');
    Route::post('/volunteeradmin', [VolunteerAdminController::class, 'store'])->name('volunteerAdmin.store');
    Route::get('/volunteeradmin/{volunteeradmin}', [VolunteerAdminController::class, 'show'])->name('volunteerAdmin.show');
    Route::get('/volunteeradmin/{volunteeradmin}/edit', [VolunteerAdminController::class, 'edit'])->name('volunteerAdmin.edit');
    Route::put('/volunteeradmin/{volunteeradmin}', [VolunteerAdminController::class, 'update'])->name('volunteerAdmin.update');
    Route::delete('/volunteeradmin/{volunteeradmin}', [VolunteerAdminController::class, 'destroy'])->name('volunteerAdmin.destroy');
});