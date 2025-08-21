<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\Product;
use App\Models\Feature;
use App\Models\ProductImage;
use App\Models\SelectedTemplate;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;

class ProductController2 extends Controller
{
    public function index(Request $request)
    {
        $userId = session('userid');
        $headerFooter = HeaderFooter::where('user_id', $userId)->first();

        if (!$headerFooter) {
            return view('template2.product2', [
                'products' => [],
                'headerFooter' => null,
                'is_default' => true
            ]);
        }

        $query = Product::where('header_footer_id', $headerFooter->id);

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

        $products = $query->get();

        return view('template2.product2', compact('headerFooter','products'))
            ->with('is_default', false);
    }

    public function showCustomer(Request $request, $headerFooterId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);

        if (!$headerFooter) {
            abort(404, 'Header/Footer not found');
        }

        // Check if header_footer_id exists in selected_templates table and matches this template
        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)
            ->where('template_name', 'template2.index2')
            ->first();
        if (!$selectedTemplate) {
            abort(404, 'Template not found');
        }

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

        return view('template2.product2', compact('headerFooter', 'products'))
            ->with('is_default', false);
    }

    public function showSingleProduct($headerFooterId, $productId)
    {
        $headerFooter = \App\Models\HeaderFooter::find($headerFooterId);
        $product = \App\Models\Product::with([
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

        $productImages = ProductImage::where('product_id', $productId)->get();
        $productColors = \App\Models\ProductColor::where('product_id', $productId)->get();

        $allSizes = \App\Models\Product::ALL_SIZES;
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

        // Pass all the data
        return view('template2.single-product2', compact('headerFooter', 'product', 'selectedTemplate', 'productImages', 'productColors', 'sizes', 'headerFooterId', 'inWishlist'))
            ->with('is_default', false);
    }
}
