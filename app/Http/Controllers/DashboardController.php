<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function main()
    {
        $user = Auth::user();
        return view('admin.layouts.main', compact('user'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }
}
