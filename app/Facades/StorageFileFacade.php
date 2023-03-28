<?php

namespace App\Facades;

use App\Providers\StorageFileProvider;
use Illuminate\Support\Facades\Facade;

class StorageFileFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return StorageFileProvider::class;
    }

}
