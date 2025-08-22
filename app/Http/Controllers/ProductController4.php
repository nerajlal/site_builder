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

class ProductController4 extends Controller
{
    public function index(Request $request)
    {
        $userId = session('userid');
        $headerFooter = HeaderFooter::where('user_id', $userId)->first();

        if (!$headerFooter) {
            return view('template4.product4', [
                'products' => [],
                'headerFooter' => null,
                'is_default' => true
            ]);
        }

        $query = Product::withCount('reviews')->withAvg('reviews', 'rating')->where('header_footer_id', $headerFooter->id);

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

        return view('template4.product4', compact('headerFooter','products'))
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
            ->where('template_name', 'template4.index4')
            ->first();
        if (!$selectedTemplate) {
            abort(404, 'Template not found');
        }

        $query = Product::withCount('reviews')->withAvg('reviews', 'rating')->where('header_footer_id', $headerFooterId);

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

        return view('template4.product4', compact('headerFooter', 'products'))
            ->with('is_default', false);
    }

}
