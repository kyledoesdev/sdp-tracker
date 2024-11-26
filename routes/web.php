<?php

use App\Livewire\Episodes;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/home', Home::class)->name('home');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', Episodes::class)->name('dashboard');
    Route::view('/profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';