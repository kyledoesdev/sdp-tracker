<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::middleware(['auth'])->group(function() {

    Route::post('/debate/store', [App\Http\Controllers\DebateController::class, 'store'])->name('debate.store');
    Route::post('/debate/{id}/update', [App\Http\Controllers\DebateController::class, 'update'])->name('debate.update');
    Route::post('/debate/{id}/delete', [App\Http\Controllers\DebateController::class, 'delete'])->name('debate.delete');

});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
