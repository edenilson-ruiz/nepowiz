<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "price" => $this->faker->numberBetween(50000, 100000),
            "bedrooms" => $this->faker->numberBetween(2,4),
            "bathrooms" => $this->faker->numberBetween(2,4),
            "floor_area" => $this->faker->numberBetween(200,400),
            "img_url" => $this->faker->imageUrl()
        ];
    }
}
