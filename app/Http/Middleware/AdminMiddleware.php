<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth('admin')->check()) {
            return redirect()->route('admin.login');
        }

        if (auth('admin')->user()->status !== 'active') {
            auth('admin')->logout();

            return redirect()
                ->route('admin.login')
                ->withErrors([
                    'username' => 'Your admin account is inactive.',
                ]);
        }

        return $next($request);
    }
}