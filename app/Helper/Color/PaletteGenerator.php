<?php

namespace App\Helper\Color;

use Exception;
use Illuminate\Support\Collection;

class PaletteGenerator
{

    private static array $lightness = [
        [0.1, 0.15, '950'],
        [0.15, 0.22778, '900'],
        [0.22778, 0.30556, '800'],
        [0.30556, 0.38334, '700'],
        [0.38334, 0.46112, '600'],
        [0.46112, 0.5389, '500'],
        [0.5389, 0.61668, '400'],
        [0.61668, 0.69446, '300'],
        [0.69446, 0.77224, '200'],
        [0.77224, 0.85, '100'],
        [0.85, 0.90, '50']
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

        if ($l < 0.1) {
            $this->baseColor = $this->baseColor->shiftLightness(0.1);
            $this->baseColorIndex = 0;
        } if ($l >= 0.9) {
            $this->baseColor = $this->baseColor->shiftLightness(-0.1);
            $this->baseColorIndex = 10;
        }
    }

    public function getBaseColor(): Color
    {
        return $this->baseColor;
    }

    public function getBaseColorIndex(): int
    {
        return $this->baseColorIndex;
    }

    /**
     * @throws Exception
     */
    public function generatePalette(): Collection
    {
        $palette = [];

        $palette[$this->baseColorIndex] = [$this->baseColor, self::$lightness[$this->baseColorIndex][2]];

        for ($i = $this->baseColorIndex - 1; $i >= 0; $i--) {
            $palette[$i] = [$palette[$i + 1][0]->shiftLightness($i == 0 ? -0.05 : -0.07778), self::$lightness[$i][2]];
        }

        for ($i = $this->baseColorIndex + 1; $i < count(self::$lightness); $i++) {
            $palette[$i] = [$palette[$i - 1][0]->shiftLightness(($i == count(self::$lightness) - 1) ? 0.05 : 0.07778), self::$lightness[$i][2]];
        }

        return collect($palette)->mapWithKeys(fn($value) => [$value[1] => $value[0]])->sortKeys();
    }

}
