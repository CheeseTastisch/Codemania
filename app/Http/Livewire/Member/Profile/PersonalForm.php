<?php

namespace App\Http\Livewire\Member\Profile;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use StorageFile;

class PersonalForm extends Component
{

    use WithFileUploads;

    public string $firstname,
        $lastname,
        $nickname,
        $display_name,
        $birthday,
        $class,
        $gender,
        $slogan;

    public $profile_picture;

    protected $rules = [
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'nickname' => 'nullable|string|required_if:display_name,Nickname',
        'display_name' => 'required|string|in:first_name,last_name,full_name,Nickname',
        'birthday' => 'nullable|date',
        'class' => 'nullable|string',
        'gender' => 'nullable|string|in:null,m,f,o',
        'slogan' => 'nullable|string',
        'profile_picture' => 'required|image|max:1024'
    ];

    public function mount()
    {
        $this->firstname = auth()->user()->first_name;
        $this->lastname = auth()->user()->last_name;
        $this->nickname = auth()->user()->nickname ?? '';
        $this->display_name = auth()->user()->display_name_type == 'nickname' ? 'Nickname' : auth()->user()->display_name_type;
        $this->birthday = optional(auth()->user()->birthday)->format('d.m.Y') ?? '';
        $this->class = auth()->user()->class ?? '';
        $this->gender = auth()->user()->gender ?? 'null';
        $this->slogan = auth()->user()->slogan ?? '';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.profile.personal-form');
    }

    public function updatedFirstname() {
        $this->validateOnly('firstname');

        if (auth()->user()->first_name != $this->firstname) {
            auth()->user()->update(['first_name' => $this->firstname]);
            session()->flash('updated', 'firstname');
        }
    }

    public function updatedLastname() {
        $this->validateOnly('lastname');

        if (auth()->user()->last_name != $this->lastname) {
            auth()->user()->update(['last_name' => $this->lastname]);
            session()->flash('updated', 'lastname');
        }
    }

    public function updatedNickname() {
        $this->validateOnly('nickname');

        if (auth()->user()->nickname != $this->nickname) {
            auth()->user()->update(['nickname' => $this->nickname == '' ? null : $this->nickname]);
            session()->flash('updated', 'nickname');
        }
    }

    public function updatedDisplayName() {
        $this->validateOnly('display_name');

        if (auth()->user()->display_name_type != $this->display_name) {
            auth()->user()->update(['display_name_type' => ($this->display_name == 'Nickname' ? 'nickname' : $this->display_name)]);
            session()->flash('updated', 'display_name');
        }
    }

    public function updatedBirthday() {
        $this->validateOnly('birthday');

        if (auth()->user()->birthday != $this->birthday) {
            auth()->user()->update(['birthday' => $this->birthday == '' ? null : $this->birthday]);
            session()->flash('updated', 'birthday');
        }
    }

    public function updatedClass() {
        $this->validateOnly('class');

        if (auth()->user()->class != $this->class) {
            auth()->user()->update(['class' => $this->class == '' ? null : $this->class]);
            session()->flash('updated', 'class');
        }
    }

    public function updatedGender() {
        $this->validateOnly('gender');

        if (auth()->user()->gender != $this->gender) {
            auth()->user()->update(['gender' => $this->gender == 'null' ? null : $this->gender]);
            session()->flash('updated', 'gender');
        }
    }

    public function updatedSlogan() {
        $this->validateOnly('slogan');

        if (auth()->user()->slogan != $this->slogan) {
            auth()->user()->update(['slogan' => $this->slogan == '' ? null : $this->slogan]);
            session()->flash('updated', 'slogan');
        }
    }

    public function uploadProfilePicture() {
        $this->validateOnly('profile_picture');

        $uploadedFile = StorageFile::uploadFile($this->profile_picture, auth()->user());
        auth()->user()->update(['profile_picture_id' => $uploadedFile->id]);

        $this->profile_picture = null;
        $this->emit('showToast', 'Dein Profilbild wurde erfolgreich aktualisiert!');

        $this->profile_picture = null;
    }

    protected function getRules(): array
    {
        return $this->rules;
    }

}
