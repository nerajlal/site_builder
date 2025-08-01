<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\Product;
use App\Models\Feature;

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

}
