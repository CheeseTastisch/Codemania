<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Contest;
use App\Models\ContestDay;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Contests extends Component
{

    use WithSearch, WithSort;

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
                ->paginate(10)
        ]);
    }

    public function create(): void
    {
        $this->validate();

        $contest = Contest::create([
            'name' => $this->name,
            'start_time' => Carbon::createFromTimeString($this->start_time)
                ->setDate($this->contestDay->date->year, $this->contestDay->date->month, $this->contestDay->date->day),
            'end_time' => Carbon::createFromTimeString($this->end_time)
                ->setDate($this->contestDay->date->year, $this->contestDay->date->month, $this->contestDay->date->day),
            'contest_day_id' => $this->contestDay->id,
        ]);

        // TODO: Redirect to edit page
    }

    public function delete(): void
    {
        $contest = Contest::find($this->deleteId);
        $contest->deleteAll();

        $this->emit('modal', 'close', 'delete');
        $this->emit('showToast', 'Du hast den Contest erfolgreich gelöscht.');
    }

    protected function getRules(): array
    {
        return [
            'name' => 'required|string',
            'start_time' => 'required|time',
            'end_time' => 'required|time',
        ];
    }

}
