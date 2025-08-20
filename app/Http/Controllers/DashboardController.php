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

        $sort_by = $request->input('sort_by', 'created_at');
        $sort_order = $request->input('sort_order', 'desc');

        $recentOrders = Order::where('header_footer_id', $website_id)
            ->with('customer')
            ->orderBy($sort_by, $sort_order)
            ->take(10)
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

    public function exportOrders($website_id)
    {
        if (!Session::has('userid')) {
            return redirect('/login');
        }

        $userId = Session::get('userid');
        $website = HeaderFooter::where('id', $website_id)->where('user_id', $userId)->first();

        if (!$website) {
            return redirect('/dashboard')->with('error', 'Website not found');
        }

        $orders = Order::where('header_footer_id', $website_id)->with(['customer', 'products.product'])->get();

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

            foreach ($orders as $order) {
                $status = ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'][$order->status] ?? 'Unknown';
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
