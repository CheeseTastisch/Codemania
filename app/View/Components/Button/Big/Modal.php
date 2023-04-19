<?php

namespace App\View\Components\Button\Big;

use App\Concerns\Components\WithOutlinedStyle;
use App\Models\Components\Styled\OutlinedStyle;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{

    use WithOutlinedStyle;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $modal,
        public string $action = 'open',
        public string $type = 'button',
        public OutlinedStyle $style = OutlinedStyle::FilledAccent,
        public bool $fullWidth = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.big.modal');
    }
}
