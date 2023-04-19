<?php

namespace App\View\Components\Form\Input;

use App\Models\Components\Modeled\AlpineJs\AlpineJs;
use App\Models\Components\Modeled\Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
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
        public bool $wyiswyg = false,
        public int $rows = 3,
    )
    {
        if ($this->model instanceof AlpineJs && $this->wyiswyg) {
            throw new \Exception('Textarea component cannot be used with AlpineJs and Wyiswyg at the same time.');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.textarea');
    }
}
