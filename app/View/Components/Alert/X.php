<?php

namespace App\View\Components\Alert;

use App\Concerns\Components\WithStyle;
use App\Models\Components\Styled\Style;
use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Log;

class X extends Component
{

    use WithStyle;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public string $srInfo = '',
        public Style  $style = Style::Accent,
    )
    {
        if ($this->srInfo != '' && $this->title == '') {
            throw new Exception('Alert components sr-info will be ignored if title is not set.');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.x');
    }

}
