<?php

namespace App\Console\Commands;

use App\Models\ContestDayTheme;
use Illuminate\Console\Command;

class GenerateThemes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'themes:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all images for all themes.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        ContestDayTheme::all()->each(fn (ContestDayTheme $theme) => $theme->generateImages());
    }
}
