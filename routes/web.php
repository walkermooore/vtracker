<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\VulnerabilityManager;
use App\Livewire\AssetManager;
use App\Livewire\VulnerabilityDetail;
use App\Http\Controllers\DashboardController;
use App\Livewire\AuditLog;
use App\Livewire\VulnerabilityList;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/assets', AssetManager::class)
    ->middleware(['auth', 'verified'])
    ->name('assets.index');

Route::get('/audit', AuditLog::class)
    ->middleware(['auth'])
    ->name('audit.index');

// ==========================================
// GRUPO DE ROTAS DE VULNERABILIDADES
// ==========================================

Route::get('/vulnerabilities', VulnerabilityList::class)
    ->middleware(['auth', 'verified'])
    ->name('vulnerabilities.index');

Route::get('/vulnerabilities/create', VulnerabilityManager::class)
    ->middleware(['auth', 'verified'])
    ->name('vulnerabilities.create');

Route::get('/vulnerabilities/{id}', VulnerabilityDetail::class)
    ->middleware(['auth', 'verified'])
    ->name('vulnerabilities.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/vulnerabilities/{vulnerability}/pdf', function (App\Models\Vulnerability $vulnerability) {
        $pdf = Pdf::loadView('reports.vulnerability-pdf', compact('vulnerability'));
        return $pdf->download("relatorio-vulnerabilidade-{$vulnerability->id}.pdf");
    })->name('vulnerabilities.pdf');
});

require __DIR__.'/auth.php';
