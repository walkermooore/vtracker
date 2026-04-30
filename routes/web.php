<?php

use App\Livewire\VulnerabilityManager;
use Illuminate\Support\Facades\Route;
use App\Livewire\AssetManager;
use App\Livewire\VulnerabilityDetail;
use App\Http\Controllers\DashboardController;
use App\Livewire\AuditLog;

Route::view('/', 'welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])
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

Route::get('/vulnerabilities/{id}', VulnerabilityDetail::class)
    ->middleware(['auth', 'verified'])
    ->name('vulnerabilities.show');

Route::get('/audit', AuditLog::class)
    ->middleware(['auth'])
    ->name('audit.index');

require __DIR__.'/auth.php';
