<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->words(2, true),
            'body' => fake()->paragraph(3),
            'nb_stars_id' => fake()->numberBetween(1, 6),
            'user_id' => fake()->numberBetween(1, 3),
            'product_id' => fake()->numberBetween(1, 10),
        ];
    }
}
