<?php

namespace App\Helper\Color;

use Exception;

class PaletteGenerator
{

    private static array $lightness = [
        [0.1, 0.15, 0, 0.5],
        [0.15, 0.22778, 0.5, 0.07778],
        [0.22778, 0.30556, 0.07778, 0.07778],
        [0.30556, 0.38334, 0.07778, 0.07778],
        [0.38334, 0.46112, 0.07778, 0.07778],
        [0.46112, 0.5389, 0.07778, 0.07778],
        [0.5389, 0.61668, 0.07778, 0.07778],
        [0.61668, 0.69446, 0.07778, 0.07778],
        [0.69446, 0.77224, 0.07778, 0.07778],
        [0.77224, 0.85, 0.07778, 0.5],
        [0.85, 0.9, 0.5, 0]
    ];

    private int $baseColorIndex;

    public function __construct(
        private Color $baseColor
    ) {
        $l = $this->baseColor->getHsl(true, 6)['l'];

        foreach (self::$lightness as $index => $lightness) {
            if ($l >= $lightness[0] && $l < $lightness[1]) {
                $this->baseColorIndex = $index;
                break;
            }
        }

        if (!isset($this->baseColorIndex)) throw new Exception('Base color is not in the lightness range');
    }

    public function getBaseColor(): Color
    {
        return $this->baseColor;
    }

    public function getBaseColorIndex(): int
    {
        return $this->baseColorIndex;
    }

    public function generatePalette(): array
    {
        $palette = [];

        $palette[$this->baseColorIndex] = $this->baseColor;

        for ($i = $this->baseColorIndex - 1; $i >= 0; $i--) {
            $palette[$i] = $palette[$i + 1]->shiftLightness(-self::$lightness[$i][2]);
        }

        for ($i = $this->baseColorIndex + 1; $i < count(self::$lightness); $i++) {
            $palette[$i] = $palette[$i - 1]->shiftLightness(self::$lightness[$i][3]);
        }

        return $palette;
    }

}
