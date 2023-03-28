<?php

namespace App\Concerns\TwoFactorAuthenticatable;

enum TwoFactorVerifyResult: int
{
    case Success = 0;
    case InvalidCode = 1;
    case RecoveryCodeUsed = 2;

}
