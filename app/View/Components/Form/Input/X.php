<?php

namespace App\View\Components\Form\Input;

use App\Models\Components\Modeled\Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class X extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $label,
        public Model $model,
        public bool $updatable = false,
        public bool $multipleErrors = true,
        public string $type = 'text',
    )
    {
        if ($this->type !== 'text' && $this->type !== 'number' && $this->type !== 'email' && $this->type !== 'time') {
            throw new \Exception('Form/X component currently only supports text, number, email and time input types.');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.x');
    }
}
