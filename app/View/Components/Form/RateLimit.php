<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RateLimit extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $firstLine,
        public string $error = 'rateLimit',
        public bool $wirePoll = true,
        public string $seconds = '!message!'
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.rate-limit');
    }
}
