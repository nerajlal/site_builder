<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\SelectedTemplate;

class TemplateViewController extends Controller
{
    public function show($headerFooterId)
    {
        // Fetch header/footer data
        $headerFooter = HeaderFooter::find($headerFooterId);

        if (!$headerFooter) {
            abort(404, 'Header/Footer not found');
        }

        // Get selected template for this header_footer_id
        $selectedTemplate = SelectedTemplate::where('header_footer_id', $headerFooterId)->first();

        if (!$selectedTemplate) {
            abort(404, 'Template not found for this user');
        }

        $template = $selectedTemplate->template_name;

        // Assuming the templates are blade files like `d_template.blade.php`, `modern.blade.php`, etc.
        return view( $template, compact('headerFooter'));
    }
}
