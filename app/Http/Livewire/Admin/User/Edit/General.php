<?php

namespace App\Http\Livewire\Admin\User\Edit;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class General extends Component
{

    use WithFileUploads;

    public User $user;

    public $theme,
        $email,
        $firstname,
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
        $this->theme = $this->user->theme;
        $this->email = $this->user->email;
        $this->firstname = $this->user->first_name;
        $this->lastname = $this->user->last_name;
        $this->nickname = $this->user->nickname ?? '';
        $this->display_name = $this->user->display_name_type == 'nickname' ? 'Nickname' : $this->user->display_name_type;
        $this->birthday = optional($this->user->birthday)->format('d.m.Y');
        $this->class = $this->user->class ?? '';
        $this->gender = $this->user->gender ?? 'null';
        $this->about = $this->user->about ?? '';
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.user.edit.general');
    }

    public function updatedTheme(): void
    {
        $this->validateOnly('theme');

        $this->user->update(['theme' => $this->theme]);
        session()->flash('updated', 'theme');
    }

    public function updatedEmail(): void
    {
        $this->validateOnly('email');

        $this->user->update(['email' => $this->email]);
        session()->flash('updated', 'email');
        $this->emit('showToast', 'Da du deine E-Mail Adresse geändert hast, muss du diese neu bestätigen.', 2500, false, 'warning');
    }


    public function updatedFirstname(): void
    {
        $this->validateOnly('firstname');

        $this->user->update(['first_name' => $this->firstname]);
        session()->flash('updated', 'firstname');
    }

    public function updatedLastname(): void
    {
        $this->validateOnly('lastname');

        $this->user->update(['last_name' => $this->lastname]);
        session()->flash('updated', 'lastname');
    }

    public function updatedNickname(): void
    {
        $this->validateOnly('nickname');

        $this->user->update(['nickname' => $this->nickname == '' ? null : $this->nickname]);
        session()->flash('updated', 'nickname');
    }

    public function updatedDisplayName(): void
    {
        $this->validateOnly('display_name');

        $this->user->update(['display_name_type' => ($this->display_name == 'Nickname' ? 'nickname' : $this->display_name)]);
        session()->flash('updated', 'display_name');
    }

    public function updatedBirthday(): void
    {
        $this->validateOnly('birthday');

        $this->user->update(['birthday' => $this->birthday ? Carbon::parse($this->birthday) : null]);
        session()->flash('updated', 'birthday');
    }

    public function updatedClass(): void
    {
        $this->validateOnly('class');

        $this->user->update(['class' => $this->class == '' ? null : $this->class]);
        session()->flash('updated', 'class');
    }

    public function updatedGender(): void
    {
        $this->validateOnly('gender');

        $this->user->update(['gender' => $this->gender == 'null' ? null : $this->gender]);
        session()->flash('updated', 'gender');
    }

    public function updatedAbout(): void
    {
        $this->validateOnly('about');

        $this->user->update(['about' => $this->about == '' ? null : $this->about]);
        session()->flash('updated', 'about');
    }

    public function updatedProfilePicture(): void
    {
        $this->validateOnly('profile_picture');

        $this->user->update(['profile_picture_id' => StorageFile::uploadFile($this->profile_picture, $this->user)->id]);

        $this->profile_picture = null;
        session()->flash('updated', 'profile_picture');
    }


    public function removeProfilePicture(): void
    {
        $this->user->update(['profile_picture_id' => null]);
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
