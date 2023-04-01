<?php

namespace App\Http\Livewire\Member\Auth\Login;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use RateLimiter;

class Form extends Component
{

    use WithRateLimiting;

    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    private int $rateLimitAttempts = 5,
        $rateLimitTimeout = 60;

    private string $rateLimitKey = 'login';

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $key = $this->getRateLimitKey($this->rateLimitKey);
        if (RateLimiter::tooManyAttempts($key, $this->rateLimitAttempts))
            $this->addError('rateLimit', RateLimiter::availableIn($key));

        return view('livewire.member.auth.login.form');
    }

    public function login() {
        try {
            $this->rateLimit($this->rateLimitKey);
        } catch (TooManyRequestsException $e) {
            $this->addError('rateLimit', $e->secondsUntilAvailable);
            return;
        }

        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            if (auth()->user()->hasCompleted2Fa()) return redirect()->route('member.auth.2fa');
            else return redirect()->route('member.dashboard');
        } else {
            $this->addError('email', 'Die eingegebenen Daten sind nicht korrekt.');
        }
    }

}
