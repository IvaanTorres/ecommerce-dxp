<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Stringable;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = fake()->unique()->randomElement([
            [
                'name' => 'admin',
                'level' => '2'
            ],
            [
                'name' => 'user',
                'level' => '1'
            ],
        ]);
        
        return [
            'name' => $users['name'],
            'description' => fake()->sentences(3, true),
            'slug' => $users['name'],
            'level' => $users['level'],
        ];
    }
}
