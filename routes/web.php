<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Admin\LogoutController;

//Route::inertia('/', 'Welcome')->name('home');

Route::get('/', [HomeController::class, 'index'])->name('website.home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    
    //Custom logout
    Route::post('/admin/logout', [LogoutController::class, 'logout'])->name('admin.logout');
});

require __DIR__.'/settings.php';
