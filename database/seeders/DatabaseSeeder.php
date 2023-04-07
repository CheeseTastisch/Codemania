<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ContestDay;
use App\Models\ContestDayTheme;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $training = ContestDayTheme::create([
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
            'images' => 'training',
        ]);

        $trainingDay = ContestDay::create([
            'date' => Carbon::create(2000, 1, 1),
            'registration_deadline' => Carbon::create(2000, 1, 1),
            'name' => 'Training',
            'allow_training_from' => Carbon::create(2000, 1, 1),
            'training_only' => true,
            'current' => false,
            'contest_day_theme_id' => $training->id,
        ]);

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

        $user = User::forceCreate([
            'email' => 'lian.hoerschlaeger@gmail.com',
            'first_name' => 'Lian',
            'last_name' => 'Hörschläger',
            'is_admin' => true,
            'two_factor_secret' => 'eyJpdiI6IncrN21YaUFWKzlCeVo3MEduaVdja3c9PSIsInZhbHVlIjoiK0JnNUlHNjF6TTJ1b0RJb2xyY3BDMk95NEJ5TVBFclBLeDJVVkVJS0lETT0iLCJtYWMiOiJlMzIyZmJmM2QyZTk1YWNhNWZiMjRmMzllYjc3NDA1OTcwMzI3Yjg1YzBjYzI2MTlkMDJmMDMzN2ExZWU2ZDdlIiwidGFnIjoiIn0=',
            'two_factor_recovery_codes' => 'eyJpdiI6IjN4VWsrTUdxYXVhdzZLUnpTbUhDV2c9PSIsInZhbHVlIjoiWWtTMFkyUzdGektuOERiM09pcTZ4MGF3T1RaaVlhOGNXTnMxSExGcFBPZWtZT0Vrek4wMWloZVcweDVraWlqSjZYbXk3Z042dTVTTlJXQTh0QzZiVWlDOXM3R0NOL1NZdSs2OWQ1REh2K0h4ZVhScHRBVndoQzFBK1I4K2o1L0dPOVVTSVVJUkgwRWlDZUN5NEY5TjhnWnZLZEdlZkJTOVZUVUxwVGU3VVhUSmdlSzc1SFNZRlR2TzRROFNKVEFZUFBxMERtRkhQVEViRUFMaEcrL1k0VjFSV0ZvSHM0T3lzYmNWTm0rMzZTRT0iLCJtYWMiOiI2ZDRjOTE5OTU5ZTJmMmViZmVhNjRlNTEyYTcxZmZlOGFhZWY1YWRmMTgwOWU0OTg5Nzg5ZGE0ZGNlZDM2NjQ5IiwidGFnIjoiIn0=',
            'confirmed_two_factor_at' => Carbon::now(),
            'password' => Hash::make('un5OKtSZseM5yID$GiksND6AWLsyM6P!3lC2D7GG'),
            'email_verified_at' => Carbon::now(),
        ]);

        $team = Team::create([
            'name' => "training-$user->id",
            'contest_day_id' => $trainingDay->id
        ]);

        $user->teams()->attach($user->id, ['role' => 'admin']);
    }
}
