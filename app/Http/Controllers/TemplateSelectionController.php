<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectedTemplate;
use App\Models\HeaderFooter;

class TemplateSelectionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $userId = session('userid'); // or use auth()->id() if you're using Auth

            if (!$userId) {
                return response()->json(['success' => false, 'error' => 'User ID missing in session'], 400);
            }

            $templateName = $request->input('template');

            if (!$templateName) {
                return response()->json(['success' => false, 'error' => 'Template name is required'], 400);
            }

            $headerFooter = HeaderFooter::where('user_id', $userId)->first();

            if (!$headerFooter) {
                return response()->json(['success' => false, 'error' => 'Header/Footer data not found.'], 404);
            }

            SelectedTemplate::updateOrCreate(
                ['user_id' => $userId],
                [
                    'header_footer_id' => $headerFooter->id,
                    'template_name' => $templateName
                ]
            );

            return redirect('/template')->with('success', 'Template selected successfully');

        } catch (\Exception $e) {
            // Log the error to Laravel log file
            \Log::error('Template selection error: ' . $e->getMessage());

            return response()->json(['success' => false, 'error' => 'Server error.'], 500);
        }
    }


    public function showTemplates()
    {
        $userId = session('userid');
        $selectedTemplate = SelectedTemplate::where('user_id', $userId)->first();

        return view('d_template', compact('selectedTemplate'));
    }

}
