<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        abort_unless(Auth::user()->role === 'admin', 403);

        return view('admin.dashboard');
    }
}
