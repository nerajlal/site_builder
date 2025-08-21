<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $siteCustomerId = Session::get('site_customer_id');
        if (!$siteCustomerId) {
            return response()->json(['success' => false, 'message' => 'You must be logged in to leave a review.'], 401);
        }

        // Check if the customer has purchased the product
        $hasPurchased = Order::where('site_customer_id', $siteCustomerId)
            ->whereHas('products', function ($query) use ($request) {
                $query->where('product_id', $request->product_id);
            })
            ->exists();

        if (!$hasPurchased) {
            return response()->json(['success' => false, 'message' => 'You can only review products you have purchased.'], 403);
        }

        $review = Review::create([
            'product_id' => $request->product_id,
            'site_customer_id' => $siteCustomerId,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return response()->json(['success' => true, 'message' => 'Review submitted successfully.', 'review' => $review]);
    }
}
