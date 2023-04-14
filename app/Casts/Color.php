<?php

namespace App\Casts;

use App\Helper\Color\Color as ColorModel;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Color implements CastsAttributes
{

    public function __construct(
        public  bool $rgb = true
    )
    {
    }

    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $this->rgb ? ColorModel::parseRgb($value) : ColorModel::parseHsl($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value instanceof ColorModel) return $this->rgb ? $value->getRgb()->implode(' ') : $value->getHsl()->implode(' ');

        return $value;
    }

    public function serialize(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $this->get($model, $key, $value, $attributes);
    }
}
