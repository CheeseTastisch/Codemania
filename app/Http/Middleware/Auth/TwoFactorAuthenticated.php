<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return $request->expectsJson()
                ? abort(403, 'You are not logged in.')
                : redirect()->route('member.auth.login');
        }

        if (auth()->user()->hasCompleted2Fa() && !auth()->user()->is2FaVerified()) {
            return $request->expectsJson()
                ? abort(403, 'You have completed the two-factor authentication.')
                : redirect()->route('member.auth.2fa');
        }

        return $next($request);
    }
}
