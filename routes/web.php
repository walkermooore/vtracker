<?php

use App\Livewire\VulnerabilityManager;
use Illuminate\Support\Facades\Route;
use App\Livewire\AssetManager;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/assets', AssetManager::class)
    ->middleware(['auth', 'verified'])
    ->name('assets.index');

Route::get('/vulnerabilities', VulnerabilityManager::class)
    ->middleware(['auth', 'verified'])
    ->name('vulnerabilities.index');

require __DIR__.'/auth.php';
