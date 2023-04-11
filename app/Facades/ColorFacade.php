<?php

namespace App\Facades;

use App\Providers\ColorProvider;
use App\Providers\StorageFileProvider;
use Illuminate\Support\Facades\Facade;

class ColorFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return ColorProvider::class;
    }

}
