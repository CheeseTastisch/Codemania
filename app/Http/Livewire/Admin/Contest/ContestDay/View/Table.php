<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\View;

use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\ContestDay;
use App\Models\ContestDayTheme;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination, WithSort, WithSearch;

    public $deleteId = null;

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
        return view('livewire.admin.contest.contest-day.view.table', [
            'contests' => ($this->search != ''
                    ? ContestDay::search($this->search)
                    : ContestDay::query())
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ]);
    }

    public function delete(): void
    {
        ContestDay::find($this->deleteId)->deleteAll();
        $this->deleteId = null;

        $this->emit('modal', 'close', 'confirm-delete');
        $this->emit('showToast', 'Du hast den Tag erfolgreich gelöscht.');
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $theme = ContestDayTheme::default();
        $contestDay = ContestDay::create([
            'name' => $this->name,
            'date' => $this->date,
            'registration_deadline' => $this->registration_deadline,
            'contest_day_theme_id' => $theme->id,
        ]);

        return redirect()->route('admin.contest.contest-day.edit', $contestDay->id);
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
