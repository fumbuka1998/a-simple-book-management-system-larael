<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book>
 */
class bookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'isbn'=>$this->faker->numberBetween($min=100000, $max=200000),
            'name'=>$this->faker->word,
            'year'=>$this->faker->numberBetween($min=1990, $max=2022),
            'page'=>$this->faker->numberBetween($min=1, $max=250),
            'publisher_id'=>$this->faker->numberBetween($min=200, $max=10000),
            'image'=>'vitabuImage/1666709190.jpg'
        ];
    }
}
