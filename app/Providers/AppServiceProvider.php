<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Health
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;

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
        // Filamet Health
        Health::checks([
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            DatabaseCheck::new(),
            UsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(70) // Warning jika 70% penuh
                ->failWhenUsedSpaceIsAbovePercentage(90),
        ]);
    }
}
