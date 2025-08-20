<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\NewOrderCountComposer;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // No request logic here
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
        View::composer('includes.d_head', NewOrderCountComposer::class);
    }

    
}
