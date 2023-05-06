<?php

namespace App\Http\Livewire\Member\Contest\Home\Contest;

use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class ForRegistration extends Component
{

    public Contest $contest;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.home.contest.for-registration');
    }

    public function join(): RedirectResponse|Redirector
    {
        $this->contest->users()->attach(auth()->user()->id);
        return redirect()->route('member.contest.contest', $this->contest);
    }

}
