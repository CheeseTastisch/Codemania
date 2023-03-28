<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequiresTwoFactorEnabled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return $request->expectsJson()
                ? abort(403, 'You are not logged in.')
                : redirect()->route('member.auth.login');
        }

        if (!auth()->user()->hasCompletedTwoFactorAuthentication()) {
            if ($request->expectsJson()) abort(403, 'You have not enabled two-factor authentication.');

            session()->flash('2fa', 'enable');
            session()->flash('toast', [
                'text' => 'Du hast die Zwei-Faktor-Authentifizierung noch nicht aktiviert.',
                'type' => 'warning'
            ]);

            return redirect()->route('member.profile');
        }

        return $next($request);
    }
}
