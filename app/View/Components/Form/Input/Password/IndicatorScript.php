<?php

namespace App\View\Components\Form\Input\Password;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IndicatorScript extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $for,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.password.indicator-script');
    }
}
