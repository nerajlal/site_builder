<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $headerFooterId)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'options' => 'nullable|array',
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $options = $request->input('options', []);

        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();

        $cartQuery = Cart::where('header_footer_id', $headerFooterId)
            ->where('product_id', $productId)
            ->where(function ($query) use ($siteCustomerId, $sessionId) {
                if ($siteCustomerId) {
                    $query->where('site_customer_id', $siteCustomerId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            });

        // If options are provided, match them
        if (!empty($options)) {
            $cartQuery->whereJsonContains('options', $options);
        }

        $cartItem = $cartQuery->first();

        if ($cartItem) {
            // Update quantity if item exists
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Create a new cart item
            $cartItem = Cart::create([
                'header_footer_id' => $headerFooterId,
                'site_customer_id' => $siteCustomerId,
                'session_id' => $siteCustomerId ? null : $sessionId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'options' => $options,
            ]);
        }

        $cartCount = $this->getCartItemCount($headerFooterId, $siteCustomerId, $sessionId);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => $cartCount,
        ]);
    }

    public function getCartCount($headerFooterId)
    {
        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();

        $cartCount = $this->getCartItemCount($headerFooterId, $siteCustomerId, $sessionId);

        return response()->json(['cart_count' => $cartCount]);
    }

    private function getCartItemCount($headerFooterId, $siteCustomerId, $sessionId)
    {
        $query = Cart::where('header_footer_id', $headerFooterId);

        if ($siteCustomerId) {
            $query->where('site_customer_id', $siteCustomerId);
        } else {
            $query->where('session_id', $sessionId);
        }

        return $query->sum('quantity');
    }
}
