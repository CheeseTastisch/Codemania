<?php

namespace App\View\Components\Alert;

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
        public string $title,
        public string $srInfo,
        public Style  $style = Style::Accent,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.x');
    }

}
