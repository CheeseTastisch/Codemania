<?php

namespace App\Models\Components\Modeled;

use App\Models\Components\Modeled\AlpineJs\AlpineJs;
use App\Models\Components\Modeled\AlpineJs\AlpineJsType;
use App\Models\Components\Modeled\AlpineJs\AlpineJsUpdate;
use App\Models\Components\Modeled\Livewire\Livewire;
use App\Models\Components\Modeled\Livewire\LivewireUpdate;
use App\Models\Components\Modeled\Value\Value;

abstract class Model
{

    public $attributes = [];

    public function getAttributesAsString(): string {
        return collect($this->attributes)->map(fn($value, $key) => "$key=$value")->implode(' ');
    }

    public static function livewire(string $model, LivewireUpdate $update = LivewireUpdate::Default, string $debounce = '250ms'): Livewire {
        return new Livewire($model, $update, $debounce);
    }

    public static function alpineJs(string $model, AlpineJsUpdate $update = AlpineJsUpdate::Default, string $debounce = '250ms'): AlpineJs {
        return new AlpineJs($model, $update, $debounce, AlpineJsType::Text);
    }

    public static function alpineJsNumber(string $model, AlpineJsUpdate $update = AlpineJsUpdate::Default, string $debounce = '250ms'): AlpineJs {
        return new AlpineJs($model, $update, $debounce, AlpineJsType::Number);
    }

    public static function value(string $value): Value {
        return new Value($value);
    }

}
