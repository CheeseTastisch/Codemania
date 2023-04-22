<?php

namespace App\Http\Livewire\Admin\Contest\Task\Edit;

use App\Models\Task;
use Illuminate\Validation\Rule;
use Livewire\Component;

class General extends Component
{

    public Task $task;

    public $name;

    public function mount(): void
    {
        $this->name = $this->task->name;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.task.edit.general');
    }

    public function updatedName(): void
    {
        $this->validate();

        $this->task->update(['name' => trim($this->name)]);
        session()->flash('updated', 'name');
    }

    public function getRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('tasks', 'name')->ignore($this->task->id)->where('contest_id', $this->task->contest_id)
            ]
        ];
    }

}
