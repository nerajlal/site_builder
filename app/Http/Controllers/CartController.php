<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\HeaderFooter;
use App\Models\SelectedTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getCartItems($headerFooterId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);
        if (!$headerFooter) {
            abort(404, 'Header/Footer not found');
        }

        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();

        $cartQuery = Cart::where('header_footer_id', $headerFooterId)
            ->where(function ($query) use ($siteCustomerId, $sessionId) {
                if ($siteCustomerId) {
                    $query->where('site_customer_id', $siteCustomerId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            });

        $cartItems = $cartQuery->with('product')->get();

        $totalPrice = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        // Determine the template to use
        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();
        $templateId = '1'; // Default to 1
        if ($selectedTemplate) {
            // Extract the template number from the template_name (e.g., 'template1.index1')
            preg_match('/template(\d+)/', $selectedTemplate->template_name, $matches);
            if (isset($matches[1])) {
                $templateId = $matches[1];
            }
        }

        $viewName = 'template' . $templateId . '.cart' . $templateId;

        return view($viewName, [
            'is_default' => false,
            'headerFooter' => $headerFooter,
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }

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
