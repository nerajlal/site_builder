<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\HeaderFooter;
use App\Models\SelectedTemplate;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index($headerFooterId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);
        if (!$headerFooter) {
            abort(404, 'Header/Footer not found');
        }

        $siteCustomerId = Session::get('site_customer_id');
        if (!$siteCustomerId) {
            return redirect()->route('template1.index1.customer', ['headerFooterId' => $headerFooterId]);
        }

        $orders = Order::where('site_customer_id', $siteCustomerId)
            ->with('products.product')
            ->orderBy('created_at', 'desc')
            ->get();

        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();
        $templateId = '1'; // Default to 1
        if ($selectedTemplate) {
            preg_match('/template(\d+)/', $selectedTemplate->template_name, $matches);
            if (isset($matches[1])) {
                $templateId = $matches[1];
            }
        }

        $viewName = 'template' . $templateId . '.orders' . $templateId;

        return view($viewName, [
            'is_default' => false,
            'headerFooter' => $headerFooter,
            'orders' => $orders,
        ]);
    }

    public function placeOrder(Request $request, $headerFooterId)
    {
        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();

        if (!$siteCustomerId) {
            return response()->json(['success' => false, 'message' => 'User not logged in.'], 401);
        }

        $customer = \App\Models\SiteCustomer::find($siteCustomerId);
        if (
            !$customer ||
            empty($customer->address_line_1) ||
            empty($customer->city) ||
            empty($customer->state) ||
            empty($customer->postal_code) ||
            empty($customer->country) ||
            empty($customer->phone)
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Please update your profile with your shipping address and phone number before placing an order.',
                'redirect_to_profile' => true
            ], 400);
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
                $product = $item->product;
                if ($product->quantity < $item->quantity) {
                    throw new \Exception('Not enough stock for product: ' . $product->name);
                }
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

    public function updateStatus(Request $request, $order_id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|integer|in:0,1,2,3,4,5,6,7',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $order = Order::findOrFail($order_id);
            $order->status = $request->input('status');
            $order->save();

            return response()->json(['success' => true, 'message' => 'Order status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update order status.'], 500);
        }
    }

    public function show($order_id)
    {
        try {
            $order = Order::with(['customer', 'products.product'])->findOrFail($order_id);
            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Order not found.'], 404);
        }
    }
}
