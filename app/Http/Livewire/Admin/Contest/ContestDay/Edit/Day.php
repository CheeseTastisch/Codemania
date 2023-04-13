<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Models\ContestDay;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day extends Component
{

    public ContestDay $contestDay;

    public $name,
        $date,
        $registration_deadline,
        $allow_training_from,
        $current;

    public function mount(): void
    {
        $this->name = $this->contestDay->name;
        $this->date = $this->contestDay->date->format('d.m.Y');
        $this->registration_deadline = $this->contestDay->registration_deadline->format('d.m.Y');
        $this->allow_training_from = $this->contestDay->allow_training_from->format('d.m.Y');
        $this->current = $this->contestDay->current;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest-day.edit.day');
    }

    public function updatedName(): void
    {
        $this->validateOnly('name');

        $this->name = trim($this->name);

        if (ContestDay::whereName($this->name)->where('id', '!=', $this->contestDay->id)->exists()) {
            $this->addError('name', 'Name ist bereits vergeben.');
            return;
        }

        $this->contestDay->update(['name' => $this->name]);
        session()->flash('updated', 'name');
    }

    public function updatedDate(): void
    {
        $this->validateOnly('date');

        if (ContestDay::whereDate('date', Carbon::parse($this->date))->where('id', '!=', $this->contestDay->id)->exists()) {
            $this->addError('date', 'Datum ist bereits vergeben.');
            return;
        }

        $this->contestDay->update(['date' => $this->date]);
        session()->flash('updated', 'date');
    }

    public function updatedRegistrationDeadline(): void
    {
        $this->validateOnly('registration_deadline');

        $this->contestDay->update(['registration_deadline' => $this->registration_deadline]);
        session()->flash('updated', 'registration_deadline');
    }

    public function updatedAllowTrainingFrom(): void
    {
        $this->validateOnly('allow_training_from');

        $this->contestDay->update(['allow_training_from' => $this->allow_training_from]);
        session()->flash('updated', 'allow_training_from');
    }

    public function updatedCurrent(): void
    {
        $this->validateOnly('current');

        ContestDay::whereCurrent(true)->update(['current' => false]);

        $this->contestDay->update(['current' => $this->current]);
        session()->flash('updated', 'current');
    }

    protected function getRules(): array
    {
        return [
            'name' => 'required|string',
            'date' => 'required|date',
            'registration_deadline' => 'required|date',
            'allow_training_from' => 'required|date',
            'current' => 'required|boolean',
        ];
    }

}
