<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\HomeSetting;
use App\Models\Section1;
use App\Models\Section2;
use App\Models\ContactUs;
use App\Models\SelectedTemplate;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;

class WebsiteViewController extends Controller
{
    public function index($headerFooterId)
    {
        $headerFooter = HeaderFooter::find($headerFooterId);

        if (!$headerFooter) {
            abort(404, 'Header/Footer not found');
        }

        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();

        if (!$selectedTemplate) {
            abort(404, 'No template selected for this user');
        }

        preg_match('/template(\\d+)/', $selectedTemplate->template_name, $matches);
        $templateId = $matches[1] ?? '1'; // Default to 1 if not found

        $homesetting = HomeSetting::where('header_footer_id', $headerFooter->id)->first();
        $section1 = section1::where('header_footer_id', $headerFooter->id)->first();
        $section2 = section2::where('header_footer_id', $headerFooter->id)->first();
        $categories = Category::where('header_footer_id', $headerFooter->id)->get();
        $products = Product::withCount('reviews')->withAvg('reviews', 'rating')->where('header_footer_id', $headerFooter->id)->where('status', 0)->take(4)->get();
        $testimonials = Testimonial::where('header_footer_id', $headerFooter->id)->first();
        $contactus = ContactUs::where('header_footer_id', $headerFooter->id)->first();

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

        $viewName = 'template' . $templateId . '.index';

        return view($viewName, compact('headerFooter', 'homesetting', 'section1', 'section2', 'categories', 'products', 'testimonials', 'contactus', 'cartCount', 'wishlistCount', 'headerFooterId'))
            ->with('is_default', false);
    }

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

        $templateName = $selectedTemplate->template_name;

        // Map the template_name to view path
        $templateViewMap = [
            'template1' => 'template1.index1',
            'template2' => 'template2.index2',
            // Add more mappings here if needed
        ];

        if (!isset($templateViewMap[$templateName])) {
            abort(404, 'Template view not found');
        }

        $viewToLoad = $templateViewMap[$templateName];

        return view($viewToLoad, compact('headerFooter'));
    }
}
