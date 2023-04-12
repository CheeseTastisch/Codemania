<?php

namespace App\Http\Livewire\Admin\Contest\Home;

use App\Concerns\Livewire\WithSort;
use App\Concerns\Livewire\LoadsDataLater;
use App\Models\ContestDay;
use App\Models\ContestDayTheme;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination, WithSort;

    public ContestDay|null $deleteTarget = null;

    public
        $name,
        $date,
        $registration_deadline;

    public function mount(): void
    {
        $this->sortField = 'date';
        $this->sortDirection = 'desc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.home.table', [
            'contests' => ContestDay::orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }

    public function delete(int $id): void
    {
        $this->deleteTarget = ContestDay::find($id);
    }

    public function confirmedDelete(): void
    {
        $this->deleteTarget->deleteAll();
        $this->deleteTarget = null;

        $this->emit('modal', 'hide', '#confirmDelete-contest');
        $this->emit('showToast', 'Du hast den Tag erfolgreich gelöscht.');
    }

    public function create(): void
    {
        $this->validate();

        $theme = ContestDayTheme::default();
        $contestDay = ContestDay::create([
            'name' => $this->name,
            'date' => $this->date,
            'registration_deadline' => $this->registration_deadline,
            'contest_day_theme_id' => $theme->id,
        ]);


        // TODO: Redirect to edit page
    }

    protected function getRules(): array
    {
        return [
            'name' => 'required|string|unique:contest_days,name',
            'date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (ContestDay::where('date', Carbon::parse($value))->exists()) {
                        $fail('Datum ist bereits vergeben.');
                    }
                },
            ],
            'registration_deadline' => 'required|date',
        ];
    }


}
