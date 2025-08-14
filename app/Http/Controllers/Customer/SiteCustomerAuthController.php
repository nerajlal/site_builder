<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteCustomer;
use App\Models\HeaderFooter;
use App\Models\SelectedTemplate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SiteCustomerAuthController extends Controller
{
    // GET /customer/check-auth
    public function checkAuth(Request $request)
    {
        $siteCustomerId = Session::get('site_customer_id');
        if ($siteCustomerId) {
            $siteCustomer = SiteCustomer::find($siteCustomerId);
            if ($siteCustomer) {
                return response()->json([
                    'signed_in' => true,
                    'customer' => [
                        'id' => $siteCustomer->id,
                        'name' => $siteCustomer->name,
                        'whatsapp' => $siteCustomer->whatsapp
                    ]
                ]);
            }
        }
        return response()->json(['signed_in' => false]);
    }

    // POST /customer/sign-out
    public function signOut(Request $request)
    {
        Session::forget('site_customer_id');
        return response()->json(['message' => 'Signed out successfully']);
    }

    // POST /customer/login
    public function login(Request $request)
    {
        $request->validate([
            'whatsapp' => 'required|string',
            'password' => 'required|string',
            'header_footer_id' => 'required|integer',
        ]);

        $siteCustomer = SiteCustomer::where('whatsapp', $request->whatsapp)
            ->where('header_footer_id', $request->header_footer_id)
            ->first();

        if (!$siteCustomer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        if (!Hash::check($request->password, $siteCustomer->password)) {
            return response()->json(['message' => 'Invalid password'], 401);
        }

        Session::put('site_customer_id', $siteCustomer->id);

        return response()->json([
            'message' => 'Login successful',
            'customer' => [
                'id' => $siteCustomer->id,
                'name' => $siteCustomer->name,
                'whatsapp' => $siteCustomer->whatsapp
            ]
        ]);
    }

    // POST /customer/send-otp
    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'whatsapp' => 'required',
            'header_footer_id' => 'required|integer',
        ]);

        $headerFooterId = (int) $data['header_footer_id'];

        // Ensure this site is published (exists in selected_templates)
        $isPublished = SelectedTemplate::where('header_footer_id', $headerFooterId)->exists();
        if (!$isPublished) {
            return response()->json(['message' => 'Site not published'], 404);
        }

        $siteCustomer = SiteCustomer::firstOrCreate(
            ['whatsapp' => $data['whatsapp'], 'header_footer_id' => $headerFooterId],
            ['user_id' => HeaderFooter::find($headerFooterId)?->user_id ?? 0]
        );

        // Hardcoded OTP for now
        Session::put('otp_expected', '1234');
        Session::put('otp_whatsapp', $data['whatsapp']);
        Session::put('otp_header_footer_id', $headerFooterId);

        return response()->json(['message' => 'OTP sent']);
    }

    // POST /customer/verify-otp
    public function verifyOtp(Request $request)
    {
        $data = $request->validate([
            'otp' => 'required',
        ]);

        if ($data['otp'] !== Session::get('otp_expected')) {
            return response()->json(['message' => 'Invalid OTP'], 422);
        }

        Session::put('site_customer_verified', true);
        return response()->json(['message' => 'OTP verified']);
    }

    // POST /customer/set-credentials
    public function setCredentials(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:4',
        ]);

        if (!Session::get('site_customer_verified')) {
            return response()->json(['message' => 'OTP not verified'], 403);
        }

        $whatsapp = Session::get('otp_whatsapp');
        $headerFooterId = (int) Session::get('otp_header_footer_id');

        $siteCustomer = SiteCustomer::where('whatsapp', $whatsapp)
            ->where('header_footer_id', $headerFooterId)
            ->first();

        if (!$siteCustomer) {
            return response()->json(['message' => 'Session expired'], 410);
        }

        $siteCustomer->name = $request->name;
        $siteCustomer->password = Hash::make($request->password);
        $siteCustomer->save();

        Session::forget(['otp_expected', 'otp_whatsapp', 'otp_header_footer_id', 'site_customer_verified']);
        Session::put('site_customer_id', $siteCustomer->id);

        return response()->json(['message' => 'Signed in', 'site_customer_id' => $siteCustomer->id]);
    }
}


