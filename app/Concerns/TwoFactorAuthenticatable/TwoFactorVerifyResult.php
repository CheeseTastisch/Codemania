<?php

namespace App\Concerns\TwoFactorAuthenticatable;

class TwoFactorVerifyResult
{

    public TwoFactorVerifyResultType $type;

    public ?string $oldRecoveryCode = null;
    public ?string $newRecoveryCode = null;

    protected function __construct(TwoFactorVerifyResultType $type, ?string $oldRecoveryCode = null, ?string $newRecoveryCode = null)
    {
        $this->type = $type;
        $this->oldRecoveryCode = $oldRecoveryCode;
        $this->newRecoveryCode = $newRecoveryCode;
    }

    public function wasSuccessful(): bool
    {
        return $this->type === TwoFactorVerifyResultType::Success;
    }

    public function wasInvalidCode(): bool
    {
        return $this->type === TwoFactorVerifyResultType::InvalidCode;
    }

    public function wasRecoveryCodeUsed(): bool
    {
        return $this->type === TwoFactorVerifyResultType::RecoveryCodeUsed;
    }

    public static function success(): self
    {
        return new self(TwoFactorVerifyResultType::Success);
    }

    public static function invalidCode(): self
    {
        return new self(TwoFactorVerifyResultType::InvalidCode);
    }

    public static function recoveryCodeUsed(string $oldRecoveryCode, string $newRecoveryCode): self
    {
        return new self(TwoFactorVerifyResultType::RecoveryCodeUsed, $oldRecoveryCode, $newRecoveryCode);
    }

}
