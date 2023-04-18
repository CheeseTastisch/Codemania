<?php

namespace App\View\Components\Form;

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
        public string $type = 'form',
        public string $ySpace = 'space-y-6',
        public string $livewire = '',
        public bool $prevent = true,
    )
    {
        if ($this->livewire != '' && $this->type != 'form') {
            throw new Exception('Livewire can only be used with form-type components.');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.x');
    }
}
