<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\Product;
use App\Models\Feature;
use App\Models\ProductImage;
use App\Models\SelectedTemplate;

class ProductController1 extends Controller
{
    public function index(Request $request)
    {
        $userId = session('userid');
        $headerFooter = HeaderFooter::where('user_id', $userId)->first();

        if (!$headerFooter) {
            return view('template1.product1', [
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

        return view('template1.product1', compact('headerFooter','products'))
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
            ->where('template_name', 'template1.index1')
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

        $products = $query->get();

        return view('template1.product1', compact('headerFooter', 'products'))
            ->with('is_default', false);
    }

    public function showSingleProduct($headerFooterId, $productId)
    {
        $headerFooter = \App\Models\HeaderFooter::find($headerFooterId);
        $product = \App\Models\Product::with([
            'brand',
            'colors',
            'stylingTips',
            'modelInfo',
            'garmentDetails',
            'sizeChart',
            'fabricDetails',
            'careInstructions'
        ])->find($productId);

        if (!$headerFooter || !$product) {
            abort(404, 'Product not found');
        }

        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();
        if (!$selectedTemplate) {
            abort(404, 'Template not found for this header/footer.');
        }

        $productImages = ProductImage::where('product_id', $productId)->get();

        // Pass all the data
        return view('template1.single-product1', compact('headerFooter', 'product', 'selectedTemplate', 'productImages'))
            ->with('is_default', false);
    }
}
