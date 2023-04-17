<?php

namespace App\Concerns\Components;

trait WithStyle
{

    public function byStyle(array $forStyle): string {
        return $forStyle[$this->style->value];
    }

}
