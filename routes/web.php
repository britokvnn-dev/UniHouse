<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Listings Auth Routes
    Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/upgrade', [ProfileController::class, 'upgradeRole'])->name('profile.upgrade');

    // Admin Routes
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/approve/{listing}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/admin/reject/{listing}', [AdminController::class, 'reject'])->name('admin.reject');
});

// Listings Public Routes
Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');
