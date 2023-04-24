<?php

namespace App\Http\Livewire\Public\Canvas;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest;
use App\Models\ContestDay;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Loader extends Component
{

    use LoadsDataLater;

    public ContestDay $contestDay;

    public int|null $viewId = null;
    public string $viewName;
    public Contest|null $for = null;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.canvas.loader');
    }

    public function dataLoaded(): void
    {
        $this->next();
    }

    public function next() {
        $contests = $this->contestDay->contests;

        $targetContests = $contests->filter(fn(Contest $contest) =>
            $contest->start_time->isFuture() && $contest->start_time->diffInMinutes(now()) <= 5
            || $contest->end_time->isFuture() && $contest->end_time->diffInMinutes(now()) <= 5);
        if ($targetContests->isNotEmpty()) {
            $this->setNextContest($targetContests);
            $this->viewId = $this->for->start_time->isFuture() ? 1 : 2;

            return;
        }

        if ($this->viewId === 1 || $this->viewId === 2 || $this->viewId === null) {
            $this->viewId = 3;
            $this->for = null;
            return;
        }

        if ($this->viewId === 3) {
            $targetContests = $contests->filter(fn(Contest $contest) =>
                $contest->start_time->isFuture() && $contest->start_time->diffInMinutes(now()) <= 60 ||
                $contest->start_time->isPast() && $contest->end_time->isFuture() ||
                $contest->end_time->isPast() && $contest->end_time->diffInMinutes(now()) <= 60);

            if ($targetContests->isEmpty()) return;
        }

        if ($this->viewId === 3 || $this->viewId === 4) {
            $targetContests = $contests->filter(fn(Contest $contest) => $contest->start_time->isFuture() && $contest->start_time->diffInMinutes(now()) <= 60);
            $this->setNextContestOrNull($targetContests);

            if ($this->for === null) $this->viewId = 5;
            else {
                $this->viewId = 4;
                return;
            }
        }

        if ($this->viewId === 5) {
            $targetContests = $contests->filter(fn(Contest $contest) => $contest->start_time->isPast() && $contest->end_time->isFuture());
            $this->setNextContestOrNull($targetContests);

            if ($this->for === null) $this->viewId = 6;
            else {
                $this->viewId = 5;
                return;
            }
        }

        if ($this->viewId === 6) {
            $targetContests = $contests->filter(fn(Contest $contest) => $contest->start_time->isPast() && $contest->end_time->isFuture());
            $this->setNextContestOrNull($targetContests);

            if ($this->for === null) $this->viewId = 7;
            else {
                $this->viewId = 6;
                return;
            }
        }

        if ($this->viewId === 7) {
            $targetContests = $contests->filter(fn(Contest $contest) => $contest->end_time->isPast() && $contest->end_time->diffInMinutes(now()) <= 60);
            $this->setNextContestOrNull($targetContests);

            if ($this->for === null) $this->viewId = 3;
            else $this->viewId = 7;
        }
    }

    private function setNextContest($contests) {
        if ($this->for === null) $this->for = $contests->first();
        else {
            $nextContest = $contests->sortBy('id')->firstWhere('id', '>', $this->for->id);

            if ($nextContest === null) $this->for = $contests->first();
            else $this->for = $nextContest;
        }
    }

    private function setNextContestOrNull($contests) {
        if($contests->isEmpty()) {
            $this->for = null;
            return;
        }

        if ($this->for === null) $this->for = $contests->first();
        else {
            $nextContest = $contests->sortBy('id')->firstWhere('id', '>', $this->for->id);

            if ($nextContest === null) $this->for = null;
            else $this->for = $nextContest;
        }
    }


}
