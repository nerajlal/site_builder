<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\HomeSetting;
use App\Models\Section1;
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
        $testimonial = Testimonial::where('header_footer_id', $headerFooter->id ?? 0)->first();
        $contactUs = ContactUs::where('header_footer_id', $headerFooter->id ?? 0)->first();

        return view('d_storedata', compact('headerFooter', 'homeSetting', 'section1', 'testimonial', 'contactUs'));
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
        $products = Product::with([
            'brand',
            'colors',
            'productImages',
            'stylingTips',
            'modelInfo',
            'garmentDetails',
            'sizeChart',
            'fabricDetails',
            'careInstructions'
        ])->where('header_footer_id', $id)->get();
        
        return view('d_add_product', compact('headerFooter', 'brands', 'products'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'original_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'brand_id' => 'required|exists:brands,id',
            'category_name' => 'required|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'description' => 'nullable|string',
            'sizes' => 'nullable|array',
            'details' => 'nullable|array',
        ]);

        $productData = $request->except(['sizes', 'details', 'colors', 'images']);

        // Transform sizes data
        $sizes = [];
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size => $stock) {
                if ($stock > 0) {
                    $sizes[] = ['size' => $size, 'stock' => (int)$stock];
                }
            }
        }
        $productData['sizes'] = json_encode($sizes);

        // Transform details data
        $details = [];
        if ($request->has('details')) {
            $detailsData = $request->details;
            // Handle line-separated fields
            if (!empty($detailsData['key_features'])) {
                $details['key_features'] = array_filter(preg_split('/\r\n|\r|\n/', $detailsData['key_features']));
            }
            if (!empty($detailsData['care_tips'])) {
                $details['care_tips'] = array_filter(preg_split('/\r\n|\r|\n/', $detailsData['care_tips']));
            }
            // Handle JSON string fields
            $jsonFields = [];
            foreach($jsonFields as $field) {
                if (!empty($detailsData[$field])) {
                    $details[$field] = json_decode($detailsData[$field], true);
                }
            }
        }
        $productData['details'] = json_encode($details);

        $productData['header_footer_id'] = $siteId;

        $product = Product::create($productData);

        if ($request->has('colors')) {
            foreach ($request->colors as $color) {
                $product->colors()->create([
                    'name' => $color['name'],
                    'value' => $color['value'],
                ]);
            }
        }

        if ($request->has('images')) {
            foreach ($request->images as $image) {
                if (!empty($image['url'])) {
                    $product->productImages()->create([
                        'image_url' => $image['url'],
                    ]);
                }
            }
        }

        if ($request->has('details') && isset($request->details['styling_tips'])) {
            foreach ($request->details['styling_tips'] as $tip) {
                if (!empty($tip['title']) && !empty($tip['description'])) {
                    $product->stylingTips()->create([
                        'title' => $tip['title'],
                        'description' => $tip['description'],
                    ]);
                }
            }
        }

        if ($request->has('details') && isset($request->details['model_info'])) {
            foreach ($request->details['model_info'] as $info) {
                if (!empty($info['key']) && !empty($info['value'])) {
                    $product->modelInfo()->create([
                        'key' => $info['key'],
                        'value' => $info['value'],
                    ]);
                }
            }
        }

        if ($request->has('details') && isset($request->details['garment_details'])) {
            foreach ($request->details['garment_details'] as $detail) {
                if (!empty($detail['key']) && !empty($detail['value'])) {
                    $product->garmentDetails()->create([
                        'key' => $detail['key'],
                        'value' => $detail['value'],
                    ]);
                }
            }
        }

        if ($request->has('details') && isset($request->details['size_chart'])) {
            foreach ($request->details['size_chart'] as $size) {
                if (!empty($size['size']) && !empty($size['measurements'])) {
                    $product->sizeChart()->create([
                        'size' => $size['size'],
                        'measurements' => $size['measurements'],
                    ]);
                }
            }
        }

        if ($request->has('details') && isset($request->details['fabric_details'])) {
            foreach ($request->details['fabric_details'] as $detail) {
                if (!empty($detail['key']) && !empty($detail['value'])) {
                    $product->fabricDetails()->create([
                        'key' => $detail['key'],
                        'value' => $detail['value'],
                    ]);
                }
            }
        }

        if ($request->has('details') && isset($request->details['care_instructions'])) {
            foreach ($request->details['care_instructions'] as $instruction) {
                if (!empty($instruction['instruction'])) {
                    $product->careInstructions()->create([
                        'instruction' => $instruction['instruction'],
                    ]);
                }
            }
        }

        if ($request->has('details') && isset($request->details['faqs'])) {
            foreach ($request->details['faqs'] as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $product->faqs()->create([
                        'question' => $faq['question'],
                        'answer' => $faq['answer'],
                    ]);
                }
            }
        }

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
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'original_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'brand_id' => 'required|exists:brands,id',
            'category_name' => 'required|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'description' => 'nullable|string',
            'sizes' => 'nullable|array',
            'details' => 'nullable|array',
        ]);

        $product = Product::findOrFail($id);
        $productData = $request->except(['sizes', 'details', 'colors', 'images']);

        // Transform sizes data
        $sizes = [];
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size => $stock) {
                if ($stock > 0) {
                    $sizes[] = ['size' => $size, 'stock' => (int)$stock];
                }
            }
        }
        $productData['sizes'] = json_encode($sizes);

        // Transform details data
        $details = [];
        if ($request->has('details')) {
            $detailsData = $request->details;
            // Handle line-separated fields
            if (!empty($detailsData['key_features'])) {
                $details['key_features'] = array_filter(preg_split('/\r\n|\r|\n/', $detailsData['key_features']));
            }
            if (!empty($detailsData['care_tips'])) {
                $details['care_tips'] = array_filter(preg_split('/\r\n|\r|\n/', $detailsData['care_tips']));
            }
            // Handle JSON string fields
            $jsonFields = [];
            foreach($jsonFields as $field) {
                if (!empty($detailsData[$field])) {
                    $details[$field] = json_decode($detailsData[$field], true);
                }
            }
        }
        $productData['details'] = json_encode($details);

        $product->update($productData);

        $product->colors()->delete();
        if ($request->has('colors')) {
            foreach ($request->colors as $color) {
                $product->colors()->create([
                    'name' => $color['name'],
                    'value' => $color['value'],
                ]);
            }
        }

        $product->productImages()->delete();
        if ($request->has('images')) {
            foreach ($request->images as $image) {
                if (!empty($image['url'])) {
                    $product->productImages()->create([
                        'image_url' => $image['url'],
                    ]);
                }
            }
        }

        $product->stylingTips()->delete();
        if ($request->has('details') && isset($request->details['styling_tips'])) {
            foreach ($request->details['styling_tips'] as $tip) {
                if (!empty($tip['title']) && !empty($tip['description'])) {
                    $product->stylingTips()->create([
                        'title' => $tip['title'],
                        'description' => $tip['description'],
                    ]);
                }
            }
        }

        $product->modelInfo()->delete();
        if ($request->has('details') && isset($request->details['model_info'])) {
            foreach ($request->details['model_info'] as $info) {
                if (!empty($info['key']) && !empty($info['value'])) {
                    $product->modelInfo()->create([
                        'key' => $info['key'],
                        'value' => $info['value'],
                    ]);
                }
            }
        }

        $product->garmentDetails()->delete();
        if ($request->has('details') && isset($request->details['garment_details'])) {
            foreach ($request->details['garment_details'] as $detail) {
                if (!empty($detail['key']) && !empty($detail['value'])) {
                    $product->garmentDetails()->create([
                        'key' => $detail['key'],
                        'value' => $detail['value'],
                    ]);
                }
            }
        }

        $product->sizeChart()->delete();
        if ($request->has('details') && isset($request->details['size_chart'])) {
            foreach ($request->details['size_chart'] as $size) {
                if (!empty($size['size']) && !empty($size['measurements'])) {
                    $product->sizeChart()->create([
                        'size' => $size['size'],
                        'measurements' => $size['measurements'],
                    ]);
                }
            }
        }

        $product->fabricDetails()->delete();
        if ($request->has('details') && isset($request->details['fabric_details'])) {
            foreach ($request->details['fabric_details'] as $detail) {
                if (!empty($detail['key']) && !empty($detail['value'])) {
                    $product->fabricDetails()->create([
                        'key' => $detail['key'],
                        'value' => $detail['value'],
                    ]);
                }
            }
        }

        $product->careInstructions()->delete();
        if ($request->has('details') && isset($request->details['care_instructions'])) {
            foreach ($request->details['care_instructions'] as $instruction) {
                if (!empty($instruction['instruction'])) {
                    $product->careInstructions()->create([
                        'instruction' => $instruction['instruction'],
                    ]);
                }
            }
        }

        $product->faqs()->delete();
        if ($request->has('details') && isset($request->details['faqs'])) {
            foreach ($request->details['faqs'] as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $product->faqs()->create([
                        'question' => $faq['question'],
                        'answer' => $faq['answer'],
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Product updated successfully!');
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