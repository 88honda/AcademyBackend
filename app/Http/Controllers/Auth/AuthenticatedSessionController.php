<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

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
    public function store(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            // $request->session()->regenerate();
    
            $user = Auth::user();

            if (Gate::allows('viewAnyMentors', $user)) {
                return redirect('/student');
            } elseif (Gate::allows('viewAnyStudents', $user)) {
                return redirect('/mentor');
            }
            return redirect()->intended($this->redirectPath());
        }
        return back()->withErrors([
            'email' => 'ユーザー名またはパスワードが間違っています。',
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
