<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Category::firstOrCreate(['name' => 'Тракторы', 'icon' => 'svg/tractor.svg']);
         Category::firstOrCreate(['name' => 'Газонокосилки', 'icon' => 'svg/lawn-mower.svg']);
         Category::firstOrCreate(['name' => 'Электрооборудование', 'icon' => 'svg/plug.svg']);
         Category::firstOrCreate(['name' => 'Краны и эвакуаторы', 'icon' => 'svg/crane.svg']);
         Category::firstOrCreate(['name' => 'Генераторы и ИБП', 'icon' => 'svg/generator.svg']);
         Category::firstOrCreate(['name' => 'Спец. экипировка', 'icon' => 'svg/gas-mask.svg']);
         Category::firstOrCreate(['name' => 'Экскаваторы', 'icon' => 'svg/excavator.svg']);
         Category::firstOrCreate(['name' => 'Мелкая техника', 'icon' => 'svg/showel.svg']);
         Category::firstOrCreate(['name' => 'Разное', 'icon' => 'svg/different.svg']);

    }
}
