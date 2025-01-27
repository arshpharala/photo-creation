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
        // Use reflection to access the protected $publicPath property in Application.php
        $reflection = new \ReflectionClass(\Illuminate\Foundation\Application::class);

        // Access the protected $publicPath property
        $property = $reflection->getProperty('publicPath');
        $property->setAccessible(true); // Allow access to the protected property

        // Set the new value for the publicPath to 'public_html'
        $property->setValue($this->app, base_path('public_html'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
