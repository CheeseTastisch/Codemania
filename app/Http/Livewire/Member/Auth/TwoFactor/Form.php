<?php

namespace App\Http\Livewire\Member\Auth\TwoFactor;

use App\Concerns\TwoFactorAuthenticatable\TwoFactorVerifyResult;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use RateLimiter;

class Form extends Component
{

    use WithRateLimiting;

    public string $two_factor;

    private int $rateLimitAttempts = 5,
        $rateLimitTimeout = 60;

    private string $rateLimitKey = 'check';

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $key = $this->getRateLimitKey($this->rateLimitKey);
        if (RateLimiter::tooManyAttempts($key, $this->rateLimitAttempts))
            $this->addError('rateLimit', RateLimiter::availableIn($key));

        return view('livewire.member.auth.two_factor.form');
    }

    public function check() {
        try {
            $this->rateLimit($this->rateLimitKey);
        } catch (TooManyRequestsException $e) {
            $this->addError('rateLimit', $e->secondsUntilAvailable);
            return;
        }

        $this->validate([
            'two_factor' => 'required'
        ]);

        switch (auth()->user()->tryTwoFactorAuthentication($this->two_factor)) {
            case TwoFactorVerifyResult::Success:
                return redirect()->route('member.dashboard');
            case TwoFactorVerifyResult::RecoveryCodeUsed:
                return redirect()->route('member.auth.2fa.recovery');
            case TwoFactorVerifyResult::InvalidCode:
                $this->addError('two_factor', 'Der angegebene Code ist ungültig.');
                return;
        }
    }

}
