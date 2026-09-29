<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/auth/google', [AuthController::class, 'googleRedirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [AuthController::class, 'googleCallback'])->name('google.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [QrCodeController::class, 'dashboard'])->name('dashboard');

    Route::get('/qr-generator', [QrCodeController::class, 'index'])->name('qr.generator');
    Route::post('/qr-generator', [QrCodeController::class, 'store'])->name('qr.store');
    Route::delete('/qr-generator/{qrCode}', [QrCodeController::class, 'destroy'])->name('qr.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.store');
    });

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/clients/{user}', [AdminDashboardController::class, 'client'])->name('client');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});

Route::get('/qr-image/{user}/{filename}', function ($user, $filename) {
    $path = 'qrcodes/' . $user . '/' . $filename;

    abort_unless(
        Storage::disk('public')->exists($path),
        404
    );

    return response()->file(
        Storage::disk('public')->path($path)
    );
})->name('qr.image');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile/avatar', [ProfileController::class, 'destroyAvatar'])
        ->name('profile.avatar.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/qr-image/{user}/{filename}', [QrCodeController::class, 'image'])
        ->name('qr.image');
    Route::get('/qr-generator/{qrCode}/download', [QrCodeController::class, 'download'])->name('qr.download');
});
Route::post('/heartbeat', function () {
    auth()->user()->updateQuietly([
        'last_seen_at' => now(),
    ]);

    return response()->json([
        'online' => true,
    ]);
})->middleware('auth')->name('heartbeat');