<?php

namespace App\Http\Livewire\Member\Profile;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use StorageFile;

class PersonalForm extends Component
{

    use WithFileUploads;

    public $firstname,
        $lastname,
        $nickname,
        $display_name,
        $birthday,
        $class,
        $gender,
        $about,
        $profile_picture;

    public function mount(): void
    {
        $this->firstname = auth()->user()->first_name;
        $this->lastname = auth()->user()->last_name;
        $this->nickname = auth()->user()->nickname ?? '';
        $this->display_name = auth()->user()->display_name_type == 'nickname' ? 'Nickname' : auth()->user()->display_name_type;
        $this->birthday = optional(auth()->user()->birthday)->format('d.m.Y');
        $this->class = auth()->user()->class ?? '';
        $this->gender = auth()->user()->gender ?? 'null';
        $this->about = auth()->user()->about ?? '';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.profile.personal-form');
    }

    public function updatedFirstname(): void
    {
        $this->validateOnly('firstname');

        auth()->user()->update(['first_name' => $this->firstname]);
        session()->flash('updated', 'firstname');
    }

    public function updatedLastname(): void
    {
        $this->validateOnly('lastname');

        auth()->user()->update(['last_name' => $this->lastname]);
        session()->flash('updated', 'lastname');
    }

    public function updatedNickname(): void
    {
        $this->validateOnly('nickname');

        auth()->user()->update(['nickname' => $this->nickname == '' ? null : $this->nickname]);
        session()->flash('updated', 'nickname');
    }

    public function updatedDisplayName(): void
    {
        $this->validateOnly('display_name');

        auth()->user()->update(['display_name_type' => ($this->display_name == 'Nickname' ? 'nickname' : $this->display_name)]);
        session()->flash('updated', 'display_name');
    }

    public function updatedBirthday(): void
    {
        $this->validateOnly('birthday');

        auth()->user()->update(['birthday' => $this->birthday ? Carbon::parse($this->birthday) : null]);
        session()->flash('updated', 'birthday');
    }

    public function updatedClass(): void
    {
        $this->validateOnly('class');

        auth()->user()->update(['class' => $this->class == '' ? null : $this->class]);
        session()->flash('updated', 'class');
    }

    public function updatedGender(): void
    {
        $this->validateOnly('gender');

        auth()->user()->update(['gender' => $this->gender == 'null' ? null : $this->gender]);
        session()->flash('updated', 'gender');
    }

    public function updatedAbout(): void
    {
        $this->validateOnly('about');

        auth()->user()->update(['about' => $this->about == '' ? null : $this->about]);
        session()->flash('updated', 'about');
    }

    public function updatedProfilePicture(): void
    {
        $this->validateOnly('profile_picture');

        auth()->user()->update(['profile_picture_id' => StorageFile::uploadFile($this->profile_picture, auth()->user())->id]);

        $this->profile_picture = null;
        session()->flash('updated', 'profile_picture');
    }


    public function removeProfilePicture(): void
    {
        auth()->user()->update(['profile_picture_id' => null]);
        $this->emit('showToast', 'Dein Profilbild wurde erfolgreich entfernt!');
    }

    protected function getRules(): array
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'nickname' => 'nullable|string|required_if:display_name,Nickname',
            'display_name' => 'required|string|in:first_name,last_name,full_name,Nickname',
            'birthday' => 'nullable|date_format:d.m.Y',
            'class' => 'nullable|string',
            'gender' => 'nullable|string|in:null,m,f,o',
            'about' => 'nullable|string',
            'profile_picture' => 'required|image|max:1024'
        ];
    }

}
