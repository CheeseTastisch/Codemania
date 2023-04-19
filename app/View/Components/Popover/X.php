<?php

namespace App\View\Components\Popover;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class X extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $placement = 'top',
        public bool $arrow = true,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popover.x');
    }
}
