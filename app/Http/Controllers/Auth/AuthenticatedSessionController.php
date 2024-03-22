<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Socialite;

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

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Redirect the user to the Microsoft authentication page.
     */
    public function redirectToMicrosoft()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    /**
     * Obtain the user information from Microsoft.
     */
    public function handleMicrosoftCallback()
    {
        $user = Socialite::driver('microsoft')->user();

        // $user->token;
        // Add your logic to authenticate the user in your system here.
        // For example, find or create a user in your database.

        // Redirect the user to the desired page after successful authentication.
        return redirect()->to('/home');
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
