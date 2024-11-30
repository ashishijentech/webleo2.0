<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = "";
        if ($request->user()->role === "superadmin") {
            $url = "superadmin/dashboard";
        } elseif ($request->user()->role === "admin") {
            $url = "admin/dashboard";
        } elseif ($request->user()->role === "wlp") {
            $url = "wlp/dashboard";
        } elseif ($request->user()->role === "manufacturer") {
            $url = "manufacturer/dashboard";
        } elseif ($request->user()->role === "distributer") {
            $url = "distributer/dashboard";
        } elseif ($request->user()->role === "dealer") {
            $url = "dealer/dashboard";
        } elseif ($request->user()->role === "technician") {
            $url = "technician/dashboard";
        } else {
            $url = "dashboard";
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}