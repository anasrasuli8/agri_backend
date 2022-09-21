<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ads>
 */
class AdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->text(80),
            'price' => fake()->randomFloat(2, 0, 10000),
            'phone' => fake()->numerify('+992#########'),
            'address' => fake()->address(),
            'email' => fake()->email(),
            'image' => collect(['images/image1.jpeg','images/image2.jpeg','images/image3.jpeg','images/image4.jpeg','images/image5.jpeg','images/image6.jpeg','images/image7.jpg'])->random(),
            'description' => fake()->text(),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
