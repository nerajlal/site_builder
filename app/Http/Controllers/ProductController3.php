<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\Product;
use App\Models\Feature;
use App\Models\SelectedTemplate;

class ProductController3 extends Controller
{
    public function index()
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

        $products = Product::where('header_footer_id', $headerFooter->id) ->get();


        return view('template3.product3', compact('headerFooter','products'))
            ->with('is_default', false);
    }

    public function showCustomer($headerFooterId)
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

        $products = Product::where('header_footer_id', $headerFooter->id)->get();


        return view('template3.product3', compact('headerFooter', 'products'))
            ->with('is_default', false);
    }

    public function showSingleProduct($headerFooterId, $productId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);
        $product = Product::find($productId);

        if (!$headerFooter || !$product) {
            abort(404, 'Product not found');
        }

        return view('template3.single-product3', compact('headerFooter', 'product'))
            ->with('is_default', false);
    }
}
