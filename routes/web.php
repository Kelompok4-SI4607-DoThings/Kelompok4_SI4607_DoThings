<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('landing');
});

// AUTH Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/create/{campaign}', [DonationController::class, 'create'])->name('donations.create');
    Route::post('/donations/store', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/donations/{donation}/edit', [DonationController::class, 'edit'])->name('donations.edit');
    Route::put('/donations/{donation}', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('/donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');
    Route::get('/my-donations', [DonationController::class, 'show'])->name('donations.show');
// Redirect after login, based on role
Route::get('/redirect-dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware('auth');

// DASHBOARD USER
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// DASHBOARD ADMIN
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::resource('campaigns', CampaignController::class);
// Route::prefix('/campaigns')->name('user.campaigns.')->group(function () {
//     Route::get('/', [CampaignController::class, 'index'])->name('index');          // Menampilkan daftar campaign
//     Route::get('/create', [CampaignController::class, 'create'])->name('user.campaigns.create');  // Form tambah campaign
//     Route::post('/', [CampaignController::class, 'store'])->name('store');         // Simpan campaign baru
//     Route::get('/{id}', [CampaignController::class, 'show'])->name('show');        // Tampilkan detail campaign
//     Route::get('/{id}/edit', [CampaignController::class, 'edit'])->name('edit');   // Form edit campaign
//     Route::put('/{id}', [CampaignController::class, 'update'])->name('update');    // Update campaign
//     Route::delete('/{id}', [CampaignController::class, 'destroy'])->name('destroy'); // Hapus campaign
// });





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\ZakatController;

Route::get('/zakat/create', [ZakatController::class, 'create'])->name('user.zakat.create');
Route::post('/zakat/store', [ZakatController::class, 'store'])->name('user.zakat.store');
Route::get('/zakat/{id}', [ZakatController::class, 'show'])->name('user.zakat.show'); // Show
Route::get('/zakat/{id}/edit', [ZakatController::class, 'edit'])->name('zakat.edit'); // Edit
Route::put('/zakat/{id}', [ZakatController::class, 'update'])->name('zakat.update'); // Update
Route::delete('/zakat/{id}', [ZakatController::class, 'destroy'])->name('zakat.destroy'); // Delete

use App\Http\Controllers\ZakatAdminController;

Route::get('/zakatAdmin', [ZakatAdminController::class, 'index'])->name('zakatAdmin.index');
Route::get('/zakatAdmin/create', [ZakatAdminController::class, 'create'])->name('zakatAdmin.create');
Route::post('/zakatAdmin', [ZakatAdminController::class, 'store'])->name('zakatAdmin.store');
Route::get('/zakatAdmin/{id}', [ZakatAdminController::class, 'show'])->name('zakatAdmin.show');
Route::get('/zakatAdmin/{id}/edit', [ZakatAdminController::class, 'edit'])->name('zakatAdmin.edit');
Route::put('/zakatAdmin/{id}', [ZakatAdminController::class, 'update'])->name('zakatAdmin.update');
Route::delete('/zakatAdmin/{id}', [ZakatAdminController::class, 'destroy'])->name('zakatAdmin.destroy');

use App\Http\Controllers\ArticleController;



Route::prefix('user/artikel')->group(function () {
    // Menampilkan daftar artikel
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

    // Menampilkan form untuk membuat artikel
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');

    // Menyimpan artikel baru
    Route::post('/', [ArticleController::class, 'store'])->name('articles.store');

    // Menampilkan artikel berdasarkan ID
    Route::get('/{id}', [ArticleController::class, 'show'])->name('articles.show');

    // Menampilkan form untuk mengedit artikel
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

    // Memperbarui artikel
    Route::put('/{id}', [ArticleController::class, 'update'])->name('articles.update');

    // Menghapus artikel
    Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});