<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // If the request comes from an Inertia visit, respond with
        // Inertia::location() so the client performs a full page visit
        // to the Blade homepage. For normal requests, do a standard redirect.
        if ($request->header('X-Inertia')) {
            return Inertia::location(route('website.home'));
        }

        return redirect()->route('website.home');
    }
}
