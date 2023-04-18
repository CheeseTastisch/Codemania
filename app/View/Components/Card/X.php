<?php

namespace App\View\Components\Card;

use App\Concerns\Components\WithStyle;
use App\Models\Components\Styled\Style;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class X extends Component
{

    use WithStyle;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public Style $style = Style::Accent,
        public string $maxWidth = ''
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.x');
    }
}
