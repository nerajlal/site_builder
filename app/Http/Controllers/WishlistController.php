<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $headerFooterId)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $productId = $request->input('product_id');

        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();

        $wishlistQuery = Wishlist::where('header_footer_id', $headerFooterId)
            ->where('product_id', $productId)
            ->where(function ($query) use ($siteCustomerId, $sessionId) {
                if ($siteCustomerId) {
                    $query->where('site_customer_id', $siteCustomerId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            });

        $wishlistItem = $wishlistQuery->first();

        if ($wishlistItem) {
            return response()->json([
                'success' => false,
                'message' => 'Product already in wishlist!',
            ]);
        }

        Wishlist::create([
            'header_footer_id' => $headerFooterId,
            'site_customer_id' => $siteCustomerId,
            'session_id' => $siteCustomerId ? null : $sessionId,
            'product_id' => $productId,
        ]);

        $wishlistCount = $this->getWishlistItemCount($headerFooterId, $siteCustomerId, $sessionId);

        return response()->json([
            'success' => true,
            'message' => 'Product added to wishlist successfully!',
            'wishlist_count' => $wishlistCount,
        ]);
    }

    public function removeFromWishlist(Request $request, $headerFooterId)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $productId = $request->input('product_id');
        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();

        $wishlistItem = Wishlist::where('header_footer_id', $headerFooterId)
            ->where('product_id', $productId)
            ->where(function ($query) use ($siteCustomerId, $sessionId) {
                if ($siteCustomerId) {
                    $query->where('site_customer_id', $siteCustomerId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })->first();

        if (!$wishlistItem) {
            return response()->json(['success' => false, 'message' => 'Item not found in wishlist.'], 404);
        }

        $wishlistItem->delete();

        $wishlistCount = $this->getWishlistItemCount($headerFooterId, $siteCustomerId, $sessionId);

        return response()->json([
            'success' => true,
            'message' => 'Item removed from wishlist.',
            'wishlist_count' => $wishlistCount,
        ]);
    }

    public function getWishlistCount($headerFooterId)
    {
        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();

        $wishlistCount = $this->getWishlistItemCount($headerFooterId, $siteCustomerId, $sessionId);

        return response()->json(['wishlist_count' => $wishlistCount]);
    }

    private function getWishlistItemCount($headerFooterId, $siteCustomerId, $sessionId)
    {
        $query = Wishlist::where('header_footer_id', $headerFooterId);

        if ($siteCustomerId) {
            $query->where('site_customer_id', $siteCustomerId);
        } else {
            $query->where('session_id', $sessionId);
        }

        return $query->count();
    }
}
