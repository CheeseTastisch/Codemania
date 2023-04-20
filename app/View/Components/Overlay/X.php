<?php

namespace App\View\Components\Overlay;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class X extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $widths = ''
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.overlay.x');
    }
}
