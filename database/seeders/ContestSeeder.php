<?php

namespace Database\Seeders;

use App\Helper\Color\Color;
use App\Models\Contest;
use App\Models\ContestDay;
use App\Models\ContestDayTheme;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $training = ContestDay::create([
            'date' => Carbon::create(),
            'registration_deadline' => Carbon::create(2000),
            'name' => 'Training',
            'allow_training_from' => Carbon::create(2000),
            'training_only' => true,
            'current' => false,
        ]);

        $trainingTheme = ContestDayTheme::default($training->id);
        $trainingTheme->generatePalette(Color::parseRgb('255 36 44'));

        Contest::create([
            'name' => 'Training',
            'contest_day_id' => $training->id,
            'start_time' => Carbon::create(2000),
            'end_time' => Carbon::create(2000),
            'wrong_solution_penalty' => 0,
            'freeze_leaderboard_at' => Carbon::create(2000),
            'leaderboard_unfrozen' => true,
        ]);

        $summer2023 = ContestDay::create([
            'date' => Carbon::create(2023, 6, 21),
            'registration_deadline' => Carbon::create(2023, 6, 19),
            'name' => 'First Edition 2023',
            'allow_training_from' => Carbon::create(2023, 3, 26),
            'current' => true,
        ]);

        $summer2023Theme = ContestDayTheme::default($summer2023->id);
        $summer2023Theme->generatePalette(Color::parseRgb('133 200 52'));

        Contest::create([
            'name' => 'HTL Traun',
            'contest_day_id' => $summer2023->id,
            'start_time' => Carbon::create(2023, 6, 21, 10),
            'end_time' => Carbon::create(2023, 6, 21, 13),
            'wrong_solution_penalty' => 5,
            'freeze_leaderboard_at' => Carbon::create(2023, 6, 21, 12),
            'leaderboard_unfrozen' => false,
        ]);
    }
}
