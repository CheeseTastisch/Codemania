<?php

namespace App\View\Components\Alert\Action;

use Cache;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Psr\SimpleCache\InvalidArgumentException;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'info',
        public bool $outlined = false,
        public string $classes = '',
        public string $click = '',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert.action.button');
    }

    public function getClasses(): string
    {
        return match ($this->outlined) {
            true => match ($this->type) {
                'danger' => 'text-red-800 border-red-800 hover:bg-red-900 hover:text-white focus:ring-red-300 dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800',
                'success' => 'text-green-800 border-green-800 hover:bg-green-900 hover:text-white focus:ring-green-300 dark:hover:bg-green-600 dark:border-green-600 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800',
                'warning' => 'text-yellow-800 border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-yellow-300 dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800',
                default => 'text-blue-800 border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-blue-300 dark:hover:bg-blue-600 dark:border-blue-600 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800',
            },
            false => match ($this->type) {
                'danger' => 'text-white bg-red-800 hover:bg-red-900 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800',
                'success' => 'text-white bg-green-800 hover:bg-green-900 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
                'warning' => 'text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-yellow-300 dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800',
                default => 'text-white bg-blue-800 hover:bg-blue-900 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
            }
        };
    }

}
