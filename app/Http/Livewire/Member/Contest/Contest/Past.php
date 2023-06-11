<?php

namespace App\Http\Livewire\Member\Contest\Contest;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest;
use App\Models\LevelSubmission;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Past extends Component
{

    use LoadsDataLater;

    public Contest $contest;

    public $points, $place, $resolutionTime,
        $submissions, $accepted, $rejected, $ratedLater, $submittedFiles, $solvedTasks;

    public $totalPoints, $participants, $totalResolutionTime,
        $totalSubmissions, $totalAccepted, $totalRejected, $totalRatedLater, $totalSubmittedFiles, $totalSolvedTasks,
        $teams;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.past');
    }

    protected function dataLoaded(): void
    {
        /**
         * @var Team $team
         */
        $team = auth()->user()->getTeamForContest($this->contest);
        if (!$team) return;

        $this->points = $team->getPoints();
        $this->place = $team->getPlace();
        $this->resolutionTime = $team->getHumanFriendlyResolutionTime();
        $this->submissions = $team->levelSubmissions->count();
        $this->accepted = $team->levelSubmissions->where('status', 'accepted')->count();
        $this->rejected = $team->levelSubmissions->where('status', 'rejected')->count();
        $this->ratedLater = $team->levelSubmissions->filter(fn (LevelSubmission $levelSubmission) => !$levelSubmission->level->instantly_rated)->count();
        $this->submittedFiles = $team->levelSubmissions->map(fn (LevelSubmission $levelSubmission) => $levelSubmission->levelFileSubmissions->count() + 1)->sum();
        $this->solvedTasks = $this->contest->tasks
            ->filter(fn ($task) => $task->levels
                ->every(fn ($level) => $team->levelSubmissions
                        ->where('level_id', $level->id)
                        ->where('status', 'accepted')
                        ->count() > 0))
            ->count();

        $this->totalPoints = $this->contest->teams->map(fn (Team $team) => $team->getPoints())->sum();
        $this->participants = $this->contest->users->count();
        $this->totalResolutionTime = human_friendly_seconds($this->contest->teams->map(fn (Team $team) => $team->getTotalResolutionTime())->sum());
        $this->totalSubmissions = $this->contest->teams->map(fn (Team $team) => $team->levelSubmissions->count())->sum();
        $this->totalAccepted = $this->contest->teams->map(fn (Team $team) => $team->levelSubmissions->where('status', 'accepted')->count())->sum();
        $this->totalRejected = $this->contest->teams->map(fn (Team $team) => $team->levelSubmissions->where('status', 'rejected')->count())->sum();
        $this->totalRatedLater = $this->contest->teams->map(fn (Team $team) => $team->levelSubmissions->filter(fn (LevelSubmission $levelSubmission) => !$levelSubmission->level->instantly_rated)->count())->sum();
        $this->totalSubmittedFiles = $this->contest->teams->map(fn (Team $team) => $team->levelSubmissions->map(fn (LevelSubmission $levelSubmission) => $levelSubmission->levelFileSubmissions->count() + 1)->sum())->sum();
        $this->totalSolvedTasks = $this->contest->teams->map(fn (Team $team) => $this->contest->tasks
                ->filter(fn ($task) => $task->levels
                    ->every(fn ($level) => $team->levelSubmissions
                            ->where('level_id', $level->id)
                            ->where('status', 'accepted')
                            ->count() > 0))
                ->count())->sum();
        $this->teams = $this->contest->teams->count();
    }

}
