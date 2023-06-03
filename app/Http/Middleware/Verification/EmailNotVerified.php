<?php

namespace App\Http\Middleware\Verification;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailNotVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->hasVerifiedEmail()) {
            if ($request->expectsJson()) abort(403, 'Your email address is already verified.');

            session()->flash('toast', [
                'text' => 'Deine E-Mail wurde bereits verifiziert.',
                'type' => 'warning'
            ]);

            return redirect()->route('public.home');
        }

        return $next($request);
    }
}
