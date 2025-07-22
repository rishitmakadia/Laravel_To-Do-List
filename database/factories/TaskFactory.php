<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        return [
            'taskName' => $this->faker->name(),
            'description' => $this->faker->text(),
            'imgLink' => $this->faker->imageUrl(),
//            'property'=>
        ];
    }
}
