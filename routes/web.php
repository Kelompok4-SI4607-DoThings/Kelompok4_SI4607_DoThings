<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('landing');
});

// AUTH Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

use App\Http\Controllers\ZakatAdminController;

Route::get('/zakatAdmin', [ZakatAdminController::class, 'index'])->name('zakatAdmin.index');
Route::get('/zakatAdmin/create', [ZakatAdminController::class, 'create'])->name('zakatAdmin.create');
Route::post('/zakatAdmin', [ZakatAdminController::class, 'store'])->name('zakatAdmin.store');
Route::get('/zakatAdmin/{id}', [ZakatAdminController::class, 'show'])->name('zakatAdmin.show');
Route::get('/zakatAdmin/{id}/edit', [ZakatAdminController::class, 'edit'])->name('zakatAdmin.edit');
Route::put('/zakatAdmin/{id}', [ZakatAdminController::class, 'update'])->name('zakatAdmin.update');
Route::delete('/zakatAdmin/{id}', [ZakatAdminController::class, 'destroy'])->name('zakatAdmin.destroy');
