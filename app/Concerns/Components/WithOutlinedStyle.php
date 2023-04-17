<?php

namespace App\Concerns\Components;

use App\Models\Components\Styled\OutlinedStyle;

trait WithOutlinedStyle
{

    public function byStyle(array $forStyle): string {
        return $forStyle[$this->style->value];
    }

    public function isOutlined(): bool {
        return match ($this->style) {
            OutlinedStyle::OutlinedInfo, OutlinedStyle::OutlinedDanger, OutlinedStyle::OutlinedSuccess, OutlinedStyle::OutlinedWarning, OutlinedStyle::OutlinedAccent => true,
            default => false,
        };
    }

}
