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
            $userId = session('userid');
            if (!$userId) {
                return redirect()->back()->with('error', 'Authentication error.');
            }

            $validatedData = $request->validate([
                'template_name' => 'required|string',
                'header_footer_id' => 'required|integer',
            ]);

            // Verify that the website (HeaderFooter) belongs to the authenticated user
            $headerFooter = HeaderFooter::where('id', $validatedData['header_footer_id'])
                                        ->where('user_id', $userId)
                                        ->first();

            if (!$headerFooter) {
                return redirect()->back()->with('error', 'Invalid website selected.');
            }

            SelectedTemplate::updateOrCreate(
                ['header_footer_id' => $headerFooter->id],
                ['template_name' => $validatedData['template_name']]
            );

            // Generate the website URL
            $routeName = $validatedData['template_name'] . '.customer';
            $websiteUrl = route($routeName, ['headerFooterId' => $headerFooter->id]);

            // Redirect back with a success message and the website URL
            return redirect()->back()
                             ->with('success', 'Template for ' . $headerFooter->site_name . ' selected successfully!')
                             ->with('website_url', $websiteUrl);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            \Log::error('Template selection error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }


    public function showTemplates()
    {
        $userId = session('userid');
        $selectedTemplate = SelectedTemplate::where('user_id', $userId)->first();

        return view('d_template', compact('selectedTemplate'));
    }

}
