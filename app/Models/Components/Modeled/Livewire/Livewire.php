<?php

namespace App\Models\Components\Modeled\Livewire;

use App\Models\Components\Modeled\Model;

class Livewire extends Model
{

    public function __construct(
        public string         $model,
        public LivewireUpdate $update,
        public string         $debounce = '250ms',
    )
    {
        switch ($this->update) {
            case LivewireUpdate::Debounce:
                $this->attributes[$this->update->value . $this->debounce] = $this->model;
                break;
            default:
                $this->attributes[$this->update->value] = $this->model;
        }
    }

}

