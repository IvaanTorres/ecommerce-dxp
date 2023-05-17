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
            'nb_stars_id' => fake()->numberBetween(1, 6),
            // TODO: Get nb
            'nb_reviews' => fake()->numberBetween(0, 10),
            // 'brand_id' => fake()->numberBetween(1, 5),
            'discount_id' => fake()->numberBetween(1, 10),
            'discount_priority' => 3,
            'weight' => fake()->randomNumber(3, false),
            'final_price' => fake()->randomFloat(2, 0, 300),
            'ref' => 'ref-' . fake()->uuid(),
        ];
    }
}
