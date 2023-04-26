<?php

namespace App\Http\Livewire\Admin\Contest\Team\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Members extends Component
{

    use WithPagination, WithSearch, ValidatesMultipleInputs;

    public Team $team;

    public $remove_member_id = null,
        $add_member_id = null, $role = 'member',
        $upgrade_member_id = null, $downgrade_member_id = null;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.team.edit.members', [
            'members' => ($this->search ? User::search($this->search) : User::query())
                ->whereHas('teams', function ($query) {
                    $query->where('team_id', $this->team->id);
                })
                ->paginate(10, ['*'], 'member'),
            'others' => ($this->search ? User::search($this->search) : User::query())
                ->whereDoesntHave('teams', function ($query) {
                    $query->where('team_id', $this->team->id);
                })
                ->paginate(10, ['*'], 'other'),
        ]);
    }

    public function addMember(): void
    {
        $this->validateMultiple(['add_member_id', 'role']);

        $user = User::whereId($this->add_member_id)->first();

        $currentTeam = $user->getTeamForContest($this->team->contest);

        $currentTeam?->users()?->detach($user);
        $this->team->users()->attach($this->add_member_id, [
            'role' => $this->role,
        ]);

        $this->emit('showToast', 'Du hast den Benutzer erfolgreich hinzugefügt.');
        $this->emit('modal', 'close', 'addMember');
    }

    public function removeMember(): void
    {
        $this->validateOnly('remove_member_id');

        $this->team->users()->detach($this->remove_member_id);

        $this->emit('showToast', 'Du hast den Benutzer erfolgreich entfernt.');
        $this->emit('modal', 'close', 'removeMember');
    }

    public function upgradeMember(): void
    {
        $this->validateOnly('upgrade_member_id');

        $this->team->users()->updateExistingPivot($this->upgrade_member_id, [
            'role' => 'admin',
        ]);

        $this->emit('showToast', 'Du hast den Benutzer erfolgreich zum Admin ernannt.');
        $this->emit('modal', 'close', 'upgradeMember');
    }

    public function downgradeMember(): void
    {
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
            'add_member_id' => 'required|exists:users,id',
            'remove_member_id' => 'required|exists:users,id',
            'role' => 'required|in:admin,member',
            'upgrade_member_id' => 'required|exists:users,id',
            'downgrade_member_id' => 'required|exists:users,id',
        ];
    }

}
