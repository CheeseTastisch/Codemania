<?php

namespace App\Providers;

class ColorProvider
{

    public function toHex(array $rgb): string {
        return sprintf('#%02x%02x%02x', $rgb[0], $rgb[1], $rgb[2]);
    }

    public function toRgb(string $hex): array {
        $hex = str_replace('#', '', $hex);
        $length = strlen($hex);

        return [
            'r' => hexdec($length === 3 ? $hex[0] . $hex[0] : $hex[0] . $hex[1]),
            'g' => hexdec($length === 3 ? $hex[1] . $hex[1] : $hex[2] . $hex[3]),
            'b' => hexdec($length === 3 ? $hex[2] . $hex[2] : $hex[4] . $hex[5]),
        ];
    }

}
