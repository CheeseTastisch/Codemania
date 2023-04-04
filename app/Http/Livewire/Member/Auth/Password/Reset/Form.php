<?php

namespace App\Http\Livewire\Member\Auth\Password\Reset;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Component;
use Password;
use Route;

class Form extends Component
{

    public string $password,
        $password_confirmation;

    public string $email,
        $token;

    public function mount()
    {
        $this->email = User::whereId(Route::current()->parameter('id'))->first()?->email;
        $this->token = Route::current()->parameter('token');

        if ($this->email == null || !Password::tokenExists(User::where('email', $this->email)->first(), $this->token)) session()->flash('reset.token');
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.auth.password.reset.form');
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token
            ],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => null
                ])->save();

                event(new PasswordReset($user));
            }
        );

        session()->flash('reset.success');
    }

    protected function getRules(): array
    {
        return [
            'password' => [
                'required',
                PasswordRule::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'required|same:password',
        ];
    }

}
