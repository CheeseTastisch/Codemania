<?php

namespace App\Models\Components\Modeled\Value;

use App\Models\Components\Modeled\Model;

class Value extends Model
{

    public function __construct(
        public string $value,
    )
    {
        $this->attributes['value'] = $this->value;
    }

}
