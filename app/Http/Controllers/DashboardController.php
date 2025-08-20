<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderFooter;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Session::has('userid')) {
            return redirect('/login');
        }

        $userId = Session::get('userid');
        $websites = HeaderFooter::where('user_id', $userId)->get();

        return view('dashboard', ['websites' => $websites]);
    }
}
