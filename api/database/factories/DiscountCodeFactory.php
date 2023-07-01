<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiscountCode>
 */
class DiscountCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => fake()->word(),
            "description" => fake()->text(),
            "percent" => fake()->numberBetween(1, 100),
            "code" => fake()->regexify('[A-Za-z0-9]{8}'),
        ];
    }
}
