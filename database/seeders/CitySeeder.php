<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::firstOrCreate(['name' => 'Душанбе', 'country' => 'Таджикистан']);
        City::firstOrCreate(['name' => 'Ваҳдат', 'country' => 'Таджикистан']);
        City::firstOrCreate(['name' => 'Бохтар', 'country' => 'Таджикистан']);
        City::firstOrCreate(['name' => 'Ҳисор', 'country' => 'Таджикистан']);
        City::firstOrCreate(['name' => 'Истаравшан', 'country' => 'Таджикистан']);
    }
}
