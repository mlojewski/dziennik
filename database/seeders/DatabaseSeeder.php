<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Coach;
use App\Models\Practice;
use App\Models\School;
use App\Models\Stage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        Artisan::call('migrate:fresh');
        User::factory()->create([
            'name' => 'a',
            'email' => 'a@a.pl',
            'password' => Hash::make('123123123'),
            'is_admin' => true,
            
        ]);
        DB::table('editions')->insert([
            'name' => '2024'
        ]);
        $this->call(
            VoivodeshipSeeder::class,
        );
        Stage::factory()->count(2)->create();
        School::factory()->count(10)->create();
        Coach::factory()->count(15)->create();
        Athlete::factory()->count(15)->create();
        Practice::factory()->count(20)->create();
        $this->call(CoachSchoolSeeder::class);
        $this->call(AthletePracticeSeeder::class);
    }
}
