<?php

namespace App\Concerns\TwoFactorAuthenticatable;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Eye\SimpleCircleEye;
use BaconQrCode\Writer;
use Str;
use TwoFactor;

trait TwoFactorAuthenticatable
{

    public function hasEnabledTwoFactorAuthentication(): bool
    {
        return !is_null($this->two_factor_secret)
            && !is_null($this->two_factor_recovery_codes);
    }

    public function hasCompletedTwoFactorAuthentication(): bool
    {
        return $this->hasEnabledTwoFactorAuthentication()
            && !is_null($this->confirmed_two_factor_at);
    }

    public function enableTwoFactoryAuthentication(): void
    {
        $this->forceFill([
            'two_factor_secret' => encrypt(TwoFactor::generateSecretKey()),
            'two_factor_recovery_codes' => encrypt(json_encode(array_map(fn() => Str::random(), range(1, 8)))),
        ])->save();
    }

    public function confirmTwoFactorAuthentication(string $code): bool
    {
        if ($this->validateTwoFactorAuthentication($code, false) === TwoFactorVerifyResult::InvalidCode) return false;

        $this->forceFill([
            'confirmed_two_factor_at' => now(),
        ])->save();

        return true;
    }

    public function disableTwoFactorAuthentication(): void
    {
        $this->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'confirmed_two_factor_at' => null,
        ])->save();
    }

    public function getRecoveryCodes(): array
    {
        return json_decode(decrypt($this->two_factor_recovery_codes), true);
    }

    public function replaceRecoveryCode(string $oldCode): void
    {
        $this->forceFill([
            'two_factor_recovery_codes' => encrypt(json_encode(
                array_map(fn($code) => $code === $oldCode ? Str::random() : $code, $this->getRecoveryCodes())
            ))
        ])->save();
    }

    public function validateTwoFactorAuthentication(string $code, bool $allowRecoveryCodes = true): TwoFactorVerifyResult
    {
        if (TwoFactor::verify(decrypt($this->two_factor_secret), $code)) return TwoFactorVerifyResult::Success;

        if ($allowRecoveryCodes && in_array($code, $this->getRecoveryCodes())) {
            $this->replaceRecoveryCode($code);
            return TwoFactorVerifyResult::RecoveryCodeUsed;
        }

        return TwoFactorVerifyResult::InvalidCode;
    }

    public function getTwoFactorQrCodeUrl(): string
    {
        return TwoFactor::qrCodeUrl(config('app.name'), $this->display_name, decrypt($this->two_factor_secret));
    }

    public function getTwoFactorQrCode(): string
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(200, 0, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd
            )
        ))->writeString($this->getTwoFactorQrCodeUrl());

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }

    public function tryTwoFactorAuthentication(string $code): TwoFactorVerifyResult
    {
        if (($code = $this->validateTwoFactorAuthentication($code)) !== TwoFactorVerifyResult::InvalidCode) session()->put('2fa.verified', true);

        return $code;
    }

    public function isTwoFactorAuthenticationVerified(): bool
    {
        return $this->hasEnabledTwoFactorAuthentication() && session()->has('2fa.verified');
    }

}
