<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Coach;
use App\Models\Practice;
use App\Models\School;
use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('editions')->insert([
            'name' => '2024'
        ]);
        Stage::factory()->count(2);
        School::factory()->count(5);
        Coach::factory()->count(5);
        Athlete::factory()->count(5);
        Practice::factory()->count(5);
    }
}
