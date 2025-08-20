<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\SiteCustomer;
use Illuminate\Support\Facades\Validator;

class SiteCustomerProfileController extends Controller
{
    public function show()
    {
        $siteCustomerId = Session::get('site_customer_id');
        if (!$siteCustomerId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $customer = SiteCustomer::find($siteCustomerId);
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }

    public function update(Request $request)
    {
        $siteCustomerId = Session::get('site_customer_id');
        if (!$siteCustomerId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $customer = SiteCustomer::find($siteCustomerId);
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'phone' => 'nullable|string|max:20',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $customer->update($request->only([
            'phone',
            'address_line_1',
            'address_line_2',
            'city',
            'state',
            'postal_code',
            'country',
        ]));

        return response()->json(['success' => true, 'message' => 'Profile updated successfully.']);
    }
}
