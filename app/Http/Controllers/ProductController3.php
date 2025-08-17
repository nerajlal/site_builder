<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\Product;
use App\Models\Feature;
use App\Models\SelectedTemplate;
use App\Models\HeaderFooter;
use App\Models\Product;

class ProductController3 extends Controller
{
    public function index(Request $request)
    {
        $userId = session('userid');
        $headerFooter = HeaderFooter::where('user_id', $userId)->first();

        if (!$headerFooter) {
            return view('template3.product3', [
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


        return view('template3.product3', compact('headerFooter','products'))
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
            ->where('template_name', 'template3.index3')
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


        return view('template3.product3', compact('headerFooter', 'products'))
            ->with('is_default', false);
    }

    public function showSingleProduct($headerFooterId, $productId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);
        $product = \App\Models\Product::with([
            'brand',
            'colors',
            'productImages',
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

        // Pass all the data
        return view('template3.single-product3', compact('headerFooter', 'product', 'selectedTemplate'))
            ->with('is_default', false);
    }
}
