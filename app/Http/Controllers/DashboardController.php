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

    public function getWebsiteStats(Request $request, $website_id)
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

        // Percentage change calculations
        $currentMonthStart = now()->startOfMonth();
        $currentMonthEnd = now()->endOfMonth();
        $lastMonthStart = now()->subMonth()->startOfMonth();
        $lastMonthEnd = now()->subMonth()->endOfMonth();

        $salesCurrentMonth = Order::where('header_footer_id', $website_id)->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->sum('total_amount');
        $salesLastMonth = Order::where('header_footer_id', $website_id)->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->sum('total_amount');
        $salesChange = $salesLastMonth > 0 ? (($salesCurrentMonth - $salesLastMonth) / $salesLastMonth) * 100 : ($salesCurrentMonth > 0 ? 100 : 0);

        $productsSoldCurrentMonth = Order::where('header_footer_id', $website_id)->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->withCount('products')->get()->sum('products_count');
        $productsSoldLastMonth = Order::where('header_footer_id', $website_id)->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->withCount('products')->get()->sum('products_count');
        $productsSoldChange = $productsSoldLastMonth > 0 ? (($productsSoldCurrentMonth - $productsSoldLastMonth) / $productsSoldLastMonth) * 100 : ($productsSoldCurrentMonth > 0 ? 100 : 0);

        $customersCurrentMonth = Order::where('header_footer_id', $website_id)->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->distinct('site_customer_id')->count();
        $customersLastMonth = Order::where('header_footer_id', $website_id)->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->distinct('site_customer_id')->count();
        $customersChange = $customersLastMonth > 0 ? (($customersCurrentMonth - $customersLastMonth) / $customersLastMonth) * 100 : ($customersCurrentMonth > 0 ? 100 : 0);

        $date_filter = $request->input('date_filter', 'all');
        $status_filter = $request->input('status_filter', 'all');

        $ordersQuery = Order::where('header_footer_id', $website_id)->with('customer');

        if ($date_filter != 'all') {
            switch ($date_filter) {
                case 'today':
                    $ordersQuery->whereDate('created_at', today());
                    break;
                case 'week':
                    $ordersQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $ordersQuery->whereMonth('created_at', now()->month);
                    break;
                case 'year':
                    $ordersQuery->whereYear('created_at', now()->year);
                    break;
            }
        }

        if ($status_filter != 'all') {
            $ordersQuery->where('status', $status_filter);
        }

        $orders = $ordersQuery->orderBy('created_at', 'desc')->get();

        return response()->json([
            'total_sales' => number_format($totalSales, 2),
            'products_sold' => $productsSoldCount,
            'active_customers' => $activeCustomersCount,
            'inventory_items' => $inventoryItemsCount,
            'low_stock_items' => $lowStockItemsCount,
            'orders' => $orders,
            'sales_change' => round($salesChange, 2),
            'products_sold_change' => round($productsSoldChange, 2),
            'customers_change' => round($customersChange, 2),
        ]);
    }

    public function exportOrders(Request $request, $website_id)
    {
        if (!Session::has('userid')) {
            return redirect('/login');
        }

        $userId = Session::get('userid');
        $website = HeaderFooter::where('id', $website_id)->where('user_id', $userId)->first();

        if (!$website) {
            return redirect('/dashboard')->with('error', 'Website not found');
        }

        $date_filter = $request->input('date_filter', 'all');
        $status_filter = $request->input('status_filter', 'all');

        $ordersQuery = Order::where('header_footer_id', $website_id)->with(['customer', 'products.product']);

        if ($date_filter != 'all') {
            switch ($date_filter) {
                case 'today':
                    $ordersQuery->whereDate('created_at', today());
                    break;
                case 'week':
                    $ordersQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $ordersQuery->whereMonth('created_at', now()->month);
                    break;
                case 'year':
                    $ordersQuery->whereYear('created_at', now()->year);
                    break;
            }
        }

        if ($status_filter != 'all') {
            $ordersQuery->where('status', $status_filter);
        }

        $orders = $ordersQuery->get();

        $fileName = "orders-{$website->site_name}-" . date('Y-m-d') . ".csv";

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = ['Order ID', 'Order Date', 'Order Status', 'Customer Name', 'Customer Phone', 'Customer Address', 'Product Name', 'Product SKU', 'Quantity', 'Price', 'Total Amount'];

        $callback = function() use($orders, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            $statuses = [0 => 'New', 1 => 'Pending', 2 => 'Packed', 3 => 'Ready to Ship', 4 => 'Shipped', 5 => 'Out for Delivery', 6 => 'Delivered', 7 => 'Cancelled'];

            foreach ($orders as $order) {
                $status = $statuses[$order->status] ?? 'Unknown';
                $address = $order->customer ? "{$order->customer->address_line_1}, {$order->customer->city}, {$order->customer->state}" : 'N/A';

                if ($order->products->isEmpty()) {
                    $row['Order ID'] = $order->id;
                    $row['Order Date'] = $order->created_at;
                    $row['Order Status'] = $status;
                    $row['Customer Name'] = $order->customer ? $order->customer->name : 'N/A';
                    $row['Customer Phone'] = $order->customer ? $order->customer->phone : 'N/A';
                    $row['Customer Address'] = $address;
                    $row['Product Name'] = 'N/A';
                    $row['Product SKU'] = 'N/A';
                    $row['Quantity'] = 'N/A';
                    $row['Price'] = 'N/A';
                    $row['Total Amount'] = $order->total_amount;
                    fputcsv($file, array_values($row));
                } else {
                    foreach ($order->products as $orderProduct) {
                        $row['Order ID'] = $order->id;
                        $row['Order Date'] = $order->created_at;
                        $row['Order Status'] = $status;
                        $row['Customer Name'] = $order->customer ? $order->customer->name : 'N/A';
                        $row['Customer Phone'] = $order->customer ? $order->customer->phone : 'N/A';
                        $row['Customer Address'] = $address;
                        $row['Product Name'] = $orderProduct->product ? $orderProduct->product->name : 'N/A';
                        $row['Product SKU'] = $orderProduct->product ? $orderProduct->product->sku : 'N/A';
                        $row['Quantity'] = $orderProduct->quantity;
                        $row['Price'] = $orderProduct->price;
                        $row['Total Amount'] = $order->total_amount;
                        fputcsv($file, array_values($row));
                    }
                }
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
