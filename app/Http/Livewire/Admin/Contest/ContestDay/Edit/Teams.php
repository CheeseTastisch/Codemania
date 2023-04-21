<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\ContestDay;
use App\Models\ContestDayTheme;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Teams extends Component
{

    use WithPagination, WithSort, WithSearch;

    public ContestDay $contestDay;

    public $blockTeamId = null,
        $block_reason = null,
        $unblockTeamId = null;

    public function mount(): void
    {
        $this->sortField = 'name';
        $this->sortDirection = 'asc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest-day.edit.teams', [
            'teams' => ($this->search ? Team::search($this->search) : Team::query())
                ->where('contest_day_id', $this->contestDay->id)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10, ['*'], 'teams')
        ]);
    }

    public function unblock(): void
    {
        $team = Team::whereId($this->unblockTeamId)->first();
        $team->update([
            'is_blocked' => false,
            'block_reason' => null,
            'blocked_by' => null,
        ]);

        $this->emit('showToast', 'Du hast das Team erfolgreich entsperrt.');
        $this->emit('modal', 'close', 'unblock');
    }

    public function block(): void
    {
        $this->validate();

        $team = Team::whereId($this->blockTeamId)->first();

        $team->update([
            'is_blocked' => true,
            'block_reason' => $this->block_reason,
            'blocked_by' => auth()->user()->id,
        ]);

        $this->emit('showToast', 'Du hast das Team erfolgreich gesperrt.');
        $this->emit('modal', 'close', 'block');
    }

    protected function getRules(): array
    {
        return [
            'block_reason' => 'required|string|between:5,511',
        ];
    }

}
