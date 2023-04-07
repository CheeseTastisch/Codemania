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

        $result = auth()->user()->try2Fa($this->two_factor);

        if ($result->wasSuccessful()) return redirect()->intended(route('member.dashboard'));
        else if ($result->wasInvalidCode()) $this->addError('two_factor', 'Der angegebene Code ist ungültig.');
        else if ($result->wasRecoveryCodeUsed()) {
            session()->flash('2fa.old', $result->oldRecoveryCode);
            session()->flash('2fa.new', $result->newRecoveryCode);

            return redirect()->route('member.auth.2fa.recovery');
        }
    }

}
