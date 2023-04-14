<?php

namespace App\Helper\Color;

use Exception;
use Illuminate\Support\Collection;

class Color
{

    public array $rgb;
    public array $hsl;

    public static function parseRgb(mixed $rgb): Color|null {
        if (is_array($rgb)) {
            if (collect($rgb)->every(fn($value) => is_float($value) && $value >= 0 && $value <= 1)) return new Color($rgb, true, true);
            else if (collect($rgb)->every(fn($value) => is_int($value) && $value >= 0 && $value <= 255)) return new Color($rgb, true, false);
            else return null;
        }

        if (is_string($rgb)) {
            if (preg_match('/^#([a-f0-9]{3}|[a-f0-9]{6})$/i', $rgb)) {
                $rgb = str_split(substr($rgb, 1), 2);
                $rgb = array_map(fn($value) => hexdec($value), $rgb);
                return new Color($rgb, true, false);
            }

            if (preg_match('/^rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)$/i', $rgb, $matches)) {
                $rgb = array_slice($matches, 1);
                $rgb = array_map(fn($value) => intval($value), $rgb);
                return new Color($rgb, true, false);
            }

            if (str_contains($rgb, ',')) {
                $rgb = explode(',', $rgb);
                $rgb = array_map(fn($value) => floatval($value), $rgb);

                if (collect($rgb)->every(fn($value) => $value >= 0 && $value <= 1)) return new Color($rgb, true, true);
                else if (collect($rgb)->every(fn($value) => $value >= 0 && $value <= 255)) return new Color($rgb, true, false);
                else return null;
            }

            if (str_contains($rgb, ' ')) {
                $rgb = explode(' ', $rgb);
                $rgb = array_map(fn($value) => floatval($value), $rgb);

                if (collect($rgb)->every(fn($value) => $value >= 0 && $value <= 1)) return new Color($rgb, true, true);
                else if (collect($rgb)->every(fn($value) => $value >= 0 && $value <= 255)) return new Color($rgb, true, false);
                else return null;
            }

            return null;
        }

        return null;
    }

    public static function parseHsl(mixed $hsl): Color|null
    {
        if (is_array($hsl)) {
            if (collect($hsl)->every(fn($value) => is_int($value) && $value >= 0 && $value <= 360)) return new Color($hsl, false, false);
            else if (collect($hsl)->every(fn($value) => is_float($value) && $value >= 0 && $value <= 1)) return new Color($hsl, false, true);
            else return null;
        }

        if (is_string($hsl)) {
            if (preg_match('/^hsl\((\d{1,3}),\s*(\d{1,3})%,\s*(\d{1,3})%\)$/i', $hsl, $matches)) {
                $hsl = array_slice($matches, 1);
                $hsl = array_map(fn($value) => intval($value), $hsl);
                return new Color($hsl, false, false);
            }

            if (str_contains($hsl, ',')) {
                $hsl = explode(',', $hsl);
                $hsl = array_map(fn($value) => floatval($value), $hsl);

                if (collect($hsl)->every(fn($value) => $value >= 0 && $value <= 1)) return new Color($hsl, false, true);
                else if (collect($hsl)->every(fn($value) => $value >= 0 && $value <= 360)) return new Color($hsl, false, false);
                else return null;
            }

            if (str_contains($hsl, ' ')) {
                $hsl = explode(' ', $hsl);
                $hsl = array_map(fn($value) => floatval($value), $hsl);

                if (collect($hsl)->every(fn($value) => $value >= 0 && $value <= 1)) return new Color($hsl, false, true);
                else if (collect($hsl)->every(fn($value) => $value >= 0 && $value <= 360)) return new Color($hsl, false, false);
                else return null;
            }

            return null;
        }

        return null;
    }

    public function __construct(array $values, bool $rgb = true, bool $decimal = true)
    {
        if ($rgb) {
            $this->rgb = $this->generateRgbValues($values, $decimal);
            $this->generateHsl();
        } else {
            $this->hsl = $this->generateHslValues($values, $decimal);
            $this->generateRgb();
        }
    }

    public function getRgb(bool $decimal = true, int|null $precision = null): Collection
    {
        if ($precision === null) $precision = $decimal ? 3 : 0;

        return collect($this->rgb)->map(fn($value) => round($decimal ? $value : $value * 255, $precision));
    }

    public function getHex(): string
    {
        $values = $this->getRgb(false);

        return sprintf('#%02x%02x%02x', $values->get('r'), $values->get('g'), $values->get('b'));
    }

    public function getHsl(bool $decimal = true, int|null $precision = null): Collection
    {
        if ($precision === null) $precision = $decimal ? 3 : 0;

        return collect($this->hsl)->map(fn($value, $key) => round($decimal ? $value : match($key) {
            'h' => $value * 360,
            's', 'l' => $value * 100,
        }, $precision));
    }

    public function shiftLightness(float $amount): Color
    {
        return new Color([
            'h' => $this->hsl['h'],
            's' => $this->hsl['s'],
            'l' => $this->hsl['l'] + $amount,
        ], false, true);
    }

    private function generateRgbValues(array $values, bool $decimal): array
    {
        $values = array_map(fn($value) => $decimal ? $value : $value / 255, $values);

        if (is_assoc($values)) return $values;
        else if (count($values) === 3) return ['r' => $values[0], 'g' => $values[1], 'b' => $values[2],];
        else throw new Exception('Invalid RGB values');
    }

    private function generateHslValues(array $values, bool $decimal): array
    {
        $values = array_map(fn($key, $value) => match ($key) {
            'h', 0 => $decimal ? $value : ($value % 360) / 360,
            's', 1, 'l', 2 => $decimal ? $value : $value / 100,
        }, array_keys($values), array_values($values));

        if (is_assoc($values)) return $values;
        else if (count($values) === 3) return ['h' => $values[0], 's' => $values[1], 'l' => $values[2],];
        else throw new Exception('Invalid HSL values');
    }

    private function generateHsl(): void
    {
        $max = max($this->rgb);
        $min = min($this->rgb);

        if ($max === $min) $h = 0;
        else if ($max === $this->rgb['r']) $h = (60 * (($this->rgb['g'] - $this->rgb['b']) / ($max - $min)) + 360) % 360;
        else if ($max === $this->rgb['g']) $h = 60 * (($this->rgb['b'] - $this->rgb['r']) / ($max - $min)) + 120;
        else $h = 60 * (($this->rgb['r'] - $this->rgb['g']) / ($max - $min)) + 240;

        $l = ($max + $min) / 2;

        if ($max === $min) $s = 0;
        else if ($l <= 0.5) $s = ($max - $min) / ($max + $min);
        else $s = ($max - $min) / (2 - $max - $min);

        $this->hsl = [
            'h' => $h / 360,
            's' => $s,
            'l' => $l,
        ];
    }

    private function generateRgb(): void
    {
        if ($this->hsl['l'] < 0.5) $q = $this->hsl['l'] * (1 + $this->hsl['s']);
        else $q = $this->hsl['l'] + $this->hsl['s'] - $this->hsl['l'] * $this->hsl['s'];

        $p = 2 * $this->hsl['l'] - $q;

        $r = max(0, $this->hueToRgb($p, $q, $this->hsl['h'] + (1 / 3)));
        $g = max(0, $this->hueToRgb($p, $q, $this->hsl['h']));
        $b = max(0, $this->hueToRgb($p, $q, $this->hsl['h'] - (1 / 3)));

        $this->rgb = [
            'r' => min(1, $r),
            'g' => min(1, $g),
            'b' => min(1, $b),
        ];
    }

    private function hueToRgb(float $p, float $q, float $h): float
    {
        if ($h < 0) $h += 1;
        if ($h > 1) $h -= 1;

        if ($h < (1 / 6)) return $p + ($q - $p) * 6 * $h;
        if ($h < (1 / 2)) return $q;
        if ($h < (2 / 3)) return $p + ($q - $p) * (2 / 3 - $h) * 6;

        return $p;
    }


}
