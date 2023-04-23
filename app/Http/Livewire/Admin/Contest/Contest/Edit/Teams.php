<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Contest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Teams extends Component
{

    use WithPagination, WithSort, WithSearch, ValidatesMultipleInputs;

    public Contest $contest;

    public $blockTeamId = null, $block_reason = null, $unblockTeamId = null;


    public function mount(): void
    {
        $this->sortField = 'name';
        $this->sortDirection = 'asc';
    }
    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest.edit.teams', [
            'teams' => ($this->search ? Team::search($this->search) : Team::query())
                ->where('contest_id', $this->contest->id)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10, ['*'], 'team')
        ]);
    }

    public function unblock(): void
    {
        $this->validateOnly('unblockTeamId');

        $this->contest->teams()->whereId($this->unblockTeamId)->update([
            'is_blocked' => false,
            'block_reason' => null,
            'blocked_by' => null,
        ]);

        $this->emit('showToast', 'Du hast das Team erfolgreich entsperrt.');
        $this->emit('modal', 'close', 'unblockTeam');
    }

    public function block(): void
    {
        $this->validateMultiple(['blockTeamId', 'block_reason']);

        $this->contest->teams()->whereId($this->blockTeamId)->update([
            'is_blocked' => true,
            'block_reason' => $this->block_reason,
            'blocked_by' => auth()->id(),
        ]);

        $this->emit('showToast', 'Du hast das Team erfolgreich gesperrt.');
        $this->emit('modal', 'close', 'blockTeam');
    }

    protected function getRules(): array
    {
        return [
            'blockTeamId' => 'required|integer|exists:teams,id',
            'block_reason' => 'required|string|between:5,1023',
            'unblockTeamId' => 'required|integer|exists:teams,id',
        ];
    }

}
