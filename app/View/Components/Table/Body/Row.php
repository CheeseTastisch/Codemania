<?php

namespace App\View\Components\Table\Body;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Row extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $hover = true,
        public bool $border = true,
        public bool $stripe = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.body.row');
    }
}
