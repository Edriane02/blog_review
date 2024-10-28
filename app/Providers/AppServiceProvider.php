<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

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

    // Sharing Variables Globally
    // If $tags should be available in all views, consider using a service provider to share it globally.
    public function boot(): void
    {
       
    }
}
