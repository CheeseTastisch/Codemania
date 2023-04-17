<?php

namespace App\View\Components\Old\Form\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string      $name,
        public string      $label,
        public bool        $multipleErrors = false,
        public bool        $wire = false,
        public string|bool $wireType = 'defer',
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
        return view('components.form.input.textarea');
    }
}
