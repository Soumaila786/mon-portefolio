<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact');
Route::post('/profile/photo', [PortfolioController::class, 'uploadPhoto'])->name('profile.upload');
