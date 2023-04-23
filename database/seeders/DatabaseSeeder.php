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
        $this->call(ContestSeeder::class);

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

        $trainingTeam = Team::create([
            'name' => "training-{$user->id}",
            'contest_id' => ContestDay::whereTrainingOnly(true)->first()->contests()->first()->id
        ]);

        $user->teams()->attach($trainingTeam, ['role' => 'member']);
    }
}
