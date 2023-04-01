<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ContestDay;
use App\Models\ContestDayTheme;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $summer2023 = ContestDayTheme::create([
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
            'images' => 'summer2023',
        ]);

        ContestDay::create([
            'date' => Carbon::create(2023, 6, 21),
            'registration_deadline' => Carbon::create(2023, 6, 19),
            'name' => 'Sommer 2023',
            'allow_training_from' => Carbon::create(2023, 6, 26),
            'current' => true,
            'contest_day_theme_id' => $summer2023->id,
        ]);

        $winter2023 = ContestDayTheme::create([
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
            'images' => 'winter2023',
        ]);

        ContestDay::create([
            'date' => Carbon::create(2023, 12, 20),
            'registration_deadline' => Carbon::create(2023, 12, 18),
            'name' => 'Winter 2023',
            'allow_training_from' => Carbon::create(2023, 12, 25),
            'current' => false,
            'contest_day_theme_id' => $winter2023->id,
        ]);
    }
}
