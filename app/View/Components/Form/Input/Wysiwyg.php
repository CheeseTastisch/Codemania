<?php

namespace App\View\Components\Form\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Wysiwyg extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public string $id = '',
        public bool $wire = false,
        public string $accordionContainer = '',
        public string $accordionTarget = '',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.wysiwyg');
    }
}
