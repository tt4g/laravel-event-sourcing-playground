<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [WelcomeController::class, 'index']
)->name('home');

Route::inertia('dashboard', 'dashboard')->name('dashboard');
