<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['template1.head1', 'template2.head2', 'template3.head3', 'template4.head4'], function ($view) {
            $headerFooterId = $view->getData()['headerFooter']->id ?? null;
            $wishlistCount = 0;
            if ($headerFooterId) {
                $siteCustomerId = Session::get('site_customer_id');
                $sessionId = Session::getId();

                $query = Wishlist::where('header_footer_id', $headerFooterId);

                if ($siteCustomerId) {
                    $query->where('site_customer_id', $siteCustomerId);
                } else {
                    $query->where('session_id', $sessionId);
                }
                $wishlistCount = $query->count();
            }
            $view->with('wishlistCount', $wishlistCount);
        });
    }
}
