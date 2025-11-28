<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            return route('admin.dashboard');
        }

        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')
                ->with('success', __('SuccessfullyLoggedIn'));
        }

        return back()->withErrors([
            'error' => 'Username or password incorrect!',
        ])->onlyInput('username');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', __('SuccessfullyLoggedOut'));
    }
}
