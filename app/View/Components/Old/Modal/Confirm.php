<?php

namespace App\View\Components\Old\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Confirm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string      $id,
        public string      $action,
        public string|bool $wire = false,
        public string|null $wireType = "prevent",
        public bool        $wireLoading = true,
        public bool        $closeButton = true,
        public string      $maxWidth = 'md',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.confirm');
    }
}
