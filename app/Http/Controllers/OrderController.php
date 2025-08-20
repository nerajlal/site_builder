<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request, $headerFooterId)
    {
        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();

        if (!$siteCustomerId) {
            return response()->json(['success' => false, 'message' => 'User not logged in.'], 401);
        }

        $cartItems = Cart::where('header_footer_id', $headerFooterId)
            ->where('site_customer_id', $siteCustomerId)
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Your cart is empty.'], 400);
        }

        DB::beginTransaction();

        try {
            $totalAmount = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            $order = Order::create([
                'header_footer_id' => $headerFooterId,
                'site_customer_id' => $siteCustomerId,
                'total_amount' => $totalAmount,
                'status' => 0,
            ]);

            foreach ($cartItems as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                // Decrease product stock
                $product = Product::find($item->product_id);
                $product->quantity -= $item->quantity;
                $product->save();
            }

            // Clear the cart
            Cart::where('header_footer_id', $headerFooterId)
                ->where('site_customer_id', $siteCustomerId)
                ->delete();

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Order placed successfully!']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Failed to place order. ' . $e->getMessage()], 500);
        }
    }
}
