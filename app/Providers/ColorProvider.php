<?php

namespace App\Providers;

class ColorProvider
{

    public function toHex(array $rgb): string {
        return sprintf('#%02x%02x%02x', $rgb[0], $rgb[1], $rgb[2]);
    }

}
