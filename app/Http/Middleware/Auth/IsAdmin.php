<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
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

        if (!auth()->user()->is_admin) {
            if ($request->expectsJson()) abort(403, 'You are not an administrator.');

            session()->flash('toast', [
                'text' => 'Du bist kein Administrator.',
                'type' => 'error'
            ]);

            return redirect()->route('public.home');
        }

        return $next($request);
    }
}
