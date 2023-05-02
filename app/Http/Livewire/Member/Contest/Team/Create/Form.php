<?php

namespace App\Http\Livewire\Member\Contest\Team\Create;

use App\Concerns\Livewire\WithSearch;
use App\Models\Contest;
use http\Client\Curl\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Form extends Component
{

    public Contest $contest;

    public $name;
    public $members = [];

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.team.create.form');
    }

    public function createTeam(): void
    {
        $this->validate();

        $errors = collect();

        collect($this->members)->each(function ($email) use ($errors) {
            $validator = validator()->make(['email' => $email], ['email' => 'email']);

            if ($validator->fails())
                $errors->push($email . ' muss eine gültige E-Mail Adresse sein.');
        });

        if ($errors->count() > 0) {
            $errors->each(fn ($error) => $this->addError('members', $error));
            return;
        }

        $team = $this->contest->teams()->create([
            'name' => $this->name,
        ]);

        $team->users()->attach(auth()->user()->id, ['role' => 'admin']);

        foreach ($this->members as $member) {
            if ($user = \App\Models\User::whereEmail($member)->first()) {
                $team->users()->attach($user->id, ['role' => 'member']);
            }
        }

        session()->flash('created');
    }

    protected function getRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('teams', 'name')->where('contest_id', $this->contest->id),
            ],
            'members' => 'required|array|min:1'
        ];
    }

}
