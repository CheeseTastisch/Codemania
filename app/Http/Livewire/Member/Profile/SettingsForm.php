<?php

namespace App\Http\Livewire\Member\Profile;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\TwoFactorAuthenticatable\TwoFactorVerifyResult;
use Hash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class SettingsForm extends Component
{

    use ValidatesMultipleInputs;

    public $theme,
        $email,
        $current_password,
        $password,
        $password_confirmation,
        $enable_2fa_password,
        $confirm_2fa_code,
        $disable_2fa_password,
        $disable_2fa_code;

    public function mount(): void
    {
        $this->theme = auth()->user()->theme;
        $this->email = auth()->user()->email;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.profile.settings-form');
    }

    public function updatedTheme(): void
    {
        $this->validateOnly('theme');

        auth()->user()->update(['theme' => $this->theme]);
        session()->flash('updated', 'theme');
    }

    public function updatedEmail(): void
    {
        $this->validateOnly('email');

        auth()->user()->update([
            'email' => $this->email,
            'email_verified_at' => null,
        ]);
        session()->flash('updated', 'email');
        $this->emit('showToast', 'Da du deine E-Mail Adresse geändert hast, muss du diese neu bestätigen.', 2500, false, 'warning');

        auth()->user()->sendEmailVerificationNotification();
    }

    public function changePassword(): void
    {
        $this->validateMultiple(['current_password', 'password', 'password_confirmation']);

        if (Hash::check($this->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($this->password)]);

            $this->current_password = '';
            $this->password = '';
            $this->password_confirmation = '';

            $this->emit('showToast', 'Du hast dein Passwort erfolgreich geändert.');
        } else {
            $this->addError('current_password', 'Das aktuelle Passwort ist falsch.');
        }
    }

    public function enable2Fa(): void
    {
        $this->validateOnly('enable_2fa_password');

        if (Hash::check($this->enable_2fa_password, auth()->user()->password)) {
            auth()->user()->enable2Fa();
            $this->emit('showToast', 'Zwei-Faktor-Authentifizierung wurde aktiviert, bitte scanne den QR-Code mit deiner Authentifizierungs-App und gib den Zwei-Faktor-Code ein um die Aktivierung abzuschließen.');
        } else {
            $this->addError('enable_2fa_password', 'Das Passwort ist falsch.');
        }
    }

    public function confirm2Fa(): void
    {
        $this->validateOnly('confirm_2fa_code');

        if (auth()->user()->confirm2Fa($this->confirm_2fa_code)) {
            $this->emit('showToast', 'Zwei-Faktor-Authentifizierung wurde erfolgreich aktiviert.');
        } else {
            $this->addError('confirm_2fa_code', 'Der Zwei-Faktor-Code ist falsch.');
        }
    }

    public function disable2Fa(): void
    {
        $this->validateMultiple(['disable_2fa_password', 'disable_2fa_code']);

        if (Hash::check($this->disable_2fa_password, auth()->user()->password)) {
            if (auth()->user()->disable2Fa($this->disable_2fa_code)->wasInvalidCode()) {
                $this->addError('disable_2fa_code', 'Der Zwei-Faktor-Code ist falsch, du kannst auch einen Wiederherstellungscode verwenden.');
            } else {
                $this->emit('showToast', 'Zwei-Faktor-Authentifizierung wurde erfolgreich deaktiviert.');
            }
        } else {
            $this->addError('disable_2fa_password', 'Das Passwort ist falsch.');
        }
    }

    protected function getRules(): array
    {
        return [
            'theme' => 'required|in:light,dark',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->user()->id),
            ],
            'current_password' => 'required',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'required|same:password',
            'enable_2fa_password' => 'required',
            'confirm_2fa_code' => 'required',
            'disable_2fa_password' => 'required',
            'disable_2fa_code' => 'required',
        ];
    }

}
