<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\Product;
use App\Models\SelectedTemplate;
use App\Models\Wishlist;
use App\Models\ProductImage;
use App\Models\ProductColor;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private function getTemplatePrefix($websiteId)
    {
        $selectedTemplate = SelectedTemplate::where('header_footer_id', $websiteId)->first();
        if ($selectedTemplate) {
            // e.g., 'template1.index1' -> 'template1'
            return explode('.', $selectedTemplate->template_name)[0];
        }
        // Fallback to a default template if none is selected
        return 'template1';
    }

    public function showProducts(Request $request, $websiteId)
    {
        $headerFooter = HeaderFooter::find($websiteId);
        if (!$headerFooter) {
            abort(404, 'Website not found');
        }

        $templatePrefix = $this->getTemplatePrefix($websiteId);
        $templateNumber = filter_var($templatePrefix, FILTER_SANITIZE_NUMBER_INT);

        $query = Product::where('header_footer_id', $websiteId);

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

        return view("template{$templateNumber}.product{$templateNumber}", [
            'products' => $products,
            'headerFooter' => $headerFooter,
            'is_default' => false,
            'headerFooterId' => $websiteId
        ]);
    }

    public function showSingleProduct($websiteId, $productId)
    {
        $headerFooter = HeaderFooter::find($websiteId);
        $product = Product::with([
            'brand',
            'stylingTips',
            'modelInfo',
            'garmentDetails',
            'sizeChart',
            'fabricDetails',
            'careInstructions',
            'faqs'
        ])->find($productId);

        if (!$headerFooter || !$product || $product->header_footer_id != $websiteId) {
            abort(404, 'Product not found on this website');
        }

        $templatePrefix = $this->getTemplatePrefix($websiteId);
        $templateNumber = filter_var($templatePrefix, FILTER_SANITIZE_NUMBER_INT);

        $productImages = ProductImage::where('product_id', $productId)->get();
        $productColors = ProductColor::where('product_id', $productId)->get();

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
            ->where('header_footer_id', $websiteId)
            ->where(function ($query) use ($siteCustomerId, $sessionId) {
                if ($siteCustomerId) {
                    $query->where('site_customer_id', $siteCustomerId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->exists();

        $selectedTemplate = SelectedTemplate::where('header_footer_id', $websiteId)->first();

        return view("template{$templateNumber}.single-product{$templateNumber}", compact('headerFooter', 'product', 'selectedTemplate', 'productImages', 'productColors', 'sizes', 'headerFooterId', 'inWishlist'))
            ->with('is_default', false);
    }
}
