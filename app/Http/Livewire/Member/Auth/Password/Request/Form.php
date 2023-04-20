<?php

namespace App\Http\Livewire\Member\Auth\Password\Request;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Password;

class Form extends Component
{

    public string $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.auth.password.request.form');
    }

    public function send(): void
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        session()->flash('request.send');
    }


    protected function getRules(): array
    {
        return $this->rules;
    }

}
