<?php

namespace App\View\Components\Form\Input;

use App\Models\Components\Modeled\AlpineJs\AlpineJs;
use App\Models\Components\Modeled\Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Password extends Component
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
        public bool $indicated = false,
    )
    {
        if ($this->model instanceof AlpineJs && $this->indicated) {
            throw new \Exception('Password component currently does not support AlpineJs models with password strength indicator.');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.password');
    }
}
