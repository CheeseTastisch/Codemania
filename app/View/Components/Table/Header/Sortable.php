<?php

namespace App\View\Components\Table\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sortable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $currentField,
        public string $currentDirection,
        public string $field,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.header.sortable');
    }
}
