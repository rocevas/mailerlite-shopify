<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailerLiteController;
use App\Http\Middleware\EnsureMailerLiteApiKey;
use Illuminate\Support\Facades\Route;

Route::middleware(['verify.shopify'])->group( function () {

    // Route for MailerLite API key settings (accessible to all authenticated users)
    Route::get('/mailerlite/connect', [MailerLiteController::class, 'index'])->name('mailerlite.connect');
    Route::post('/mailerlite/connect', [MailerLiteController::class, 'store'])->name('mailerlite.connect.store');

    Route::middleware([EnsureMailerLiteApiKey::class])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('home');
    });

});

