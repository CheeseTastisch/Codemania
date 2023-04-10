<?php

namespace App\View\Components\Table\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public bool $srOnly = false,
        public bool $sortable = false,
        public string|bool $sortField = false,
        public string|bool $sortDirection = false,
        public string|bool $wireMethod = false,
    )
    {
        if ($this->srOnly && $this->sortable) {
            throw new \Exception('You can\'t use srOnly and sortable at the same time');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.header.field');
    }
}
