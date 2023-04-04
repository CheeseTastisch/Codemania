<?php

namespace App\View\Components\Alert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Simple extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'info',
        public string $srInfo = 'Information',
        public bool   $wire = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.simple');
    }

    public function getClasses(): string
    {
        return match ($this->type) {
            'danger' => 'text-red-800 border-red-300 bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800',
            'success' => 'text-green-800 border-green-300 bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800',
            'warning' => 'text-yellow-800 border-yellow-300 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800',
            default => 'text-blue-800 border-blue-300 bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800',
        };
    }

}
