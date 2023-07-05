<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vol = fake()->numberBetween(1, 100);
        $cost = fake()->numberBetween(5000, 2000000);
        $data = [
            'project_id' => fake()->numberBetween(1, 3),
            'name' => fake()->sentence(4),
            'uom' => fake()->word(),
            'volume' => (double)$vol,
            'cost' => (double)$cost,
            'subtotal_cost' => (double)$vol * $cost,
        ];
        return $data;
    }
}
