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

        // Check if header_footer_id exists in selected_templates table
        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();
        if (!$selectedTemplate) {
            abort(404, 'Template not found');
        }

        $products = Product::where('header_footer_id', $headerFooter->id)->get();

        return view('template3.product3', compact('headerFooter', 'products'))
            ->with('is_default', false);
    }

}
