<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Contest;
use App\Models\ContestDay;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithPagination;

class Contests extends Component
{

    use WithPagination, WithSearch, WithSort, ValidatesMultipleInputs;

    public ContestDay $contestDay;

    public $deleteId = null;

    public $name, $start_time, $end_time;

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
                ->paginate(5, ['*'], 'contest'),
        ]);
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validateMultiple(['name', 'start_time', 'end_time']);

        $contest = $this->contestDay->contests()->create([
            'name' => $this->name,
            'start_time' => Carbon::createFromTimeString($this->start_time)->setDateFrom($this->contestDay->date),
            'end_time' => Carbon::createFromTimeString($this->end_time)->setDateFrom($this->contestDay->date),
        ]);

        return redirect()->route('admin.contest.contest.edit', $contest);
    }

    public function delete(): void
    {
        $this->validateOnly('deleteId');

        $this->contestDay->contests()->where('id', $this->deleteId)->delete();

        $this->emit('modal', 'close', 'deleteContest');
        $this->emit('showToast', 'Du hast den Contest erfolgreich gelöscht.');
    }

    protected function getRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('contests', 'name')->where('contest_day_id', $this->contestDay->id),
            ],
            'start_time' => 'required|time',
            'end_time' => 'required|time',
            'deleteId' => 'required|exists:contests,id',
        ];
    }

}
