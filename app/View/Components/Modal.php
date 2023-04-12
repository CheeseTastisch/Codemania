<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string|null $title = null,
        public bool $closeButton = true,
        public string $backdrop = 'dynamic',
        public string $maxWidth = 'lg',
        public string $placement = 'center-center',
        public bool $withFooter = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
