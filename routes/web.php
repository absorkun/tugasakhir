<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::redirect('/', '/dashboard', 302)->name('home');

// Route::get('/home', function () {
//     return view('welcome');
// })->name('home');

Route::get('/payment', [PaymentController::class, "createCharge"])->name('payment');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('pemilik', 'pemilik')
    ->middleware(['auth', 'verified'])
    ->name('pemilik');

Route::view('kendaraan', 'kendaraan')
    ->middleware(['auth', 'verified'])
    ->name('kendaraan');

Route::view('tagihan', 'tagihan')
    ->middleware(['auth', 'verified'])
    ->name('tagihan');

Route::view('portal-bayar', 'portal-bayar')
    ->middleware(['auth', 'verified'])
    ->name('portal-bayar');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
