<?php

namespace App\View\Components\Button;

use App\Concerns\Components\WithOutlinedStyle;
use App\Models\Components\Styled\OutlinedStyle;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Js extends Component
{

    use WithOutlinedStyle;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $action,
        public string $type = 'button',
        public OutlinedStyle $style = OutlinedStyle::FilledAccent
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.js');
    }
}
