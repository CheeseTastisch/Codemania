<?php

namespace App\Http\Livewire\Member\Auth\Register;

use App\Models\User;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Container\Container;
use Illuminate\Contracts\Validation\UncompromisedVerifier;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use RateLimiter;
use Validator;

class Form extends Component
{

    use WithRateLimiting;

    public string $email = '',
        $firstname = '',
        $lastname = '',
        $password = '',
        $password_confirmation = '';

    public bool $privacy_policy = false;

    private int $rateLimitAttempts = 5,
        $rateLimitTimeout = 60;

    private string $rateLimitKey = 'register';

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $key = $this->getRateLimitKey($this->rateLimitKey);
        if (RateLimiter::tooManyAttempts($key, $this->rateLimitAttempts))
            $this->addError('rateLimit', RateLimiter::availableIn($key));

        return view('livewire.member.auth.register.form');
    }

    public function register() {
        try {
            $this->rateLimit($this->rateLimitKey);
        } catch (TooManyRequestsException $e) {
            $this->addError('rateLimit', $e->secondsUntilAvailable);
            return;
        }

        $this->validate([
            'email' => 'required|email|unique:users,email',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'required|same:password',
            'privacy_policy' => 'accepted',
        ]);

        $user = User::forceCreate([
            'email' => $this->email,
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        auth()->login($user);
        session()->flash('toast', [
            'text' => 'Dein Account wurde erfolgreich erstellt. Bitte verifiziere deine E-Mail-Adresse.',
            'type' => 'success'
        ]);

        return redirect()->route('public.home');
    }

}
