<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['whatsapp' => 'required']);
        $otp = rand(1000, 9999);

        $customer = Customer::firstOrNew(['whatsapp' => $request->whatsapp]);
        $customer->otp = $otp;
        if (!$customer->exists) {
            $customer->header_footer_id = 1; // set store manually or dynamically
        }
        $customer->save();

        // Simulate OTP sending (log it)
        \Log::info("OTP for {$request->whatsapp}: $otp");

        Session::put('otp_number', $request->whatsapp);
        return redirect()->route('customer.verify')->with('success', 'OTP sent to WhatsApp.');
    }

    public function showVerifyForm()
    {
        return view('customer.verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required']);
        $whatsapp = Session::get('otp_number');
        $customer = Customer::where('whatsapp', $whatsapp)->where('otp', $request->otp)->first();

        if ($customer) {
            Session::put('customer_id', $customer->id);
            return redirect()->route('customer.setPasswordForm');
        }

        return back()->with('error', 'Invalid OTP');
    }

    public function showSetPasswordForm()
    {
        return view('customer.set-password');
    }

    public function setPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $customer = Customer::find(Session::get('customer_id'));
        if (!$customer) return redirect()->route('customer.login');

        $customer->password = Hash::make($request->password);
        $customer->otp = null;
        $customer->save();

        Session::put('customer_logged_in', true);
        return redirect('/'); // Redirect to homepage or customer dashboard
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('customer.login');
    }
}
