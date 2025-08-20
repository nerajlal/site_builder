<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Models\HeaderFooter;
use App\Models\Order;

class NewOrderCountComposer
{
    public function compose(View $view)
    {
        if (!Session::has('userid')) {
            $view->with('newOrderCount', 0);
            return;
        }

        $userId = Session::get('userid');
        $websiteIds = HeaderFooter::where('user_id', $userId)->pluck('id');

        $newOrderCount = Order::whereIn('header_footer_id', $websiteIds)->where('status', 0)->count();

        $view->with('newOrderCount', $newOrderCount);
    }
}
