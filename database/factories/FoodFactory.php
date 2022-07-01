<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            // 'name' => $this->faker->name(),
            // 'description' => $this->faker->name(),
            // 'detail' => $this->faker->name(),
            // 'price'=>
            // 'produced_on' => now(),
            // 'image' => '' .rand(1,3).'.jpg',
            // 'category_id'=> '' .rand(1,3)
        ];
    }
}
