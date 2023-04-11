<?php

namespace App\View\Components\Table\Content;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Row extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $withHover = true,
        public bool $withStripe = false,
        public bool $withBorder = true,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.content.row');
    }
}
