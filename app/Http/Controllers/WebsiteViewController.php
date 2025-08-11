<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use App\Models\SelectedTemplate;

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
