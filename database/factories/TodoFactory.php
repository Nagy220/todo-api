<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $priorities = ['0', '1', '2'];
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'file_path' => null,
            'priority' => $priorities[array_rand($priorities)],
        ];
    }
}
