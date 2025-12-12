<?php

use App\Http\Middleware\IsDeveloper;
use App\Livewire\Episodes;
use App\Livewire\Home;
use App\Livewire\Stats;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

Route::get('/', fn() => redirect(route('home')))->name('root');
Route::get('/home', Home::class)->name('home');
Route::get('/stats', Stats::class)->name('stats');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', Episodes::class)->name('dashboard');
    Route::view('/profile', 'profile')->name('profile');

    Route::middleware(IsDeveloper::class)->group(function() {
        Route::get('health', HealthCheckResultsController::class);
    });
});

require __DIR__.'/auth.php';