<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotTwoFactorAuthenticated
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

        if (auth()->user()->hasEnabledTwoFactorAuthentication() && auth()->user()->isTwoFactorAuthenticationVerified()) {
            return $request->expectsJson()
                ? abort(403, 'You have completed the two-factor authentication.')
                : redirect()->route('member.dashboard');
        }

        return $next($request);
    }
}
