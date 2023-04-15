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

    public Contest|null $deleteContest;

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

    public function delete(int $id): void
    {
        $this->deleteContest = Contest::findOrFail($id);
    }

    public function deleteContest(): void
    {
        $this->deleteContest->delete();
        $this->deleteContest = null;

        $this->emit('showToast', 'Du hast den Contest erfolgreich gelöscht');
        $this->emit('modal', 'hide', '#confirmDelete-contest');
    }

    public function createContest(): void
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

    protected function getRules(): array
    {
        return [
            'name' => 'required|string',
            'start_time' => 'required|time',
            'end_time' => 'required|time',
        ];
    }

}
