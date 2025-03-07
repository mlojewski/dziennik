<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voivodeship;

class VoivodeshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $voivodeships = [
            'dolnośląskie',
            'kujawsko-pomorskie',
            'lubelskie',
            'lubuskie',
            'łódzkie',
            'małopolskie',
            'mazowieckie',
            'opolskie',
            'podkarpackie',
            'podlaskie',
            'pomorskie',
            'śląskie',
            'świętokrzyskie',
            'warmińsko-mazurskie',
            'wielkopolskie',
            'zachodniopomorskie'
        ];

        foreach ($voivodeships as $voivodeship) {
            Voivodeship::create(['name' => $voivodeship]);
        }
    }
}
