<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\Product;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\HomeSetting;
use App\Models\Section1;
use App\Models\Section2;
use App\Models\ContactUs;
use App\Models\SelectedTemplate;

class LuxuryController4 extends Controller
{
    public function index()
    {
        $userId = session('userid');
        $headerFooter = HeaderFooter::where('user_id', $userId)->first();

        if (!$headerFooter) {
            return view('template4.index4', [
                'homesetting' => [],
                'section1' => [],
                'section2' => [],
                'categories' => [],
                'products' => [],
                'testimonials' => [],
                'headerFooter' => null,
                'contactus' => null,
                'is_default' => true
            ]);
        }

        $homesetting = HomeSetting::where('header_footer_id', $headerFooter->id)->first();
        $section1 = section1::where('header_footer_id', $headerFooter->id)->first();
        $section2 = section2::where('header_footer_id', $headerFooter->id)->first();
        $categories = Category::where('header_footer_id', $headerFooter->id)->get();
        $products = Product::where('header_footer_id', $headerFooter->id) ->take(4) ->get();
        $testimonials = Testimonial::where('header_footer_id', $headerFooter->id)->first();
        $contactus = ContactUs::where('header_footer_id', $headerFooter->id)->first();

        return view('template4.index4', compact('headerFooter', 'homesetting', 'section1', 'section2', 'categories', 'products', 'testimonials', 'contactus'))
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
            ->where('template_name', 'template4.index4')
            ->first();
        if (!$selectedTemplate) {
            abort(404, 'Template not found');
        }

        $homesetting = HomeSetting::where('header_footer_id', $headerFooter->id)->first();
        $section1 = section1::where('header_footer_id', $headerFooter->id)->first();
        $section2 = section2::where('header_footer_id', $headerFooter->id)->first();
        $categories = Category::where('header_footer_id', $headerFooter->id)->get();
        $products = Product::where('header_footer_id', $headerFooter->id)->take(4)->get();
        $testimonials = Testimonial::where('header_footer_id', $headerFooter->id)->first();
        $contactus = ContactUs::where('header_footer_id', $headerFooter->id)->first();

        return view('template4.index4', compact('headerFooter', 'homesetting', 'section1', 'section2', 'categories', 'products', 'testimonials', 'contactus'))
            ->with('is_default', false);
    }

}
