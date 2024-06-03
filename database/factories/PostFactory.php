<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "property_id" => $this->faker->numberBetween(71000, 72000),
            "post" => $this->faker->text,
            "status" => $this->faker->randomElement([
                "Pendiente",
                "Autorizado",
                "Publicado"
            ]),
            "url" => $this->faker->imageUrl
        ];
    }
}
