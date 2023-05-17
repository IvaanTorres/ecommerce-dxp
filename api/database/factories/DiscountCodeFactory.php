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
            "title" => $this->faker->name(),
            "description" => $this->faker->text(),
            "percentage" => $this->faker->randomFloat(2, 0, 100),
            "code" => $this->faker->name(),
        ];
    }
}
