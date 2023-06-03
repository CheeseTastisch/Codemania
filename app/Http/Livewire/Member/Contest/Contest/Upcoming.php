<?php

namespace App\Http\Livewire\Member\Contest\Contest;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Models\Contest;
use App\Models\Team;
use App\Models\User;
use App\Notifications\Team\Invited;
use App\Notifications\Team\Leave\Admin;
use App\Notifications\Team\Leave\Member;
use Carbon\Carbon;
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

    use WithFileUploads, ValidatesMultipleInputs;

    public Contest $contest;

    public ?Team $team;
    public bool $isAdmin;

    public int $days, $hours, $minutes, $seconds;

    public $name, $logo;

    public $email;

    public $remove_member_id = null,
        $upgrade_member_id = null, $downgrade_member_id = null;

    public function mount(): void
    {
        $diff = $this->contest->start_time->diff(now());

        $this->days = $diff->days;
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

    public function leaveContest(): RedirectResponse|Redirector|null
    {
        if ($this->contest->contestDay->registration_deadline?->isPast()) {
            $this->emit('showToast', [
                'text' => 'Du kannst den Contest nicht mehr verlassen.',
                'type' => 'danger'
            ]);
            return null;
        }

        if (isset($team)) {
            $this->team->users()->detach(auth()->user());

            if ($this->team->users->wherePivot('role', '!=', 'invited')->count()) $this->team->delete();
            else if ($this->team->users()->wherePivot('role', 'admin')->count() === 0) {
                    $newAdmin = $this->team->users->first();
                    $this->team->users()->updateExistingPivot($newAdmin, ['role' => 'admin']);

                    $newAdmin->notify(new Admin(auth()->user(), $this->team));
                    $this->team->users()->wherePivot('role', 'member')
                        ->each(fn($member) => $member->notify(new Member(auth()->user(), $this->team, $newAdmin)));
            }
        }

        $this->contest->users()->detach(auth()->user());

        return redirect()->route('member.contest.home');
    }

    public function createTeam(): void
    {
        $this->validateMultiple(['name', 'logo']);

        $this->team = $this->contest->teams()->create([
            'name' => $this->name,
            'logo_file_id' => StorageFile::uploadFile($this->logo)?->id
        ]);

        $this->team->users()->attach(auth()->user(), ['role' => 'admin']);

        $this->logo = null;
        $this->isAdmin = true;

        $this->emit('showToast', 'Du hast erfolgreich ein Team erstellt.');
    }

    public function updatedName(): void
    {
        if ($this->contest->contestDay->registration_deadline?->isPast()) {
            $this->emit('showToast', [
                'text' => 'Du kannst den Namen des Teams nicht mehr ändern.',
                'type' => 'danger'
            ]);
            return;
        }

        if (!isset($this->team)) return;

        if ($this->team->users()->whereId(auth()->user()->id)->first()?->pivot?->role !== 'admin') return;

        $this->validateOnly('name');

        $this->team->update(['name' => $this->name]);

        session()->flash('updated', 'name');
    }

    public function updatedLogo(): void
    {
        if (!isset($this->team)) return;

        if ($this->team->users()->whereId(auth()->user()->id)->first()?->pivot?->role !== 'admin') return;

        $this->validateOnly('logo');

        $this->team->update(['logo_file_id' => StorageFile::uploadFile($this->logo)?->id]);
        $this->logo = null;

        session()->flash('updated', 'logo');
    }

    public function removeLogo(): void
    {
        if (!isset($this->team)) return;

        $this->team->update(['logo' => null]);

        $this->emit('showToast', 'Das Logo wurde erfolgreich entfernt.');
    }

    public function invite(): void
    {
        if ($this->contest->contestDay->registration_deadline?->isPast()) {
            $this->emit('showToast', [
                'text' => 'Du kannst keine Benutzer mehr einladen.',
                'type' => 'danger'
            ]);
            return;
        }

        if (!isset($this->team)) return;

        if ($this->team->users()->whereId(auth()->user()->id)->first()?->pivot?->role !== 'admin') return;

        $this->validateOnly('email');

        $user = User::whereEmail($this->email)->first();

        if ($user === null) {
            $this->addError('email', 'Der Benutzer konnte nicht gefunden werden.');
            return;
        }

        $pivot = $this->team->users()->whereId($user->id)->first()?->pivot;
        if ($pivot?->role === 'invited' && Carbon::parse($pivot?->invited_at)->addDay()->isFuture()) {
            $this->addError('email', 'Der Benutzer wurde bereits eingeladen.');
            return;
        }

        if ($pivot?->role === 'member' || $pivot?->role === 'admin') {
            $this->addError('email', 'Der Benutzer ist bereits Mitglied.');
            return;
        }

        if ($pivot === null) $this->team->users()->attach($user, ['role' => 'invited', 'invited_at' => now()]);
        else $this->team->users()->updateExistingPivot($user, ['role' => 'invited', 'invited_at' => now()]);

        $user->notify(new Invited($this->team));

        $this->email = null;

        $this->emit('modal', 'close', 'inviteModal');
        $this->emit('showToast', 'Der Benutzer wurde erfolgreich eingeladen.');
    }

    public function removeMember(): void
    {
        if ($this->contest->contestDay->registration_deadline?->isPast()) {
            $this->emit('showToast', [
                'text' => 'Du kannst keine Benutzer mehr entfernen.',
                'type' => 'danger'
            ]);
            return;
        }

        $this->validateOnly('remove_member_id');

        $this->team->users()->detach($this->remove_member_id);

        $this->emit('showToast', 'Du hast den Benutzer erfolgreich entfernt.');
        $this->emit('modal', 'close', 'removeMember');
    }

    public function upgradeMember(): void
    {
        if ($this->contest->contestDay->registration_deadline?->isPast()) {
            $this->emit('showToast', [
                'text' => 'Du kannst keine Benutzer mehr zum Admin ernennen.',
                'type' => 'danger'
            ]);
            return;
        }

        $this->validateOnly('upgrade_member_id');

        $this->team->users()->updateExistingPivot($this->upgrade_member_id, [
            'role' => 'admin',
        ]);

        $this->emit('showToast', 'Du hast den Benutzer erfolgreich zum Admin ernannt.');
        $this->emit('modal', 'close', 'upgradeMember');
    }

    public function downgradeMember(): void
    {
        if ($this->contest->contestDay->registration_deadline?->isPast()) {
            $this->emit('showToast', [
                'text' => 'Du kannst keine Admins mehr zu Mitgliedern herabstufen.',
                'type' => 'danger'
            ]);
            return;
        }

        $this->validateOnly('downgrade_member_id');

        $this->team->users()->updateExistingPivot($this->downgrade_member_id, [
            'role' => 'member',
        ]);

        $this->emit('showToast', 'Du hast den Benutzer erfolgreich zum Mitglied herabgestuft.');
        $this->emit('modal', 'close', 'downgradeMember');
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
            'email' => 'required|email',
            'remove_member_id' => 'required|exists:users,id',
            'upgrade_member_id' => 'required|exists:users,id',
            'downgrade_member_id' => 'required|exists:users,id',
        ];
    }

}
