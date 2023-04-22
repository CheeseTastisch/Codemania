<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Edit;

use App\Models\Contest;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class General extends Component
{

    public Contest $contest;

    public $name, $start_time, $end_time, $wrong_solution_penalty, $freeze_leaderboard_at, $leaderboard_unfrozen;


    public function mount(): void
    {
        $this->name = $this->contest->name;
        $this->start_time = $this->contest->start_time->format('H:i');
        $this->end_time = $this->contest->end_time->format('H:i');
        $this->wrong_solution_penalty = $this->contest->wrong_solution_penalty;
        $this->freeze_leaderboard_at = optional($this->contest->freeze_leaderboard_at)->format('H:i');
        $this->leaderboard_unfrozen = $this->contest->leaderboard_unfrozen;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest.edit.general');
    }

    public function updatedName(): void
    {
        $this->validateOnly('name');

        $this->name = trim($this->name);

        $this->contest->update(['name' => $this->name]);
        session()->flash('updated', 'name');
    }

    public function updatedStartTime(): void
    {
        $this->validateOnly('start_time');

        $this->contest->update(['start_time' => Carbon::createFromTimeString($this->start_time)->setDateFrom($this->contest->contestDay->date)]);
        session()->flash('updated', 'start_time');
    }

    public function updatedEndTime(): void
    {
        $this->validateOnly('end_time');

        $this->contest->update(['end_time' => Carbon::createFromTimeString($this->end_time)->setDateFrom($this->contest->contestDay->date)]);
        session()->flash('updated', 'end_time');
    }

    public function updatedWrongSolutionPenalty(): void
    {
        $this->validateOnly('wrong_solution_penalty');

        $this->contest->update(['wrong_solution_penalty' => $this->wrong_solution_penalty]);
        session()->flash('updated', 'wrong_solution_penalty');
    }

    public function updatedFreezeLeaderboardAt(): void
    {
        $this->validateOnly('freeze_leaderboard_at');

        $this->contest->update(['freeze_leaderboard_at' => Carbon::createFromTimeString($this->freeze_leaderboard_at)->setDateFrom($this->contest->contestDay->date)]);
        session()->flash('updated', 'freeze_leaderboard_at');
    }

    public function updatedLeaderboardUnfrozen(): void
    {
        $this->validateOnly('leaderboard_unfrozen');

        $this->contest->update(['leaderboard_unfrozen' => $this->leaderboard_unfrozen]);
        session()->flash('updated', 'leaderboard_unfrozen');
    }

    public function getRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('contests', 'name')
                    ->ignore($this->contest->id)
                    ->where('contest_day_id', $this->contest->contest_day_id)
            ],
            'start_time' => 'required|time',
            'end_time' => 'required|time',
            'wrong_solution_penalty' => 'required|integer|min:0|max:30',
            'freeze_leaderboard_at' => 'required|time',
            'leaderboard_unfrozen' => 'required|boolean',
        ];
    }

}
