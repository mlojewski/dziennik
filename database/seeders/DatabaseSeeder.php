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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Artisan::call('migrate:fresh');
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        DB::table('editions')->insert([
            'name' => '2024'
        ]);
        Stage::factory()->count(2)->create();
        School::factory()->count(5)->create();
        Coach::factory()->count(5)->create();
        Athlete::factory()->count(5)->create();
        Practice::factory()->count(5)->create();
    }
}
