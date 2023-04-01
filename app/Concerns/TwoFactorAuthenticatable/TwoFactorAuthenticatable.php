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

    public function hasEnabled2Fa(): bool
    {
        return !is_null($this->two_factor_secret)
            && !is_null($this->two_factor_recovery_codes);
    }

    public function hasCompleted2Fa(): bool
    {
        return $this->hasEnabled2Fa()
            && !is_null($this->confirmed_two_factor_at);
    }

    public function enable2Fa(): void
    {
        $this->forceFill([
            'two_factor_secret' => encrypt(TwoFactor::generateSecretKey()),
            'two_factor_recovery_codes' => encrypt(json_encode(array_map(fn() => Str::random(), range(1, 8)))),
        ])->save();
    }

    public function confirm2Fa(string $code): bool
    {
        if ($this->validate2FaCode($code, false)->wasInvalidCode()) return false;

        $this->forceFill([
            'confirmed_two_factor_at' => now(),
        ])->save();
        session()->put('2fa.verified', true);

        return true;
    }

    public function disable2Fa(string $code): TwoFactorVerifyResult
    {
        if (($result = $this->validate2FaCode($code))->wasInvalidCode()) return $result;

        $this->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'confirmed_two_factor_at' => null,
        ])->save();

        return $result;
    }

    public function get2FaRecoveryCodes(): array
    {
        return json_decode(decrypt($this->two_factor_recovery_codes), true);
    }

    private function replace2FaRecoveryCode(string $oldCode): string
    {
        $newCode = Str::random();

        $this->forceFill([
            'two_factor_recovery_codes' => encrypt(json_encode(
                array_map(fn($code) => $code === $oldCode ? $newCode : $code, $this->get2FaRecoveryCodes())
            ))
        ])->save();

        return $newCode;
    }

    private function validate2FaCode(string $code, bool $allowRecoveryCodes = true): TwoFactorVerifyResult
    {
        if (TwoFactor::verify(decrypt($this->two_factor_secret), $code)) return TwoFactorVerifyResult::Success();

        if ($allowRecoveryCodes && in_array($code, $this->get2FaRecoveryCodes())) {
            $newCode = $this->replace2FaRecoveryCode($code);
            return TwoFactorVerifyResult::RecoveryCodeUsed($code, $newCode);
        }

        return TwoFactorVerifyResult::InvalidCode();
    }

    public function get2FaQrCodeUrl(): string
    {
        return TwoFactor::qrCodeUrl(config('app.name'), $this->display_name, decrypt($this->two_factor_secret));
    }

    public function get2FaQrCode(): string
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(200, 0, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd
            )
        ))->writeString($this->get2FaQrCodeUrl());

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }

    public function try2Fa(string $code): TwoFactorVerifyResult
    {
        if (($code = $this->validate2FaCode($code))->wasSuccessful()) session()->put('2fa.verified', true);

        return $code;
    }

    public function is2FaVerified(): bool
    {
        return $this->hasEnabled2Fa() && session()->has('2fa.verified');
    }

}
