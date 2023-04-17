<?php

namespace App\Models\Components\Modeled\Livewire;

enum LivewireUpdate: string
{

    case Default = 'wire:model';
    case Lazy = 'wire:model.lazy';
    case Defer = 'wire:model.defer';
    case Debounce = 'wire:model.debounce';


}
