<?php

namespace App\Http\Livewire\Member\Contest\Contest;

use App\Models\Contest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class Upcoming extends Component
{

    public Contest $contest;

    public ?Team $team;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->team = auth()->user()->getTeamForContest($this->contest);
        return view('livewire.member.contest.contest.upcoming');
    }

    public function leaveContest(): RedirectResponse|Redirector
    {
        if (!isset($this->team)) $this->team = auth()->user()->getTeamForContest($this->contest);

        $this->team?->users()?->detach(auth()->user());
        $this->contest->users()->detach(auth()->user());

        if ($this->team?->users()?->count() === 0) $this->team->delete();
        else if ($this->team?->users()->wherePivot('role', 'admin')->count() === 0) {
            $this->team?->users()->first()?->pivot->update(['role' => 'admin']);

            // TODO: Send e-mail to team members
        }

        return redirect()->route('member.contest.home');
    }

}
