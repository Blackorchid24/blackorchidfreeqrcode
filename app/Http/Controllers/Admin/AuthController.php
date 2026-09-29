<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (!Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['username' => 'The username or password is incorrect.'])->onlyInput('username');
        }

        if (auth('admin')->user()->status !== 'active') {
            Auth::guard('admin')->logout();
            return back()->withErrors(['username' => 'This administrator account is inactive.']);
        }

        $admin = auth('admin')->user();

        if ($admin) {
            $admin->last_login_at = now();
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
