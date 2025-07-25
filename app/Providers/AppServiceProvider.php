<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // No request logic here
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }

    
}
