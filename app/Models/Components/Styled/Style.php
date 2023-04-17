<?php

namespace App\Models\Components\Styled;

enum Style: string
{

    case Info = 'info';
    case Danger = 'danger';
    case Success = 'success';
    case Warning = 'warning';
    case Accent = 'accent';

}
