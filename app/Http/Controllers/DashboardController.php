<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Session::has('userid')) {
            return redirect('/login');
        }

        $userId = Session::get('userid');
        $websites = HeaderFooter::where('user_id', $userId)->get();

        return view('dashboard', ['websites' => $websites]);
    }

    public function getWebsiteStats($website_id)
    {
        if (!Session::has('userid')) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $userId = Session::get('userid');
        $website = HeaderFooter::where('id', $website_id)->where('user_id', $userId)->first();

        if (!$website) {
            return response()->json(['error' => 'Website not found'], 404);
        }

        $totalSales = Order::where('header_footer_id', $website_id)->sum('total_amount');
        $productsSoldCount = Order::where('header_footer_id', $website_id)->withCount('products')->get()->sum('products_count');
        $activeCustomersCount = Order::where('header_footer_id', $website_id)->distinct('site_customer_id')->count();
        $inventoryItemsCount = Product::where('header_footer_id', $website_id)->count();
        $lowStockItemsCount = Product::where('header_footer_id', $website_id)->where('quantity', '<', 10)->count();

        $recentOrders = Order::where('header_footer_id', $website_id)
            ->with('customer')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'total_sales' => number_format($totalSales, 2),
            'products_sold' => $productsSoldCount,
            'active_customers' => $activeCustomersCount,
            'inventory_items' => $inventoryItemsCount,
            'low_stock_items' => $lowStockItemsCount,
            'recent_orders' => $recentOrders,
        ]);
    }
}
