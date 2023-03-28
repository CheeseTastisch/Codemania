<?php

namespace App\Facades;

use App\Providers\TwoFactorAuthenticationProvider;
use Illuminate\Support\Facades\Facade;

class TwoFactorAuthenticationFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return TwoFactorAuthenticationProvider::class;
    }

}
