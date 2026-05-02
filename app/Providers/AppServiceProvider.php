<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Vulnerability;
use App\Observers\VulnerabilityObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vulnerability::observe(VulnerabilityObserver::class);
    }
}
