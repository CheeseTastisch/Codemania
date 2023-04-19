<?php

namespace App\Http\Livewire\Public;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Livewire\Component;
use RateLimiter;

class Test extends Component
{

    use WithRateLimiting;

    public $test = '#FF0000';

    public string $rateLimitKey = 'test';
    public int $rateLimitAttempts = 5;

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.test');
    }

    public function updatedTest(): void
    {
        session()->flash('updated', 'test');
    }

}
