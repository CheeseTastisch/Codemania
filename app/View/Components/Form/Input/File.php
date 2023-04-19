<?php

namespace App\View\Components\Form\Input;

use App\Models\Components\Modeled\Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class File extends Component
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
        public bool $multiple = false,
        public string $accept = '*/*',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.file');
    }
}
