<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\UserAccount;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $userId = session('userid');

        if (!$userId) {
            return redirect('/login')->with('error', 'Please login first');
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'address'    => 'nullable|string|max:1000',
        ]);

        $profile = UserProfile::updateOrCreate(
            ['user_id' => $userId],
            $validated
        );

        return response()->json(['message' => 'Profile updated successfully', 'redirect' => '/login', 'profile' => $profile]);
    }

    public function getProfile()
    {
        $userId = session('userid');
        if (!$userId) {
            return redirect('/login');
        }

        $profile = UserProfile::where('user_id', $userId)->first();
        $account = UserAccount::find($userId);

        return view('d_profile', compact('profile', 'account'));
    }

}
