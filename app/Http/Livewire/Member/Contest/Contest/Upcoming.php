<?php

namespace App\Http\Livewire\Member\Contest\Contest;

use App\Models\Contest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithFileUploads;
use StorageFile;

class Upcoming extends Component
{

    use WithFileUploads;

    public Contest $contest;

    public ?Team $team;
    public bool $isAdmin;

    public int $days, $hours, $minutes, $seconds;

    public $name, $logo;

    public function mount(): void
    {
        $diff = $this->contest->start_time->diff(now());

        $this->days = $diff->d;
        $this->hours = $diff->h;
        $this->minutes = $diff->i;
        $this->seconds = $diff->s;

        $this->team = auth()->user()->getTeamForContest($this->contest);
        $this->isAdmin = $this->team?->pivot?->role === 'admin';

        $this->name = $this->team?->name;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.upcoming');
    }

    public function leaveContest(): RedirectResponse|Redirector
    {
        $this->team?->users()?->detach(auth()->user());

        if ($this->team?->users->count()) $this->team->delete();
        else if ($this->team?->users()?->wherePivot('role', 'admin')?->count() === 0) {
            $newAdmin = $this->team?->users->first();

            $this->team?->users()?->updateExistingPivot($newAdmin, ['role' => 'admin']);

            // TODO: Send email to new admin and team
        }

        $this->contest->users()->detach(auth()->user());

        return redirect()->route('member.contest.home');
    }

    public function createTeam(): void
    {
        $this->validate();

        $this->team = $this->contest->teams()->create([
            'name' => $this->name,
            'logo_file_id' => StorageFile::uploadFile($this->logo)?->id
        ]);

        $this->team->users()->attach(auth()->user(), ['role' => 'admin']);

        $this->logo = null;

        $this->emit('showToast', 'Du hast erfolgreich ein Team erstellt.');
    }

    public function updatedName(): void
    {
        if ($this->team === null) return;

        if ($this->team->users()->whereId(auth()->user()->id)->first()?->pivot?->role !== 'admin') return;

        $this->validateOnly('name');

        $this->team->update(['name' => $this->name]);

        session()->flash('updated', 'name');
    }

    public function updatedLogo(): void
    {
        if ($this->team === null) return;

        if ($this->team->users()->whereId(auth()->user()->id)->first()?->pivot?->role !== 'admin') return;

        $this->validateOnly('logo');

        $this->team->update(['logo_file_id' => StorageFile::uploadFile($this->logo)?->id]);
        $this->logo = null;

        session()->flash('updated', 'logo');
    }

    public function removeLogo(): void
    {
        if ($this->team === null) return;

        $this->team->update(['logo' => null]);

        $this->emit('showToast', 'Das Logo wurde erfolgreich entfernt.');
    }

    protected function getRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('teams', 'name')->where('contest_id', $this->contest->id)
            ],
            'logo' => 'nullable|image|max:1024',
        ];
    }

}
