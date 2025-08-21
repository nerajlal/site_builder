<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\SelectedTemplate;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\HomeSetting;
use App\Models\Section1;
use App\Models\Section2;
use App\Models\ContactUs;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;

class WebsiteViewController extends Controller
{
    public function show($headerFooterId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);

        if (!$headerFooter) {
            abort(404, 'Header/Footer not found');
        }

        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();

        if (!$selectedTemplate) {
            abort(404, 'No template selected for this user');
        }

        $templateName = $selectedTemplate->template_name; // e.g., 'template1.index1'

        // Data fetching logic from LuxuryController1
        $homesetting = HomeSetting::where('header_footer_id', $headerFooter->id)->first();
        $section1 = Section1::where('header_footer_id', $headerFooter->id)->first();
        $section2 = Section2::where('header_footer_id', $headerFooter->id)->first();
        $categories = Category::where('header_footer_id', $headerFooter->id)->get();
        $products = Product::where('header_footer_id', $headerFooter->id)->take(4)->get();
        $testimonials = Testimonial::where('header_footer_id', $headerFooter->id)->first();
        $contactus = ContactUs::where('header_footer_id', $headerFooter->id)->first();

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

        // The view name is simply the template_name from the DB
        $viewToLoad = $templateName;

        return view($viewToLoad, [
            'headerFooter' => $headerFooter,
            'homesetting' => $homesetting,
            'section1' => $section1,
            'section2' => $section2,
            'categories' => $categories,
            'products' => $products,
            'testimonials' => $testimonials,
            'contactus' => $contactus,
            'is_default' => false,
            'cartCount' => $cartCount,
            'wishlistCount' => $wishlistCount,
            'headerFooterId' => $headerFooterId
        ]);
    }
}
