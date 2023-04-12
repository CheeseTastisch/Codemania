<?php

namespace Database\Seeders;

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
        $trainingTheme = ContestDayTheme::create([
            'fifty' => '255 241 242',
            'hundred' => '255 223 224',
            'two_hundred' => '255 197 199',
            'three_hundred' => '255 157 161',
            'four_hundred' => '255 100 106',
            'five_hundred' => '255 36 44',
            'six_hundred' => '237 21 29',
            'seven_hundred' => '200 13 20',
            'eight_hundred' => '165 15 20',
            'nine_hundred' => '136 20 24',
            'nine_hundred_fifty' => '75 4 7',
        ]);
        $trainingTheme->generateImages();

        $training = ContestDay::create([
            'date' => Carbon::create(),
            'registration_deadline' => Carbon::create(2000),
            'name' => 'Training',
            'allow_training_from' => Carbon::create(2000),
            'training_only' => true,
            'current' => false,
            'contest_day_theme_id' => $trainingTheme->id,
        ]);

        Contest::create([
            'name' => 'Training',
            'contest_day_id' => $training->id,
            'start_time' => Carbon::create(2000),
            'end_time' => Carbon::create(2000),
            'wrong_solution_penalty' => 0,
            'freeze_leaderboard_at' => Carbon::create(2000),
            'leaderboard_unfrozen' => true,
        ]);


        $summer2023Theme = ContestDayTheme::create([
            'fifty' => '245 251 234',
            'hundred' => '232 245 210',
            'two_hundred' => '209 237 169',
            'three_hundred' => '179 223 119',
            'four_hundred' => '150 206 77',
            'five_hundred' => '133 200 52',
            'six_hundred' => '91 143 33',
            'seven_hundred' => '70 109 30',
            'eight_hundred' => '59 87 29',
            'nine_hundred' => '50 74 29',
            'nine_hundred_fifty' => '24 40 11',
        ]);
        $summer2023Theme->generateImages();

        $summer2023 = ContestDay::create([
            'date' => Carbon::create(2023, 6, 21),
            'registration_deadline' => Carbon::create(2023, 6, 19),
            'name' => 'First Edition 2023',
            'allow_training_from' => Carbon::create(2023, 3, 26),
            'current' => false,
            'contest_day_theme_id' => $summer2023Theme->id,
        ]);

        Contest::create([
            'name' => 'HTL Traun',
            'contest_day_id' => $summer2023->id,
            'start_time' => Carbon::create(2023, 6, 21, 10),
            'end_time' => Carbon::create(2023, 6, 21, 13),
            'wrong_solution_penalty' => 5,
            'freeze_leaderboard_at' => Carbon::create(2023, 6, 21, 12),
            'leaderboard_unfrozen' => false,
        ]);


        $winter2023Theme = ContestDayTheme::create([
            'fifty' => '238 249 255',
            'hundred' => '218 240 255',
            'two_hundred' => '189 230 255',
            'three_hundred' => '143 216 255',
            'four_hundred' => '90 193 255',
            'five_hundred' => '52 163 253',
            'six_hundred' => '29 133 243',
            'seven_hundred' => '22 110 224',
            'eight_hundred' => '25 88 180',
            'nine_hundred' => '26 76 142',
            'nine_hundred_fifty' => '8 50 73',
        ]);
        $winter2023Theme->generateImages();

        $winter2023 = ContestDay::create([
            'date' => Carbon::create(2023, 12, 20),
            'registration_deadline' => Carbon::create(2023, 12, 18),
            'name' => 'Winter 2023',
            'allow_training_from' => Carbon::create(2023, 12, 25),
            'current' => true,
            'contest_day_theme_id' => $winter2023Theme->id,
        ]);

        Contest::create([
            'name' => 'Easy',
            'contest_day_id' => $winter2023->id,
            'start_time' => Carbon::create(2023, 12, 20, 10),
            'end_time' => Carbon::create(2023, 12, 20, 13),
            'wrong_solution_penalty' => 5,
            'freeze_leaderboard_at' => Carbon::create(2023, 12, 20, 12),
            'leaderboard_unfrozen' => false,
        ]);

        Contest::create([
            'name' => 'Hard',
            'contest_day_id' => $winter2023->id,
            'start_time' => Carbon::create(2023, 12, 20, 10),
            'end_time' => Carbon::create(2023, 12, 20, 13),
            'wrong_solution_penalty' => 5,
            'freeze_leaderboard_at' => Carbon::create(2023, 12, 20, 12),
            'leaderboard_unfrozen' => false,
        ]);
    }
}
