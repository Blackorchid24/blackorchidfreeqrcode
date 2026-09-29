<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'active',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Welcome to Blackorchid Free QR Code');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email' => 'The email or password is incorrect.',
                ])
                ->onlyInput('email');
        }

        $user = Auth::user();

        if ($user->status !== 'active') {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()
                ->withErrors([
                    'email' => 'This account is inactive.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            report($e);

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Google sign-in failed. Please try again.',
                ]);
        }

        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {

            if ($user->status !== 'active') {
                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' => 'This account is inactive.',
                    ]);
            }

            $user->google_id = $googleUser->getId();

            if (!$user->name) {
                $user->name = $googleUser->getName() ?: 'Blackorchid Client';
            }

            if (!$user->avatar && $googleUser->getAvatar()) {
                $user->avatar = $googleUser->getAvatar();
            }

            $user->save();

        } else {

            $user = User::create([
                'name' => $googleUser->getName() ?: 'Blackorchid Client',
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'password' => Hash::make(str()->random(40)),
                'status' => 'active',
            ]);
        }

        Auth::login($user, true);

        $request->session()->regenerate();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Signed in with Google.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}