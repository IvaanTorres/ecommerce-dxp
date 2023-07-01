<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(2, true),
            'description' => fake()->paragraph(3),
            'price' => fake()->randomFloat(2, 0, 300),
            'stock' => fake()->randomNumber(3, false),
            'rating' => fake()->numberBetween(1, 5),
            'weight' => fake()->randomNumber(3, false),
            'ref' => 'ref-' . fake()->uuid(),
        ];
    }
}
