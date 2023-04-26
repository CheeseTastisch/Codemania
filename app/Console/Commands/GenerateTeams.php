<?php

namespace App\Console\Commands;

use App\Models\Contest;
use App\Models\ContestDay;
use Illuminate\Console\Command;

class GenerateTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'teams:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate teams for all contests that are in the current running day and have there registration deadline today.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $current = ContestDay::whereCurrent(true)->first();
        if ($current === null) {
            $this->error('No current contest day found.');
            return;
        }

        if (!$current->registration_deadline->isToday()) {
            $this->info('Registration deadline is not today.');
            return;
        }

        $current->contests->each(fn (Contest $contest) => $contest->generateTeams());
        $this->info('Teams generated.');
    }
}
