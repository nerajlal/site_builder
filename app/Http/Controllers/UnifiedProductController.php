<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\SelectedTemplate;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;

class UnifiedProductController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $headerFooterId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);

        if (!$headerFooter) {
            abort(404, 'Header/Footer not found');
        }

        // Determine the template to use
        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();
        if (!$selectedTemplate) {
            abort(404, 'Template not found for this website.');
        }

        // Extract template number from template_name (e.g., 'template1.index1' -> '1')
        preg_match('/template(\d+)/', $selectedTemplate->template_name, $matches);
        $templateId = $matches[1] ?? '1'; // Default to 1 if not found

        // Fetch products
        $query = Product::where('header_footer_id', $headerFooterId);

        // Sorting
        if ($request->has('sort')) {
            if ($request->get('sort') == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->get('sort') == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        // Filtering by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->get('min_price'));
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->get('max_price'));
        }

        // Filtering by category name
        if ($request->has('category_name')) {
            $query->where('category_name', $request->get('category_name'));
        }

        $products = $query->get();

        // Construct the view name dynamically
        $viewName = 'template' . $templateId . '.product' . $templateId;

        // We also need cart and wishlist counts for the header
        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();
        $cartCount = Cart::where('header_footer_id', $headerFooterId)->where(function ($query) use ($siteCustomerId, $sessionId) {
            if ($siteCustomerId) $query->where('site_customer_id', $siteCustomerId);
            else $query->where('session_id', $sessionId);
        })->sum('quantity');

        $wishlistCount = Wishlist::where('header_footer_id', $headerFooterId)->where(function ($query) use ($siteCustomerId, $sessionId) {
            if ($siteCustomerId) $query->where('site_customer_id', $siteCustomerId);
            else $query->where('session_id', $sessionId);
        })->count();

        return view($viewName, [
            'headerFooter' => $headerFooter,
            'products' => $products,
            'is_default' => false,
            'cartCount' => $cartCount,
            'wishlistCount' => $wishlistCount,
            'headerFooterId' => $headerFooterId // Pass this for convenience in the view
        ]);
    }

    public function showSingle(Request $request, $headerFooterId, $productId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);
        $product = Product::with([
            'brand',
            'stylingTips',
            'modelInfo',
            'garmentDetails',
            'sizeChart',
            'fabricDetails',
            'careInstructions',
            'faqs',
            'reviews'
        ])->find($productId);

        if (!$headerFooter || !$product) {
            abort(404, 'Product not found');
        }

        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();
        if (!$selectedTemplate) {
            abort(404, 'Template not found for this header/footer.');
        }

        // Extract template number from template_name (e.g., 'template1.index1' -> '1')
        preg_match('/template(\d+)/', $selectedTemplate->template_name, $matches);
        $templateId = $matches[1] ?? '1'; // Default to 1 if not found

        $productImages = \App\Models\ProductImage::where('product_id', $productId)->get();
        $productColors = \App\Models\ProductColor::where('product_id', $productId)->get();

        $allSizes = Product::ALL_SIZES;
        $productSizesData = collect($product->sizes)->keyBy('size');

        $sizes = collect($allSizes)->map(function ($size) use ($productSizesData) {
            $productSize = $productSizesData->get($size);
            return (object)[
                'size' => $size,
                'stock' => $productSize ? $productSize['stock'] : 0,
                'in_stock' => !!$productSize,
            ];
        });

        $siteCustomerId = Session::get('site_customer_id');
        $sessionId = Session::getId();
        $inWishlist = Wishlist::where('product_id', $productId)
            ->where('header_footer_id', $headerFooterId)
            ->where(function ($query) use ($siteCustomerId, $sessionId) {
                if ($siteCustomerId) {
                    $query->where('site_customer_id', $siteCustomerId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->exists();

        // Construct the view name dynamically
        $viewName = 'template' . $templateId . '.single-product' . $templateId;

        // We also need cart and wishlist counts for the header
        $cartCount = Cart::where('header_footer_id', $headerFooterId)->where(function ($query) use ($siteCustomerId, $sessionId) {
            if ($siteCustomerId) $query->where('site_customer_id', $siteCustomerId);
            else $query->where('session_id', $sessionId);
        })->sum('quantity');

        $wishlistCount = Wishlist::where('header_footer_id', $headerFooterId)->where(function ($query) use ($siteCustomerId, $sessionId) {
            if ($siteCustomerId) $query->where('site_customer_id', $siteCustomerId);
            else $query->where('session_id', $sessionId);
        })->count();

        // Pass all the data
        return view($viewName, [
            'headerFooter' => $headerFooter,
            'product' => $product,
            'selectedTemplate' => $selectedTemplate,
            'productImages' => $productImages,
            'productColors' => $productColors,
            'sizes' => $sizes,
            'headerFooterId' => $headerFooterId,
            'inWishlist' => $inWishlist,
            'is_default' => false,
            'cartCount' => $cartCount,
            'wishlistCount' => $wishlistCount
        ]);
    }
}
