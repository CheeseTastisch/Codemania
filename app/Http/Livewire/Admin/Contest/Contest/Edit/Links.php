<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Edit;

use App\Models\Contest as ContestModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Links extends Component
{

    public ContestModel $contest;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest.edit.links');
    }
}
