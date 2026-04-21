<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function showLogin(Request $request): View|RedirectResponse
    {
        if ($request->session()->get('kopi_admin_logged_in')) {
            return redirect()->route('admin.gallery');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $expectedPassword = (string) env('KOPI_ADMIN_PASSWORD', 'kopijuanatalaadmin');

        if (! hash_equals($expectedPassword, (string) $request->input('password'))) {
            return back()->withErrors([
                'password' => 'Incorrect admin password.',
            ])->withInput();
        }

        $request->session()->put('kopi_admin_logged_in', true);
        $request->session()->regenerate();

        return redirect()->route('admin.gallery')->with('success', 'Welcome to the gallery admin panel.');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('kopi_admin_logged_in');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
