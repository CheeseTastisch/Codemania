<?php

namespace App\Models\Components\Styled;

enum OutlinedStyle: string
{

    case FilledInfo = 'filled-info';
    case OutlinedInfo = 'outline-info';
    case FilledDanger = 'filled-danger';
    case OutlinedDanger = 'outline-danger';
    case FilledSuccess = 'filled-success';
    case OutlinedSuccess = 'outline-success';
    case FilledWarning = 'filled-warning';
    case OutlinedWarning = 'outline-warning';
    case FilledAccent = 'filled-accent';
    case OutlinedAccent = 'outline-accent';
}
