<?php

namespace App\View\Components\Form\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Date extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string      $name,
        public string      $label,
        public bool        $wire = false,
        public string|bool $wireType = '',
        public string      $value = '',
        public bool        $updatable = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.date');
    }
}
