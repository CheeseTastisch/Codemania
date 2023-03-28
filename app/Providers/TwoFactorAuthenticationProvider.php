<?php

namespace App\Providers;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Container\BindingResolutionException;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use PragmaRX\Google2FA\Google2FA;
use Psr\SimpleCache\InvalidArgumentException;

class TwoFactorAuthenticationProvider
{

    protected Google2FA $engine;
    protected Repository|null $cache;

    public function __construct()
    {
        try {
            $this->engine = app()->make(Google2FA::class);
            $this->cache = app()->make(Repository::class);
        } catch (BindingResolutionException $e) {
            abort(500, $e->getMessage());
        }
    }

    public function generateSecretKey(): string
    {
        try {
            return $this->engine->generateSecretKey();
        } catch (IncompatibleWithGoogleAuthenticatorException|InvalidCharactersException|SecretKeyTooShortException $e) {
            abort(500, $e->getMessage());
        }
    }

    public function qrCodeUrl($companyName, $holder, $secret): string
    {
        return $this->engine->getQRCodeUrl($companyName, $holder, $secret);
    }

    public function verify($secret, $code): bool
    {
        try {
            $timestamp = $this->engine->verifyKeyNewer($secret, $code, optional($this->cache)->get($key = '2fa_codes.' . md5($code)));
        } catch (IncompatibleWithGoogleAuthenticatorException|InvalidCharactersException|SecretKeyTooShortException|InvalidArgumentException $e) {
            abort(500, $e->getMessage());
        }

        if ($timestamp !== false) {
            if ($timestamp === true) $timestamp = $this->engine->getTimestamp();
            optional($this->cache)->put($key, $timestamp, ($this->engine->getWindow() ?: 1) * 60);

            return true;
        }

        return false;
    }

}
