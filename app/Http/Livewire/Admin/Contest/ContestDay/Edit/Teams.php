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

class Teams extends Component
{

    use WithSort, WithSearch;

    public ContestDay $contestDay;

    public Team $unblockTeam;
    public Team $blockTeam;

    public $block_reason;

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
                ->paginate(10)
        ]);
    }

    public function unblockTeam(int $id): void
    {
        $this->unblockTeam = Team::whereId($id)->first();
    }

    public function confirmUnblock(): void
    {
        $this->unblockTeam->update([
            'is_blocked' => false,
            'block_reason' => null,
            'blocked_by' => null,
        ]);

        $this->emit('showToast', 'Du hast das Team erfolgreich entsperrt.');
        $this->emit('modal', 'hide', '#confirmUnblock');
    }

    public function blockTeam(int $id): void
    {
        $this->blockTeam = Team::whereId($id)->first();
    }

    public function block(): void
    {
        $this->validate();

        $this->blockTeam->update([
            'is_blocked' => true,
            'block_reason' => $this->block_reason,
            'blocked_by' => auth()->user()->id,
        ]);

        $this->emit('showToast', 'Du hast das Team erfolgreich gesperrt.');
        $this->emit('modal', 'hide', '#blockTeam');
    }

    protected function getRules(): array
    {
        return [
            'block_reason' => 'required|string',
        ];
    }

}
