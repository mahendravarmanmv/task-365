<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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
		
		// Check if the user is approved
		if (Auth::user()->isRejected()) {
		Auth::logout();
		throw ValidationException::withMessages([
		'login' => "Your vendor profile couldn't be approved. Please contact support for further assistance.",
		]);
		}

		if (!Auth::user()->isApproved()) {
		Auth::logout();
		throw ValidationException::withMessages([
		'login' => 'Your account is not approved yet. Please contact support.',
		]);
		}

        $request->session()->regenerate();

        return redirect()->intended(route('leads.index'));
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
