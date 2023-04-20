<?php

namespace App\View\Components\Table\Body;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cell extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $header = false,
        public int  $colspan = 1,
        public int  $rowspan = 1,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.body.cell');
    }
}
