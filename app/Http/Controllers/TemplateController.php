<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\HomeSetting;
use App\Models\Section1;
use App\Models\Section2;
use App\Models\Testimonial;
use App\Models\ContactUs;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Template;

class TemplateController extends Controller
{
    public function show()
    {
        $userId = session('userid');
        $headerFooter = HeaderFooter::where('user_id', $userId)->first();
        $homeSetting  = HomeSetting::where('user_id', $userId)->first();
        $section1     = Section1::where('header_footer_id', $headerFooter->id ?? 0)->first();
        $section2     = Section2::where('header_footer_id', $headerFooter->id ?? 0)->first();
        $testimonial = Testimonial::where('header_footer_id', $headerFooter->id ?? 0)->first();
        $contactUs = ContactUs::where('header_footer_id', $headerFooter->id ?? 0)->first();

        return view('d_storedata', compact('headerFooter', 'homeSetting', 'section1', 'section2', 'testimonial', 'contactUs'));
    }

    public function store(Request $request)
    {
        $userId = session('userid');

        // Validate Header & Footer data
        $validatedHeader = $request->validate([
            'site_name'   => 'required|string|max:255',
            'features'    => 'nullable|boolean',
            'brands'      => 'nullable|boolean',
            'collections' => 'nullable|boolean',
            'contact'     => 'nullable|boolean',
            'footer_text' => 'nullable|string|max:255',
        ]);

        // Validate Home Section data
        $validatedHome = $request->validate([
            'main_text'    => 'nullable|string|max:255',
            'sub_text'     => 'nullable|string|max:255',
            'button1_text' => 'nullable|string|max:100',
            'button2_text' => 'nullable|string|max:100',
        ]);

        // Process checkboxes
        $validatedHeader['features']    = $request->has('features');
        $validatedHeader['brands']      = $request->has('brands');
        $validatedHeader['collections'] = $request->has('collections');
        $validatedHeader['contact']     = $request->has('contact');
        $validatedHeader['user_id']     = $userId;

        // Save HeaderFooter data
        $headerFooter = HeaderFooter::updateOrCreate(
            ['user_id' => $userId],
            $validatedHeader
        );

        // Add user_id for home settings
        $validatedHome['user_id'] = $userId;
        $validatedHome['header_footer_id'] = $headerFooter->id;

        // Save HomeSetting data
        HomeSetting::updateOrCreate(
            ['user_id' => $userId],
            $validatedHome
        );

        // SECTION 1
        $validatedSection1 = $request->validate([
            'main_heading'      => 'nullable|string|max:255',
            'sub_heading'       => 'nullable|string|max:255',
            'feature1_heading'  => 'nullable|string|max:255',
            'feature1_detail'   => 'nullable|string|max:255',
            'feature2_heading'  => 'nullable|string|max:255',
            'feature2_detail'   => 'nullable|string|max:255',
            'feature3_heading'  => 'nullable|string|max:255',
            'feature3_detail'   => 'nullable|string|max:255',
        ]);

        $validatedSection1['header_footer_id'] = $headerFooter->id;

        Section1::updateOrCreate(
            ['header_footer_id' => $headerFooter->id],
            $validatedSection1
        );

        // SECTION 2
        $validatedSection2 = $request->validate([
            'main_text1'  => 'nullable|string|max:255',
            'sub_text1'   => 'nullable|string|max:255',
            'image1'     => 'nullable|string|max:255',
            'image2'     => 'nullable|string|max:255',
            'image3'     => 'nullable|string|max:255',
            'image4'     => 'nullable|string|max:255',
            'image5'     => 'nullable|string|max:255',
            'image6'     => 'nullable|string|max:255',
        ]);

        $validatedSection2['header_footer_id'] = $headerFooter->id;

        Section2::updateOrCreate(
            ['header_footer_id' => $headerFooter->id],
            $validatedSection2
        );

        // TESTIMONIAL SECTION
        $validatedTestimonial = $request->validate([
            'testi_main'   => 'nullable|string|max:255',
            'testi_sub'    => 'nullable|string|max:255',
            'testi1'       => 'nullable|string|max:1000',
            'testi_user1'  => 'nullable|string|max:255',
            'testi2'       => 'nullable|string|max:1000',
            'testi_user2'  => 'nullable|string|max:255',
            'testi3'       => 'nullable|string|max:1000',
            'testi_user3'  => 'nullable|string|max:255',
        ]);
        $validatedTestimonial['header_footer_id'] = $headerFooter->id;
        Testimonial::updateOrCreate(
            ['header_footer_id' => $headerFooter->id],
            $validatedTestimonial
        );

        // CONTACT US SECTION
        $validatedContact = $request->validate([
            'contact_name'     => 'nullable|string|max:255',
            'contact_sub'      => 'nullable|string|max:255',
            'contact_phone'    => 'nullable|string|max:20',
            'contact_hours'    => 'nullable|string|max:255',
            'contact_email'    => 'nullable|email|max:255',
            'contact_building' => 'nullable|string|max:255',
            'contact_line1'    => 'nullable|string|max:255',
            'contact_line2'    => 'nullable|string|max:255',
        ]);
        $validatedContact['header_footer_id'] = $headerFooter->id;
        ContactUs::updateOrCreate(
            ['header_footer_id' => $headerFooter->id],
            $validatedContact
        );


        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    public function showSites()
    {
        $userId = session('userid');
        $headerFooters = HeaderFooter::where('user_id', $userId)->get();

        return view('d_add', compact('headerFooters'));
    }

    public function showAddProducts($id)
    {
        $headerFooter = HeaderFooter::findOrFail($id);
        $brands = Brand::where('header_footer_id', $id)->get();
        $categories = Category::where('header_footer_id', $id)->get();
        $products = Product::with(['brand', 'category'])
                       ->where('header_footer_id', $id)
                       ->get();
        
        return view('d_add_product', compact('headerFooter', 'brands', 'categories', 'products'));
    }

    public function storeBrand(Request $request, $siteId)
    {
        Brand::create([
            'name' => $request->brand_name,
            'header_footer_id' => $siteId,
        ]);
        return back()->with('success', 'Brand added successfully!');
    }


    public function storeProduct(Request $request, $siteId)
    {
        // Check if brand exists
        if (!Brand::where('header_footer_id', $siteId)->exists()) {
            return back()->with('error', 'You must add at least one brand first!');
        }

        Product::create([
            'name' => $request->product_name,
            'price' => $request->price,
            'original_price' => $request->original_price,
            'quantity' => $request->quantity,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'header_footer_id' => $siteId,
            'image_url' => $request->image_url,
            'description' => $request->description,
            'colors' => $request->colors,
            'sizes' => $request->sizes,
            'key_features' => $request->key_features,
            'material' => $request->material,
            'care_instructions' => $request->care_instructions,
        ]);

        return back()->with('success', 'Product added successfully!');
    }

    public function deleteBrand($id)
    {
        Brand::findOrFail($id)->delete();
        return back()->with('success', 'Brand deleted successfully!');
    }


    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Product deleted successfully!');
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price'        => 'required|numeric',
            'quantity'     => 'required|integer',
            'category'     => 'required|exists:categories,id',
            'brand'        => 'required|exists:brands,id',
            'image_url'    => 'nullable|url',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name'        => $request->product_name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'category_id' => $request->category,
            'brand_id'    => $request->brand,
            'image_url'   => $request->image_url,
        ]);

        return response()->json(['message' => 'Product updated successfully!']);
    }

    public function temp_save(Request $request)
    {
        $request->validate([
            'template_path' => 'required|string',
        ]);

        $userId = session('userid'); // Businesser session ID
        $headerFooter = HeaderFooter::where('user_id', $userId)->first();

        Template::create([
            'user_id' => $userId,
            'headerfooter_id' => $headerFooter ? $headerFooter->id : null,
            'template_path' => $request->template_path,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Template saved successfully.']);
    }


}