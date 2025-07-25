<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:user_accounts,phone',
            'password' => 'required|min:4',
        ]);

        $user = new UserAccount();
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['status' => 'success', 'redirect' => '/login', 'message' => 'Registration successful']);
    }

    public function showLoginForm()
    {
        return view('login'); // Make sure your view is named login.blade.php
    }

    // Handle Login
    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        $user = UserAccount::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('userid', $user->id);
            Session::put('login_time', now());
            return redirect('/'); // Change to your home/dashboard route
        }

        return back()->withErrors(['Invalid credentials']);
    }
}
