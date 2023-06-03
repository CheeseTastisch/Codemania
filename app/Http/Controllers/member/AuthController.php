<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();

        session()->flash('toast', [
            'text' => 'Deine E-Mail wurde erfolgreich verifiziert.',
            'type' => 'success'
        ]);

        return redirect()->route('public.home');
    }

    public function resendVerificationEmail(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        session()->flash('toast', [
            'text' => 'Eine neue E-Mail zur Verifizierung wurde an deine E-Mail-Adresse gesendet.',
            'type' => 'success'
        ]);

        return back();
    }

    function logout()
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('public.home');
    }

}
