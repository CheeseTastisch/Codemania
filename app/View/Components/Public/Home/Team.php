<?php

namespace App\View\Components\Public\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Team extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $image,
        public string $description,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.public.home.team');
    }
}
