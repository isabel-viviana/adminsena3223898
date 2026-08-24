<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    public function index()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        abort_unless(Auth::user()->role === 'aprendiz', 403);

        return view('portal.dashboard');
    }
}
