<?php

namespace App\Models\Components\Modeled\AlpineJs;

use App\Models\Components\Modeled\Model;

class AlpineJs extends Model
{

    public function __construct(
        public string         $model,
        public AlpineJsUpdate $update,
        public string         $debounce = '250ms',
        public AlpineJsType   $type = AlpineJsType::Text,
    )
    {
        $starting = match ($this->update) {
            AlpineJsUpdate::Debounce => $this->update->value . '.' . $this->debounce,
            default => $this->update->value,
        };

        if ($this->type === AlpineJsType::Number) $this->attributes[$starting . '.number'] = $this->model;
        else $this->attributes[$starting] = $this->model;
    }

}

