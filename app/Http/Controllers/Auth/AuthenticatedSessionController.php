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

        // ตรวจสอบ role
        $user = $request->user();
        if ($user->admin == '1') {
            return redirect()->intended(route('admin', absolute: false));
        } else {
            // investors หรือ role อื่น
            return redirect()->intended(route('dashboard', absolute: false));
        }

        //return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        try {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Exception $e) {
            // ถ้า session/cookie หาย ให้ redirect ไป login พร้อมข้อความ
            return redirect('/login')->with('status', 'Session expired, please login again.');
        }
        return redirect('/login');
    }
}
