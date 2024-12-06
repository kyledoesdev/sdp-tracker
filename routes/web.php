<?php

use App\Livewire\Episodes;
use App\Livewire\Home;
use App\Livewire\Stats;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect(route('home').'?season=3'))->name('root');
Route::get('/home', Home::class)->name('home');
Route::get('/stats', Stats::class)->name('stats');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', Episodes::class)->name('dashboard');
    Route::view('/profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';