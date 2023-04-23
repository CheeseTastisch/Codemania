<?php

namespace App\Listeners\Team;

use App\Models\ContestDay;
use App\Models\Team;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTrainingTeam
{
    public function handle(Registered $event): void
    {
        $trainingTeam = Team::create([
            'name' => "training-{$event->user->id}",
            'contest_id' => ContestDay::whereTrainingOnly(true)->first()->contests()->first()->id
        ]);

        $event->user->teams()->attach($trainingTeam, ['role' => 'member']);
    }
}
