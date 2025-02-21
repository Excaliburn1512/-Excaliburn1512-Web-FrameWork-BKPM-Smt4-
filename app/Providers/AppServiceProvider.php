<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Route;
use App\Http\Middleware\StartSession;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(StartSession::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+');
    }
}
