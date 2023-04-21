<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Contest;
use App\Models\ContestDay;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\WithPagination;

class Contests extends Component
{

    use WithPagination, WithSearch, WithSort;

    public ContestDay $contestDay;

    public $deleteId = null;

    public $name,
        $start_time,
        $end_time;

    public function mount(): void
    {
        $this->sortField = 'name';
        $this->sortDirection = 'asc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest-day.edit.contests', [
            'contests' => ($this->search ? Contest::search($this->search) : Contest::query())
                ->where('contest_day_id', $this->contestDay->id)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(5, ['*'], 'contests'),
        ]);
    }

    public function create(): RedirectResponse
    {
        $this->validate();

        $contest = Contest::create([
            'name' => $this->name,
            'start_time' => Carbon::createFromTimeString($this->start_time)->setDateFrom($this->contestDay->date),
            'end_time' => Carbon::createFromTimeString($this->end_time)->setDateFrom($this->contestDay->date),
            'contest_day_id' => $this->contestDay->id,
        ]);

        return redirect()->route('admin.contest.contest.edit', $contest);
    }

    public function delete(): void
    {
        $this->validate([
            'deleteId' => 'required|integer',
        ]);

        $contest = Contest::find($this->deleteId);
        $contest->deleteAll();

        $this->emit('modal', 'close', 'deleteContest');
        $this->emit('showToast', 'Du hast den Contest erfolgreich gelöscht.');
    }

    protected function getRules(): array
    {
        return [
            'name' => 'required|string|between:3,255',
            'start_time' => 'required|time',
            'end_time' => 'required|time',
        ];
    }

}
