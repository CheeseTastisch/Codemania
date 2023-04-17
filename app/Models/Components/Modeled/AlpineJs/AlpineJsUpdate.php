<?php

namespace App\Models\Components\Modeled\AlpineJs;

enum AlpineJsUpdate: string
{

    case Default = 'x-model';
    case Lazy = 'x-model.lazy';
    case Debounce = 'x-model.debounce';


}
