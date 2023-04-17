<?php

namespace App\View\Components\Old\Form\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public bool $wire = false,
        public string|bool $wireType = 'defer',
        public bool|null $checked = null,
        public bool $updatable = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.checkbox');
    }
}
