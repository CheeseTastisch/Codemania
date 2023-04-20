<?php

namespace App\View\Components\Form\Input;

use App\Models\Components\Modeled\AlpineJs\AlpineJs;
use App\Models\Components\Modeled\Livewire\Livewire;
use App\Models\Components\Modeled\Livewire\LivewireUpdate;
use App\Models\Components\Modeled\Model;
use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Date extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $label,
        public Model  $model,
        public bool   $updatable = false,
        public bool   $multipleErrors = true,
    )
    {
        if ($this->model instanceof AlpineJs) throw new Exception('The AlpineJs model is not implemented for the date component.');
        if ($this->model instanceof Livewire) {
            if ($this->model->update === LivewireUpdate::Lazy || $this->model->update === LivewireUpdate::Debounce) {
                throw new Exception('The Livewire lazy and debounce update modes are not implemented for the color component.');
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input.date');
    }
}
