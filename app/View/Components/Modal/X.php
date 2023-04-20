<?php

namespace App\View\Components\Modal;

use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class X extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title = '',
        public bool   $closeButton = true,
        public string $maxWidth = 'lg',
    )
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.x');
    }
}
