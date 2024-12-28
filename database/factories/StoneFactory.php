<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stone>
 */
class StoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->numberBetween(0, 100),
            'name' => fake()->name(),
            'images' => fake()->sentence(),
            'Tensile_Strength' => fake()->name(),
            'Water_Absorption_Rate' => fake()->name(),
            'Compressive_Strength' => fake()->name(),
            'Abrasion_Resistance' => fake()->name(),
            'Specific_Weight' => fake()->name(),
            'Failure_Mode' => fake()->name(),
            'Porosity' => fake()->name(),
        ];
    }
}
