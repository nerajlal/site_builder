<?php

namespace App\Providers;

use App\Models\Cart;
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
            $headerFooter = $view->getData()['headerFooter'] ?? null;
            $headerFooterId = $headerFooter->id ?? null;

            $wishlistCount = 0;
            $cartCount = 0;

            if ($headerFooterId) {
                $siteCustomerId = Session::get('site_customer_id');
                $sessionId = Session::getId();

                // Wishlist count
                $wishlistQuery = Wishlist::where('header_footer_id', $headerFooterId);
                if ($siteCustomerId) {
                    $wishlistQuery->where('site_customer_id', $siteCustomerId);
                } else {
                    $wishlistQuery->where('session_id', $sessionId);
                }
                $wishlistCount = $wishlistQuery->count();

                // Cart count
                $cartQuery = Cart::where('header_footer_id', $headerFooterId);
                if ($siteCustomerId) {
                    $cartQuery->where('site_customer_id', $siteCustomerId);
                } else {
                    $cartQuery->where('session_id', $sessionId);
                }
                $cartCount = $cartQuery->sum('quantity');
            }

            $view->with('wishlistCount', $wishlistCount)->with('cartCount', $cartCount);
        });
    }
}
