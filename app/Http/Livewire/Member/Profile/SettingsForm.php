<?php

namespace App\Http\Livewire\Member\Profile;

use App\Concerns\TwoFactorAuthenticatable\TwoFactorVerifyResult;
use Hash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class SettingsForm extends Component
{

    public $theme,
        $email,
        $current_password,
        $password,
        $password_confirmation,
        $two_fa_code,
        $current_password_two_factor;

    public function mount() {
        $this->theme = auth()->user()->theme;
        $this->email -> auth()->user()->email;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.profile.settings-form');
    }

    public function updatedTheme() {
        $this->validate();

        auth()->user()->update([
            'theme' => $this->theme
        ]);

        session()->flash('updated', 'them');
    }

    public function updatedEmail() {
        $this->validate();

        auth()->user()->update([
            'email' => $this->email
        ]);

        session()->flash('updated', 'email');
    }

    public function changePassword() {
        $this->validate();

        if (!Hash::check($this->current_password, auth()->user()->password)) {
            $this->addError('current_password', 'Das eingegebene Passwort ist falsch.');
            return;
        }

        auth()->user()->update([
            'password' => $this->password
        ]);

        $this->emit('showToast', 'Dein Passwort wurde erfolgreich geändert.');
    }

    public function confirmTwoFactor() {
        $this->validate();

        if (auth()->user()->confirmTwoFactorAuthentication($this->two_fa_code)) {
            $this->emit('showToast', 'Zwei-Faktor-Authentifizierung wurde erfolgreich aktiviert.');
        } else {
            $this->addError('two_fa_code', 'Der eingegebene Code ist ungültig.');
        }
    }


    protected function getRules(): array
    {
        return [
            'theme' => 'required|in:light,dark',
            'email' => 'required|email',
            'current_password' => 'nullable',
            'password' => [
                'nullable',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'nullable|same:password',
            'two_fa_code' => 'nullable',
            'current_password_two_factor' => 'nullable'
        ];
    }
}
